<?php namespace Dipl\Http\Controllers;

use Dipl\Http\Requests;
use Dipl\Http\Controllers\Controller;
use Session;
use Input;
use Hash;
use Dipl\Student;
use Redirect;
use Dipl\Support\HelperFunctions;
use Illuminate\Http\Response;
/**

	TODO:
	- Generate a random pass for User 1234 and echo it out in student login.
	- 

**/


class StudentController extends Controller {

	public function student_login() {
		return view('students.student_login')
			->with('student_name',Session::get('student_name'));
	}

	public function student_login_verify() {
		// dd(Input::all());
		$student_name = Input::get('student_name');

		$student = Student::where('student_name', '=', $student_name)->exists();

		if(!$student){
			  return Redirect::back()->with('name','Student with than username not found.'); 
		} else {
			$stud = Student::where('student_name', '=', $student_name)->first();
			
			if (!Hash::check(Input::get('pass'), $stud->pass)) {

				return Redirect::back()->with('pass_message','Password incorrect.');
			} else {
					return "lorem";
			}
		}
	}

	public function student_register() {
			
	}
}
