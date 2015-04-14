<?php namespace Dipl;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

	protected $table = 'students';
	protected $fillable = array('student_name','taken_test_id','test_result');
	public $timestamps = true;

	public function taken_tests()
    {
        return $this->belongsToMany('Dipl\Test');
    }

}