<?php namespace Dipl;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {

	protected $table = 'anwsers';
	protected $fillable = array('answer','correct');
	public $timestamps = false;

	public function question()
	{
		return $this->belongsTo('Dipl\Question');
	}

}