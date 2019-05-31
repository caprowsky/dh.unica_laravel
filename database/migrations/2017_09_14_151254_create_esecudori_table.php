<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEsecudoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esecudoris', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',255);
            $table->string('cognome',31)->nullable();
            $table->string('alias',255)->nullable();
            $table->integer('tipo');
            $table->date('nascita')->nullable();
            $table->string('datan_note',255)->nullable();
            $table->date('morte')->nullable();
            $table->string('datam_note',255)->nullable();
            $table->string('descrizione',255)->nullable();
            
            
            
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
       Schema::dropIfExists(('esecudoris'));
    }
}
