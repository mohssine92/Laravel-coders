<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonUserTable extends Migration
{
    /**
     * Run the migrations.
     *  Relacion de muchos a muchos  , tabla pivote no consta de un modelo
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_user', function (Blueprint $table) {
            $table->id();

            /* dos campos los dos son llaves Foreanea  */  /* table pivote , no consta de modelo  */
            $table->unsignedBigInteger('lesson_id');  /* este tipo de datos permite seleccionar solo los ids disponibles en referencia  */
            $table->unsignedBigInteger('user_id');

            /* Restricciones de llaves foreaneas  */
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_user');
    }
}
