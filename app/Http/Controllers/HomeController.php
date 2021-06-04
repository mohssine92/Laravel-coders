<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;





class HomeController extends Controller
{

   /* cuando creamos un controlador administra solo una ruta creamos , definimos un metodo __invoke */
    /* latest('id') oredenar la colleccion  DESC */
    /* compact() me pasa la variable a la vista asociada  */
    public function __invoke ()
    {

       $courses = Course::where('status', '3')->latest('id')->get()->take(12);

       return view('welcome', compact('courses'));

    }
}
