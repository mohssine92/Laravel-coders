<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;



class CourseController extends Controller
{



    public function index () {
      return view('courses.index');
    }


    public function show (Course $course) {

       // veridico si el Objeto curse esta aprobado , para autorizar acceso a esta ruta .
       // autoriz espera boolean . 403  THIS ACTION IS UNAUTHORIZED.
       // Publish es una funcion de la class Policy
       $this->authorize('published',$course);

       $similares = Course::where('category_id',$course->category_id)
                          ->where('id','!=',$course->id)
                          ->where('status',3)
                          ->latest('id')
                          ->take(5)
                          ->get();

        return view('courses.show', compact('course','similares'));

    }



    public function enrolled (Course $course){
      /* matriculacion de alumno al curso V19 M7 */

       $course->students()->attach(auth()->user()->id);

       return redirect()->route('courses.status',$course);

    }





}
