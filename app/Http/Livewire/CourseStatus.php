<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\course;
use App\Models\Lesson;



// para poder usar la polici debe imporatar esta classe
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

// 2 notas , mount() es un  metodo para captar argumento desde la ruta
 // : desde el template del componente de livewire se accede a las prop publicas
 // no hace falta metodo de compact() ,
class CourseStatus extends Component
{

    // definamos que vamos a usar la clase dentro de esta clase
    use AuthorizesRequests;

    // mis props , accedidos desde template de este Component
    public $course, $current;


     // Esta funccion se Ejecuta solo en primer instancia del component class .
    public function mount(Course $course) {


         $this->course = $course;

         foreach ($course->lessons as $lesson) { // relacion lesson decuelve coleccion

           if(!$lesson->completed){ //  false
              $this->current = $lesson; // current el curso que esta alumno viendo
              break;
           }
         }

         if(!$this->current){
             $this->current = $course->lessons->last();
             // obtengo el ultimo objeto de la colecion
         }


         // esta es un metodo obtenida de la class  AuthorizesRequests , le pasamos metodo de la class polici que implementa cierta logica para permitir pasar .
         // entonces este metodo de autorizacion de access , espera true del metodo de la class polici para dejar pasar , 403 | THIS ACTION IS UNAUTHORIZED.
         $this->authorize('enrolled',$course);


    }



    // PROPIEDADES COMPUTADAS

    // estas prop computadas cuando se renderizen desde la plantilla se ejecuten sus logicas para responder
    // estas son propiedades computadas de este modelo
    // cumpla la necesidad que tendra este modelo para manipular sus elementos de pantilla .
    // un punto muy importante las prop computadas , siempre que se ejecute render se vuelvan a ejecutarse
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
           return $this->course->lessons[$this->index -1]; // relacion indirecta
        }
     }// return objetp

    public function getNextProperty(){
        if($this->index == $this->course->lessons->count()-1 ){  // ultimo index de la coleccion
            return null;
        }else{
            return $this->course->lessons[$this->index +1];
        }
    }// return object

    public function getAdvanceProperty(){
       $i = 0;

       foreach($this->course->lessons as $lesson){
         if($lesson->completed){
            $i++;
         }
       }

       $advance = ($i * 100)/($this->course->lessons->count());

       // quiero que la cifra returnada con dos decimales
       return round($advance, 2);


    }





    // METODOS

    // actualiza prop curent con la que estamos mandano por params , current es lesson actual
    // se dispar depende evento click , su ejecuccion resuelta ejecuccion de render metod , resulta actualizacion
    // de las props en template del componete afectadas.
    public function changeLesson (Lesson $lesson) {
       // tener en cuenta que estamos obteniendo objeto de lesson de dos formas distintas , usando relacion directa y indirecta
       // esto adiciona props lo que hace que los objetos se concideran no autenticados
        $this->current = $lesson;
    }

    public function completed(){
        if($this->current->completed){
           // eleminar registro que es punto de referencia para saber si la leccion culminada
            $this->current->users()->detach(auth()->user()->id);
        }else{
           // agregar registro
            $this->current->users()->attach(auth()->user()->id);
        }

          // actualizar propiedades current , resuelta ejecuccion de render y renderizar solo la propiedades afectadas
          // es algo de ciclo de vida
          $this->current = Lesson::find($this->current->id);

          // el curse lo obtenemos de primer instancia del componete surgida por acceder a la ruta
          // relacionada al componente , asi debe avisar los cambios .
          $this->course = Course::find($this->course->id);
    }




    public function render()
    {
        return view('livewire.course-status');
    }




}
