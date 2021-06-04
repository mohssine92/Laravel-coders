<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Spatie\Permission\Models\Role; // incluido por paquere


/*
 artisan make:controller Admin/UserController -r
*/


class UserController extends Controller
{

    public function __construct(){
        // si no espcifico que metodo protegera todos los metodos .y no es el caso
        $this->middleware('can:Read users')->only('index');
        $this->middleware('can:Edit users')->only('edit','update');


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) // restacar informacion del usuario
    {
        $roles = Role::all();

        // en esta vista obtendro objeto a editar en este caso user pero puede ser cualquier objeto de cualquier producto quiero editar segun la logica del negocio
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //return $user;

        // asignar rol o roles a un user , sabemos que cada rol consta de permisos que van a controllar la funcionalidad del mismo dentro de la plataforma
        // comportamiento de metodo sync , sicrona la tabla relacion si viene data lo actualiza y si viene vacia lo actualiza en db es decir borra en este caso
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.edit', $user);
    }


}
