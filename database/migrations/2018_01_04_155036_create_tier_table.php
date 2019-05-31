<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('tiers', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nome',255);
			$table->text('descrizione')->nullable();
			$table->double('inizio')->unsigned();
			$table->double('fine')->unsigned();
			
			$table->integer('documento_id')->unsigned();
			$table->integer('esecutore_id')->unsigned();
			
			$table->integer('created_id')->unsigned();
            $table->integer('updated_id')->unsigned();            
                                   
            $table->timestamps(); 
            
            $table->foreign('documento_id')->references('id')->on('documentus');
            $table->foreign('esecutore_id')->references('id')->on('esecudoris');
           
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
         Schema::dropIfExists(('tiers'));
    }
}
