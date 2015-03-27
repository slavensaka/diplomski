<?php namespace Dipl;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $table = 'questions';
	protected $fillable = array('question','points','shuffle_question','type','test_id');
	public $timestamps = false;
	
	public function answers()
	{
		return $this->hasMany('Dipl\Answer');
	}

	public function test()
	{
		return $this->belongsTo('Dipl\Test');
	}

}