<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\course;

 // 2 notas , mount() es un  metodo para captar argumento desde la ruta
 // : desde el template del componente de livewire se accede a las prop publicas
 // no hace falta metodo de compact() ,
class CourseStatus extends Component
{
    public $course;
    public $current;

    public function mount(Course $course) {

      $this->course = $course;

      foreach ($course->lessons as $lesson) {
        if(!$lesson->completed){ //  lesson no esta culminada : false
           $this->current = $lesson;
           break;
        }



      }
    }


    public function render()
    {
        return view('livewire.course-status');
    }
}
