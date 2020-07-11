<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThesisAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis_authors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thesis_id')->unsigned()->nullable();
            $table->foreign('thesis_id')->references('id')->on('theses')->onDelete('cascade');
            $table->integer('author_id')->unsigned()->nullable();
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
        Schema::dropIfExists('thesis_authors');
    }
}
