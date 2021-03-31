<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\course;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {

            $table->id();

            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->enum('status',[Course::BORRADOR,Course::REVISION,Course::PUBLICADO])->default(Course::BORRADOR);  /* 1=> invesible 2=> en revision 3=>visible al publico */
            $table->string('slug'); /* Urls amigables */


            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id')->nullable(); /* si elemina el level , el curso el que pertenesca se le setea valor null , por eso nullable permitimops sea null */
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('price_id')->nullable();

            /* agregar restricciones  llaves Forreaneas  */
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('set null');
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
        Schema::dropIfExists('courses');
    }
}
