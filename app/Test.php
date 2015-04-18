<?php

namespace Dipl;

use Illuminate\Database\Eloquent\Model;

class Test extends Model {
	protected $table = 'tests';
	protected $hidden = ['passcode'];
	protected $fillable = ['test_name', 'intro', 'conclusion', 'passcode', 'shuffle', 
						   'test_id', 'is_published','student_id', 
						   'intro_image','conclusion_image'];
	public $timestamps = true;

	public static $test_image_upload_rules = array(
		// 'title'=> 'required|min:3',
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