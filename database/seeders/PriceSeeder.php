<?php

namespace Database\Seeders;
use App\Models\price;

use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         price::create([
           'name'  => 'Gratis',
           'value' => 0
         ]);

         price::create([
            'name'  => '19.99 US$ (nivel 1)',
            'value' => 19.99
          ]);

          price::create([
            'name'  => '49.99 US$ (nivel 2)',
            'value' => 49.99
          ]);

          price::create([
            'name'  => '99 US$ (nivel 2)',
            'value' => 99.99
          ]);
    }
}
