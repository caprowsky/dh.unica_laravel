<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Partecipat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('partecipant', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruolo',31);        
            $table->string('descrizione',255)->nullable();
       
            $table->integer('evento_id')->unsigned();
            $table->integer('esecutore_id')->unsigned();
            
            $table->timestamps(); 
            $table->foreign('evento_id')->references('id')->on('eventus');
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
		Schema::dropIfExists(('partecipant'));
    }
}
