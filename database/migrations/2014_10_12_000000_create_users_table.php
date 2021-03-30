<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/* generar clases de migration => php artisan make:migration create_cursos_table */
/* php artisan migration , ejecuta crea las migraciones - php artisan migrate:rollback => borra las migraciones del ultimo lote */
/* php artisan migrate:refresh => eleminar - crear de nuevo */ /* no ejecutarla cuando el proyecto este en production  */
/* la manera correcta de añadir un acolumna sin borrar tablas y poner datos de usuarios en peligro cuando estemos en production => php artisan make:add_avatar_to_users_table => esto me crea una clase de migration
  en este caso enla clase de eshema voy estar llamando al metodo table() no creat ver video 08 - youtuber  */
  /* php artisan migrate:reset => borra todas la tablas de mi base de datos  */
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()           /* up() hacer action */
    {
        Schema::create('users', function (Blueprint $table) {   /* create() , recieved 2 params . name of table , anonyme function  */ /* Bluebrintis an object , lo instanciamos simplemente poniendolo una variable delante de el  */
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->timestamps();  /* create two col : created_at - update_at  */
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()  /* down() revertir esta action  */  /* comado refresh ejecuta este metodo primero lurgo up() */
    {
        Schema::dropIfExists('users');
    }



}
