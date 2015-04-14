<?php namespace Dipl\Http\Controllers;

use Dipl\Http\Requests;
use Dipl\Http\Controllers\Controller;
use Session;
use Input;
use Dipl\Support\HelperFunctions;
use Illuminate\Http\Response;

class StudentController extends Controller {

	public function student_login() {
		return view('students.student_login')
			->with('student_name',Session::get('student_name'));
	}

	public function student_login_verify() {
		
		return Input::get('student_name');
	}

}
