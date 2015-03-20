<?php

namespace Dipl;

use Illuminate\Database\Eloquent\Model;

class Test extends Model {
	protected $table = 'tests';
	public $timestamps = true;
	protected $fillable = ['test_name', 'intro', 'conclusion', 'passcode', 'shuffle', 
						   'test_id', 'is_published'];

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

}