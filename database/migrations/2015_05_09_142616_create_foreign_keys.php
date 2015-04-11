<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('tests', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('test_id')->references('id')->on('tests')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('anwsers', function(Blueprint $table) {
			$table->foreign('question_id')->references('id')->on('questions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_test', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_test', function(Blueprint $table) {
			$table->foreign('test_id')->references('id')->on('tests')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('test_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('test_user', function(Blueprint $table) {
			$table->foreign('test_id')->references('id')->on('tests')
						->onDelete('cascade')
						->onUpdate('cascade');
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

		//TODO
		// Schema::table('student_test', function(Blueprint $table) {
		// 	$table->dropForeign('students_tests_student_id_foreign');
		// });
		// Schema::table('student_test', function(Blueprint $table) {
		// 	$table->dropForeign('students_tests_test_id_foreign');
		// });
	}
}