<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type'); 
            $table->string('clasification');
            $table->text('title');
            $table->string('year');
            $table->integer('school_id')->unsigned()->nullable();
            $table->integer('stand_id')->unsigned()->nullable();
            $table->string('adviser')->nullable();
            $table->string('extension');
            $table->string('observations');
            $table->string('accompaniment');
            $table->text('content');
            $table->text('summary');
            $table->text('recomendations')->nullable();
            $table->text('conclusions')->nullable();
            $table->text('bibliography')->nullable();
            $table->text('keywords')->nullable();
            $table->string('mention');
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
        Schema::dropIfExists('theses');
    }
}
