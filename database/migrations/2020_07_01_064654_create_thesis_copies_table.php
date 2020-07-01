<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThesisCopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis_copies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('incomeNumber');
            $table->string('barcode');
            $table->integer('copy');
            $table->string('status');
            $table->integer('thesis_id')->unsigned()->nullable();
            $table->foreign('thesis_id')->references('id')->on('theses')->onDelete('cascade');
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
        Schema::dropIfExists('thesis_copies');
    }
}
