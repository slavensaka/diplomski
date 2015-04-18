<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsTable extends Migration {

	public function up()
	{
		Schema::create('tests', function(Blueprint $table) {
			$table->increments('id');
			$table->string('test_name');
			$table->string('intro');
			$table->text('conclusion');
			$table->string('passcode', 60);
			$table->string('intro_image',400)->default('');
			$table->string('conclusion_image',400)->default('');
			$table->boolean('shuffle')->default('0');
			$table->boolean('is_published')->default('0');
			$table->boolean('is_public')->default('0');
			$table->unsignedInteger('user_id');
			// $table->unsignedInteger('student_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('tests');
	}
}