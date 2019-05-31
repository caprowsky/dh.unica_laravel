<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcapiuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('acapius', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('de_id')->unsigned();
    $table->foreign('de_id')->references('id')->on('documentus');
	$table->integer('a_id')->unsigned();
    $table->foreign('a_id')->references('id')->on('documentus');
    $table->integer('tipo')->unsigned();
    $table->string('descrizione')->nullable();
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
        Schema::dropIfExists(('acapius'));
    }
}
