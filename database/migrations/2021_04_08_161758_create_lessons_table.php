<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('url');
            $table->string('ifram');

            /* llaves foreaneas  para relacionar typado con plataforms*/
            $table->unsignedBigInteger('platform_id')->nullable(); /* nota  */
            $table->unsignedBigInteger('section_id');

            /* restricciones de llaves foreaneas  */
             $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('set null');  /* nota */
             $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

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
        Schema::dropIfExists('lessons');
    }
}
