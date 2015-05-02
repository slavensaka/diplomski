<?php namespace Dipl;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = array('tag');

	public static $tag_rules = array(
		// 'title'=> 'required|min:3',
		// 'question_image'=> 'image'
	);

	public function tests() {
		return $this->belongsToMany('Dipl\Test');
	}

}
