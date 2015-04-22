<?php namespace Dipl;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
	 use SoftDeletes;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';


	public $timestamps = true;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'is_admin'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	/**
	 * The attributes protected
	 *
	 * @var array
	 */
 	protected $dates = ['deleted_at'];
    /**
    *
    * One to many with tests
    *
    **/

	public function tests()
	{
		return $this->hasMany('Dipl\Test');
	}

    /**
    *
    * Has many thorugh User - 
    *
    **/
    
	public function questions()
    {
        return $this->hasManyThrough('Dipl\Question', 'Dipl\Test','id', 'user_id');
    }

    /**
    *
    * Many to many with tests 
    *
    **/

    public function taken_tests()
    {
        return $this->belongsToMany('Dipl\Test');
    }

}
