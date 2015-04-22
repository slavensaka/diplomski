<?php namespace Dipl;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

	protected $table = 'students';
	protected $fillable = array('student_name','pass');
	public $timestamps = true;
	protected $hidden = ['pass'];

	public static $student_rules = array(
		'student_name'=> 'required|min:3|max:80',
		'pass' => 'min:6'
	);

	public function taken_tests()
    {
        return $this->belongsToMany('Dipl\Test');
    }

}