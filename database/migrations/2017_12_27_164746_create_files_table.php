<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('files', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('documento_id')->unsigned()->nullable();
    $table->foreign('documento_id')->references('id')->on('documentus');
    $table->string('filename');
    $table->string('local');
    $table->integer('size')->unsigned();
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
        Schema::dropIfExists(('files'));
    }
}
