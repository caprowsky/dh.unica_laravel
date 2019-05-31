<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',31);
            $table->string('inizio',15)->nullable();
            $table->string('datai_note',255)->nullable();
            $table->string('fine',15)->nullable();
            $table->string('dataf_note',255)->nullable();
            $table->string('descrizione',255)->nullable();
       
            $table->integer('luogo_id')->unsigned();
            $table->integer('aggregatore_id')->unsigned();
            
            $table->timestamps(); 
            $table->foreign('luogo_id')->references('id')->on('logus');
            $table->foreign('aggregatore_id')->references('id')->on('acorradoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(('eventus'));
    }
}
