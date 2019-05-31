<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Colletzioni extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
    {
          Schema::create('colletzionis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',31);
            $table->string('data')->nullable();
			$table->string('data_note',255)->nullable();
            $table->string('descrizione',255)->nullable();
       
            $table->integer('luogo_id')->unsigned();
            
            $table->timestamps(); 
            $table->foreign('luogo_id')->references('id')->on('logus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists(('colletzionis'));
    }
}
