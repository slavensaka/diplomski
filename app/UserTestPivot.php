<?php namespace Dipl;

use Illuminate\Database\Eloquent\Model;

class UserTestPivot extends Model {

	protected $table = 'test_user';
	protected $fillable = array('user_id','test_id');
	public $timestamps = true;
}