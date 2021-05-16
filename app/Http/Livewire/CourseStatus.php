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
        // este funccion se jecuta solo en primer instancia del component class .

         $this->course = $course;

         foreach ($course->lessons as $lesson) { // relacion lesson recupera collection.

           if(!$lesson->completed){ //  Attr adicinal al modelo lesson es de logica .
              $this->current = $lesson;
              break;
           }

         }
    }


    // propiedades computadas , surge la necesida para no ensusiar codigo por tantas condiciones
     // que sufran estas propiedades , es mejor manejar condiciones de manera interior y sera valida
     // en todo el entorno del componente
     public function getIndexProperty(){
        // pluck() extre ids de la coleccion , genera nueva coleccion
        // search() returna index en la coleccion
        return $this->course->lessons->pluck('id')->search($this->current->id);
     } // number

     public function getPreviousProperty(){
        if($this->index == 0){
           return null;
        }else{
           return $this->course->lessons[$this->index -1];
        }
     }// return objetp

    public function getNextProperty(){
        if($this->index == $this->course->lessons->count()-1 ){
            return null;
        }else{
            return $this->course->lessons[$this->index +1];
        }
    }// return object


    // actualiza prop curent con la que estamos mandano por params , current es lesson mostrado
    // se dispar depende evento click , su ejecuccion resuelta ejecuccion de render metod , resulta actualizacion
    // de las props en template del componete .
    public function changeLesson (Lesson $lesson) {
        $this->current = $lesson;
    }

    public function render()
    {
       //este metedo detecta cualquier cambio tanto en fucciones como en props se Ejecuta , genial :(
        return view('livewire.course-status');
    }




}
