<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*nosotros no necesitamos que solamente se crean los roles , sino se le asignan ciertas cantidades de permissos  - asi consiste almacenar el registro en una variable una vez creado luego la insertamos atraves de la relacion */

        //metodo Eloquent , estos registros se insertan en la tabla permissions Atraves del modelo eloquent permission .
        $role = Role::create(['name' => 'Admin']);
        $role->permissions()->attach([1,2,3,4,5,6,7,8,9,10,11]); // son los ids de los permisos que tengo insertados atraves del seeders  de los permissos

        $role = Role::create(['name' => 'Instructor']);

       // para ver algo nuevo , la forma en la que vamos a relacionar este rol con permissos para ser con un metodo proporcionada por laravel permissions
       // la diferencia es con este metodo insertamos los nombres de permisos
       $role->syncPermissions('Create courses','Read Courses','Update Courses','Delete Courses','See dashboard');


    }
}

// ahora estos seeders generados se debe llamar desde el archivo Datacaseseeders
