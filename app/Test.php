<?php

namespace Dipl;

use Illuminate\Database\Eloquent\Model;

class Test extends Model {
	protected $table = 'tests';
	protected $hidden = ['passcode'];
	protected $fillable = ['test_name', 'intro', 'conclusion', 'passcode', 'shuffle', 
						   'test_id', 'is_published','student_id'];
	public $timestamps = true;
	
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