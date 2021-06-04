<?php


use Illuminate\Support\Facades\Route;

use App\Http\Livewire\InstructorCourses;

// prefijo instrucor para nombre de estos end-points esta provido globalmente desde el provider de rutas

// si estamos en la routa padre 'instructor' sin segmento que  especifica end-point de este archivo a cargar me rederigo al segmento indicado.
Route::redirect('', 'instructor/courses');

Route::get('courses', InstructorCourses::class)->middleware('can:Read Courses')->name('courses.index');
// middleware('can:Leer cursos') : es un mdlware restringe el acceso a esta ruta requiere del permiso declarado
