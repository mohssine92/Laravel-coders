<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Reaction;

class CreateReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {

            $table->id();

           $table->enum('value', [Reaction::LIKE , Reaction::DISLIKE] ); /* este tipo debe aceptar solo dos valores */

           /* Generar llave Forreanea  */
           $table->unsignedBigInteger('user_id');

           /* dos campos mas , es una tabla Polimorfica */
           $table->unsignedBigInteger('reactionable_id');
           $table->string('reactionable_type');

           /* Restricciones llaves Forreanes */
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
        Schema::dropIfExists('reactions');
    }
}
