<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;

use App\Http\Livewire\CourseStatus;

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


Route::get('cursos', [CourseController::class ,'index'] )->name('courses.index');  /* vista de curso  */

Route::get('cursos/{course}', [CourseController::class, 'show' ])->name('courses.show');  /* mas detelle sobre 1 curso - y similares  */

Route::post('courses/{course}/enrolled',[CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled'); /* Habbilita matricula de alumno a curso */

Route::get('course-status/{course}', CourseStatus::class )->middleware('auth')->name('courses.status');  // Control del avance del curso - use componentLivewire as controller


