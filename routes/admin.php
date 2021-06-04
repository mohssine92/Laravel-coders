<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

// estas end-points , tinen implementado mdlware de atenticacion en el provider de servicio de routas .
//  php artisan r:l --name=admin.roles
/* admin. como prefix de nombre de rutas implementado en RouteServiceProvider  */
// recordad tenemos dos formas de llamar los endpointes , por url o por sus nombre


Route::get('',[ HomeController::class,'index'])->middleware('can:See dashboard')->name('home');


Route::resource('roles', RoleController::class)->names('roles'); // se carga metodo index al acceder por defecto get
// Ruta resource , nos ofrece todos metodos para hacer Crud , Atraves de un Modelo , en este caso roles , este controller usa verbos Http .
// A estas rutas resource no no vamos a poder aplicarle meedlware desde aqui sino desed el constructor

Route::resource('users', UserController::class)->only('index','edit','update')->names('users'); // se carga metodo index al acceder por defecto get
// Ruta de tipo  resource , nos ofrece todos metodos para hacer Crud , Atraves de un Modelo , en este caso user , este controller usa verbos Http .
// php artisan r:l --name=admin.users
// only() method : para indicar las rutas que me va crear controller resource , si no declaro este metodo el resource controller esperaba 7 metodos y va dar error si borro los methodos de resource que no estou usando
