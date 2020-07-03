<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatTemporadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporadas', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero');
//            Usando MySQL, deve colocar unsignedBigInteger, para poder criar a foreign key
            $table->unsignedBigInteger('serie_id');

            $table->foreign('serie_id')
                ->references('id')
                ->on('series')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temporadas');
    }
}
