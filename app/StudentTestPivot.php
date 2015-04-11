<?php namespace Dipl;

use Illuminate\Database\Eloquent\Model;

class StudentTestPivot extends Model {

	protected $table = 'student_test';
	protected $fillable = array('student_id','test_id');
	public $timestamps = true;
}