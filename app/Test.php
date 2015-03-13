<?php

namespace Dipl;

use Illuminate\Database\Eloquent\Model;

class Test extends Model {
	protected $table = 'tests';
	public $timestamps = true;
	protected $fillable = ['test_name', 'intro', 'conclusion', 'passcode', 'shuffle', 'test_id'];

	public function user()
	{
		return $this->belongsTo('Dipl\User');
	}

	public function questions()
	{
		return $this->hasMany('Dipl\Question');
	}

}