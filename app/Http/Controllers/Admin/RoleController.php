<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// modelo rol . viene en la paquete .
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleController extends Controller
{

    public function __construct(){
      // si no espcifico que metodo protegera todos los metodos .y no es el caso
      $this->middleware('can:List role')->only('index');
      $this->middleware('can:Create role')->only('create','store');
      $this->middleware('can:Edit role')->only('edit','update');
      $this->middleware('can:Delete role')->only('destroy');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response // post
     */
    public function store(Request $request)  // suponemos de aqui comienza controller de nuesta apiRest - deberia antes configurar mdlr-cors-router
    {

        // validacion , requiere implementacion en la vista para mostrar mensaje en la vista del campo requerido faltante .
        $request->validate([
          'name' => 'required',
          'permissions' => 'required'
        ]);

        $role = Role::create([
          'name' => $request->name
        ]);  // returna objeto Model desde la tabla Roles de base de datos con id asignado al objeto a nivel de bd

        $role->permissions()->attach($request->permissions);  // permisssion = ids de los permisos

         // width es variable de session sera recibida ...
        return redirect()->route('admin.roles.index')->with('info', 'the role was created successfully');





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)  // injeccion de Role modelo .
    {
        //
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {

        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        // validacion , requiere implementacion en la vista para mostrar mensaje en la vista del campo requerido faltante .
        $request->validate([
           'name' => 'required',
           'permissions' => 'required'
        ]);

        // actualizae nombre role
        $role->update([
           'name' => $request->name
        ]);

        // metodo sync va eleminar todos registros relacionados a un id role , y genera nuevamente lo que esta almacenado en el request->permisssions
        // esta metodologia lo podemos usar en actualziar cualquier relacion de mucho a mucho  tenemos en el negocio
        $role->permissions()->sync($request->permissions);

        //return $role->permissions;
        return redirect()->route('admin.roles.edit', $role);


    }

    /**
     * Remove the specified resource from storage.
     * usa verbo delete del http por defecto
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles.index')->with('info-deleted' ,'the role was successfully removed');
    }
}


