<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /* TODO esta clase que se ejecuta al ejecuatar seeders , asi cualquier seederClass queremos que se ejecuta debe llamarla aqui  */
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

       /* Metodo genera carpeta dentro Storage/cursos/fake.jpg */
       Storage::makeDirectory('cursos');


      // \App\Models\User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(CourseSeeeder::class);


    }

    /* TODO php artisan migrate:fresh --seed */
}



