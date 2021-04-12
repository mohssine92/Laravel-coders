<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;



/* routas de este archivo tienen un middelware de auth en el provider  */

/* asignar control de ruta al controlador  */
Route::get('',[ HomeController::class,'index']);


