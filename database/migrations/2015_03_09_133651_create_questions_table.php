<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
			$table->increments('id');
			$table->text('question');
			$table->integer('points');
			$table->string('question_image',400)->default('');
			$table->boolean('shuffle_question')->default('0');
			$table->enum('type', array('true_false', 'multiple_choice', 'multiple_response', 'fill_in'));
			$table->unsignedInteger('test_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('questions');
	}
}