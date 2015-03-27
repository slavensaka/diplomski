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
			$table->boolean('shuffle')->default('0');
			$table->boolean('is_published')->default('0');
			$table->unsignedInteger('user_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('tests');
	}
}