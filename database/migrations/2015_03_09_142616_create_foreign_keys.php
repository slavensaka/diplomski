<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('tests', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('test_id')->references('id')->on('tests')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('anwsers', function(Blueprint $table) {
			$table->foreign('question_id')->references('id')->on('questions')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('tests', function(Blueprint $table) {
			$table->dropForeign('tests_user_id_foreign');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_test_id_foreign');
		});
		Schema::table('anwsers', function(Blueprint $table) {
			$table->dropForeign('anwsers_question_id_foreign');
		});
	}
}