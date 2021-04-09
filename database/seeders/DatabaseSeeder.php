<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
      // \App\Models\User::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);


    }

    /* TODO php artisan migrate:fresh --seed */
}



