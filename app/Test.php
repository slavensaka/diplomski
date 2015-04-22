<?php

namespace Dipl;

use Illuminate\Database\Eloquent\Model;

class Test extends Model {
	protected $table = 'tests';
	protected $hidden = ['passcode'];
	protected $fillable = ['test_name', 'intro', 'conclusion', 'passcode', 'shuffle', 
						   'test_id', 'is_published','student_id', 
						   'intro_image','conclusion_image','counter_time'];
	public $timestamps = true;

	public static $test_upload_rules = array(
		'test_name'=> 'required|min:3|max:80',
		'intro' => 'min:3',
		'conclusion' => 'min:3',
		'passcode' => 'min:6',
		'counter_time' => 'integer',
		'intro_image'=> 'image',
		'conclusion_image'=> 'image'
	);
	
	public function user()
	{
		return $this->belongsTo('Dipl\User');
	}

	public function questions()
	{
		return $this->hasMany('Dipl\Question');
	}

	public function answers()
    {
        return $this->hasManyThrough('Dipl\Answer', 'Dipl\Question','test_id', 'question_id');
    }

     public function students()
    {
        return $this->belongsToMany('Dipl\Student');
    }


/**
 * Many to many testing
 */

    public function users()
	{
		return $this->belongsToMany('Dipl\User');
	}

}