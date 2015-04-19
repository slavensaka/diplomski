<?php namespace Dipl;

use Illuminate\Database\Eloquent\Model;

class Question extends Model {

	protected $table = 'questions';
	protected $fillable = array('question','points','shuffle_question','type','test_id','question_image');
	public $timestamps = false;

	public static $question_image_upload_rules = array(
		// 'title'=> 'required|min:3',
		'question_image'=> 'image'
	);
	
	public function answers()
	{
		return $this->hasMany('Dipl\Answer');
	}

	public function test()
	{
		return $this->belongsTo('Dipl\Test');
	}

	

}