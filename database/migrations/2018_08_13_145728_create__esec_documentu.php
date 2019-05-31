<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEsecDocumentu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('esec_documentu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruolo',31);        
            $table->string('descrizione',255)->nullable();
       
            $table->integer('documento_id')->unsigned();
            $table->integer('esecutore_id')->unsigned();
            
            $table->timestamps(); 
            $table->foreign('documento_id')->references('id')->on('documentus');
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
		Schema::dropIfExists(('esec_documentu'));
    }
}
