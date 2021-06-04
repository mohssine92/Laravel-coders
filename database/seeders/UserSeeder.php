<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
     /* TODO */ /**llamar este classe en DatabaseSeeder , porque es la clase que se va ejecutar el comando , asi DatabaseSeeder dara cuenta que esta clase esta flotando
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Simillar datos de prueba , registro ingresado manuelmente
      $user = User::create([
            'name' => 'Mohssine lmariouh',
            'email' => 'mohssinelmariouh@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678')
      ]);

      //laravel permission nos proporciona este metodo de relacionar non con id sino con nombre de rol , pero la inserftacion en tabla sera con id
       $user->assignRole('Admin');

       /* para evitar escribir n objetos de tipo user hacemos uso de FactoriyClass , se va generar Fake datos .. video : 9 */
       User::factory(99)->create();
    }
}
