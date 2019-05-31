<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Documentus extends Migration
{
    public function up()
    {
        Schema::create('documentus', function (Blueprint $table) {
            $table->increments('id');
            $table->text('titolo');
            $table->text('creatore')->nullable();
            $table->text('soggetto')->nullable();
            $table->text('descrizione')->nullable();
            $table->text('editore')->nullable();
            $table->text('contributore')->nullable();            
            $table->string('data',15)->nullable();
            $table->string('data_note',255)->nullable();
            $table->integer('tipo')-unsigned();
            $table->string('formato',255)->nullable();
            $table->string('identificatore',255)->nullable();
            $table->string('lingua',255)->nullable();
            $table->string('lingua_det',255)->nullable();
            $table->text('diritti')->nullable();
            $table->text('file')->nullable();
            
            
            $table->integer('collezione_id')->unsigned();
            $table->integer('evento_id')->unsigned();
            
            $table->integer('created_id')->unsigned();
            $table->integer('updated_id')->unsigned();            
                        
            
            $table->timestamps(); 
            $table->foreign('evento_id')->references('id')->on('eventus');
            $table->foreign('collezione_id')->references('id')->on('colletzionis');
 
			$table->foreign('created_id')->references('id')->on('users');
            $table->foreign('updated_id')->references('id')->on('users');
 
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists(('documentus'));
    }
}
