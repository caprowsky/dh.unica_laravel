<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',31);
            $table->string('descrizione',255)->nullable();
            $table->string('query');
            $table->integer('tipo')->unsigned();
            $table->string('tabella',31);  
            $table->integer('created_id')->unsigned();
			$table->foreign('created_id')->references('id')->on('users');      
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
        Schema::dropIfExists('queries');
    }
}
