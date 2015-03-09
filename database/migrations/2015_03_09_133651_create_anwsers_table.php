<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnwsersTable extends Migration {

	public function up()
	{
		Schema::create('anwsers', function(Blueprint $table) {
			$table->increments('id');
			$table->text('answer');
			$table->boolean('correct');
			$table->unsignedInteger('question_id');
		});
	}

	public function down()
	{
		Schema::drop('anwsers');
	}
}