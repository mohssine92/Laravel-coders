<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


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
