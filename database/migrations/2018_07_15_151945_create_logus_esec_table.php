<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogusEsecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logus_esec', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('luogo_id')->unsigned();
            $table->integer('esecutore_id')->unsigned();
             $table->string('descrizione',255)->nullable();
            $table->timestamps();
            
            $table->foreign('luogo_id')->references('id')->on('logus');
            $table->foreign('esecutore_id')->references('id')->on('esecudoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logus_esec');
    }
}
