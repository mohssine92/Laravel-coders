<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\course;
use App\Models\Lesson;

// 2 notas , mount() es un  metodo para captar argumento desde la ruta
 // : desde el template del componente de livewire se accede a las prop publicas
 // no hace falta metodo de compact() ,
class CourseStatus extends Component
{

    // mis props , accedidos desde template de este Component
    public $course, $current;

    public function mount(Course $course) {
        // Esta funccion se Ejecuta solo en primer instancia del component class .

         $this->course = $course;

         foreach ($course->lessons as $lesson) { // relacion lesson decuelve coleccion

           if(!$lesson->completed){ //  false
              $this->current = $lesson; // current el curso que esta alumno viendo
              break;
           }

         }
    }

    // estas prop computadas cuando se renderizen desde la plantilla se ejecuten sus logicas para responder
    // tambien tener en cuenta en componentes de livewire , cuando se ejecuta algun funcion , render se ejecuta la plantilla por ciclo de vida ,lo que hace la plantilla renderiza propiedades , asi las props computadas renderizadas
    // vuelvan a ejecutarse y respondan segun .
    // estas son propiedades computadas de este modelo
    // cumpla la necesidad que tendra este modelo para manipular sus elementos de pantilla .
     public function getIndexProperty(){
        // pluck() extrae ids de la coleccion , genera nueva coleccion
        // search() returna index en la coleccion
        // esta logica para obtener index del curso que esta viendo el alumno .
        return $this->course->lessons->pluck('id')->search($this->current->id);
     } // number

     public function getPreviousProperty(){
        if($this->index == 0){  // index = getIndexProperty
           return null;
        }else{
           return $this->course->lessons[$this->index -1];
        }
     }// return objetp

    public function getNextProperty(){
        if($this->index == $this->course->lessons->count()-1 ){  // ultimo index de la coleccion
            return null;
        }else{
            return $this->course->lessons[$this->index +1];
        }
    }// return object


    // actualiza prop curent con la que estamos mandano por params , current es lesson mostrado
    // se dispar depende evento click , su ejecuccion resuelta ejecuccion de render metod , resulta actualizacion
    // de las props en template del componete .
    public function changeLesson (Lesson $lesson) {
       // tener en cuenta que estamos obteniendo objeto de lesson de dos formas distintas , usando relacion directa y indirecta
       // esto adiciona props lo que hace que los objetos se concideran no autenticados
        $this->current = $lesson;
    }

    public function render()
    {
        return view('livewire.course-status');
    }




}
