<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
		Schema::create('intervals', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('seq')->unsigned();
			$table->text('nota')->nullable();
			$table->double('inizio')->unsigned();
			$table->double('fine')->unsigned();
			
			$table->integer('tier_id')->unsigned();
			
			 $table->foreign('tier_id')->references('id')->on('tiers');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(('intervals'));
    }
}
