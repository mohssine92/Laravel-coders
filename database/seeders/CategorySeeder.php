<?php

namespace Database\Seeders;
use App\Models\category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        category::create([
           'name' => 'Desarollo web'
        ]);

        category::create([
            'name' => 'Diseño web'
        ]);

         category::create([
            'name' => 'Programacion'
         ]);
    }
}
