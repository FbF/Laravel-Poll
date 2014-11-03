<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFbfPollTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fbf_polls', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('question');
            $table->string('answer1');
			$table->integer('answer1_count')->default(0); 
            $table->string('answer2');
			$table->integer('answer2_count')->default(0); 
            $table->string('answer3');
			$table->integer('answer3_count')->default(0); 
            $table->tinyInteger('active');
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
		Schema::drop('fbf_polls');
	}

}
