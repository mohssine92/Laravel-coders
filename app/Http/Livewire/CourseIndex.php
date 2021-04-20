<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\course;

class CourseIndex extends Component
{



    /* por defecto , cualquier prop de este componente sufre cambio , se actuzaliza el metodo de render() */
    public function render()
    {
        $courses = Course::where('status', 3)->latest('id')->paginate(8);



        return view('livewire.course-index', compact('courses'));
    }
}
