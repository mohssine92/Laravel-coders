<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     * Uno a mucho reversa
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->unsignedBigInteger('course_id');

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

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
        Schema::dropIfExists('requirements');
    }
}
