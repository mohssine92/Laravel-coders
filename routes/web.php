<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|   name() => metho para asignar nombre a una ruta
    name() da nombre a ruta , con este nombre disparamos evento <a></a>,
*/

Route::get('/', HomeController::class )->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('cursos', function(){
    return "Aqui se mostrara la lista de cursos";
})->name('courses.index');

Route::get('cursos/{course}', function(){

    return "Aqui se va a mostrar la informacion  del curso ";

})->name('course.show');
