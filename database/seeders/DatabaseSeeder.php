<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
      /*   $this->call(); */  /* como parametro paso la claseseeder del modelo generada paraque se intera esta clase de su existencia , al momento de jecutar el comande de php artisan  */
    }

    /* $this refiero a los metodos y atrributos de esta clase a de la clase madre  */
}


/* => php artisan db:seed =>   ,;;
     puedo desde esta clase instanciar el modelo y asignar valores a los atributos del modelo  y ejecutaar metodo de save() de elequent - despues ejecuto el comando de php artisan db:seed , y se insertar los registros que he
     generado manualmenente pero el objetivo es cuando estamos  en dev generar 1000 registros por eso vamos a separa las responsabilidades entre clases de seeders y factories  - sino vamos a tener spaghiti en este archivo  */

     /* la idea de trabajar con Laravel es modolizar el codigo ==>   php artisan make:seeder CursoSeeder => nos permitira crear cada clase seeder para cada modelo .*/
