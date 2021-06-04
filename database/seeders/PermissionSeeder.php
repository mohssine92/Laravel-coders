<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([ //metodo Eloquent , estos registros se insertan en la tabla permissions Atraves del modelo eloquent permission .
          'name' => 'Create courses'
        ]);

        Permission::create([
          'name' => 'Read Courses'
        ]);

        Permission::create([
         'name' => 'Update Courses'
        ]);

        Permission::create([
         'name' => 'Delete Courses'
        ]);

        Permission::create([
         'name' => 'See dashboard'
        ]);

        Permission::create([
         'name' => 'Create role'
        ]);

        Permission::create([
         'name' => 'List role'
        ]);

        Permission::create([
         'name' => 'Edit role'
        ]);

        Permission::create([
         'name' => 'Delete role'
        ]);

        Permission::create([
          'name' => 'Read users'
        ]);

        Permission::create([
          'name' => 'Edit users'
        ]);

    }

}

// ahora estos seeders generados se debe llamar desde el archivo Datacaseseeders
