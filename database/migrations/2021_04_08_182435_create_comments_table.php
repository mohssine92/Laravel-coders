<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {

            $table->id();

            $table->text('name');

            $table->unsignedBigInteger('user_id');

            /* Se trata de tabla Polimorfica . suporta coments para coursos y para videos y puede suportar para varios objetos sin prop */
            $table->unsignedBigInteger('commentable_id');
            $table->string('commentable_type');

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
        Schema::dropIfExists('comments');
    }
}
