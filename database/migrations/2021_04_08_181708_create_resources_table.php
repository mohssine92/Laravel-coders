<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *  Se tarata ed una tabal Polimorfica
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {

            $table->id();

            $table->string('url');

            /* Se trata de tabla Polimorfica . suporta coments para coursos y para videos y puede suportar para varios objetos sin prop */
            $table->unsignedBigInteger('resourceable_id');   /* video 7  */ /* se trata de id de mas de una tabla  */  /* tabla Polimorfica */
            $table->string('resourceable_type');  /* se trata de la ruta del modelo de la tabla a la que pertenezca id */


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
        Schema::dropIfExists('resources');
    }
}
