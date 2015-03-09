<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsTable extends Migration {

	public function up()
	{
		Schema::create('tests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('test_name');
			$table->string('intro');
			$table->text('conclusion');
			$table->string('passcode', 60);
			$table->boolean('shuffle');
			$table->unsignedInteger('user_id');
		});
	}

	public function down()
	{
		Schema::drop('tests');
	}
}