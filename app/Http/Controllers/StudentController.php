<?php namespace Dipl\Http\Controllers;

use Dipl\Http\Requests;
use Dipl\Http\Controllers\Controller;
use Session;
use Input;
use Hash;
use DB;
use Dipl\Tag;
use View;
use Validator;
use Dipl\Student;
use Redirect;
use Request;
use Dipl\Test;
use Dipl\Support\HelperFunctions;
use Response;

class StudentController extends Controller {

	
	public function student_login() {
		$tags = [];
		foreach (Tag::all() as $tag)
		{
    	$tags[] = $tag->tag;
    	
		}
		$tag_unique = array_unique($tags);

		if(Session::has("logged_in")){
			return redirect()->route('control_panel',
						['redirect_name' => Session::get('student_name')])
			->with('tag_unique',$tag_unique);
		} else {
		return view('students.student_login')
			->with('student_name',Session::get('student_name'));
		}
	}

	public function student_login_verify() {
		// dd(Input::all());
$tags = [];
		foreach (Tag::all() as $tag)
		{
    	$tags[] = $tag->tag;
    	
		}
		$tag_unique = array_unique($tags);	
		$validation = Validator::make(Input::all(), Student::$student_rules);
		if($validation->fails()){
				return Redirect::back()->withInput()->withErrors($validation);
			} else {

		$student_name = Input::get('student_name');
		Session::put("student_name",Input::get("student_name"));//TU

		$student = Student::where('student_name', '=', $student_name)->exists();

		if(!$student){
			  return Redirect::back()->with('name','Student with than username not found.'); 
		} else {
			$stud = Student::where('student_name', '=', $student_name)->first();
			
			if (!Hash::check(Input::get('pass'), $stud->pass)) {

				return Redirect::back()->with('pass_message','Password incorrect.');
			} else {
				$student_changed_password = DB::table('students')
				->where('student_name', "=", $student_name)->pluck('changed_password');
				
				if($student_changed_password){
					// dd($student_name);
					// return view('students.control_panel');
				 // return Redirect::route('control_panel')
					// ->with('student_name',$student_name);
					return redirect()->route('control_panel',
						['redirect_name' => $student_name ])
					->with('tag_unique',$tag_unique);

				} else {
				return view('students.verify')
				->with('student_name',$student_name)
				->with('pass', Input::get('pass'))
				->with('student_changed_password',$student_changed_password);
			}
			}
		}
	}
	}

	public function control_panel() {
		// dd(Input::all());
		Session::put("logged_in",1);
		$tags = [];
		foreach (Tag::all() as $tag)
		{
    	$tags[] = $tag->tag;
    	
		}
		$tag_unique = array_unique($tags);


		if(!Input::all()){
			return view('students.control_panel')
					->with('student_name',Session::get("student_name"))
					->with('tag_unique',$tag_unique) ;
		}
		if(!Input::get("redirect_name")){
		$affected = Student::where('student_name', '=', Input::get('student_name'))
			->update(array('pass' => Hash::make(Input::get("pass")), 
						   'changed_password' => Input::get("changed_password")));
			Session::put("changed", 1);
		if($affected){
			return view('students.control_panel')
					->with('student_name',Input::get('student_name'))
					->with('tag_unique',$tag_unique) ;
		} else {
			Redirect::back()->with("message","Password not save, Try again");
		}
	  } else {
	  	
	  	// return "Lorem";

	  	return view('students.control_panel')
					->with('student_name',Input::get('student_name'))
					->with('tag_unique',$tag_unique) ;
	  }
	}

	public function student_register() {
		return view('students.student_register');
	}

	public function student_register_form() {
		$validation = Validator::make(Input::all(), Student::$student_rules);
		if($validation->fails()){
				return Redirect::back()->withInput()->withErrors($validation);
			} else {
		$student_name = Input::get('student_name');
		$student = Student::where('student_name', '=',$student_name)->exists();
		if($student){
			return Redirect::back()
				->with("name_message","Username taken, Try again!");
			} else {
				$student = new Student;
				$student->student_name = Input::get("student_name");
				$student->changed_password = 1;
				$student->pass = Hash::make(Input::get("pass"));
				$student->save();

				Session::put("logged_in",1);
				return view('students.control_panel')
					->with('student_name',Input::get('student_name'));
		}}
	}

	public function student_logout() {
 		Session::forget('student_name');
        Session::forget("changed"); 
        Session::forget("logged_in");
        return Redirect::route('/');
	}

	public function postSearch(){
		
		if(Request::ajax()) {
			$q = Input::get('query');
			$posts = Test::whereRaw("MATCH(test_name) AGAINST(? IN BOOLEAN MODE)", array($q))->get();

			$new =$posts->filter(function($post){
				if($post->is_published == 1){
					return true;
				}
			});
			 return json_encode($new);	
		}   
	}

	public function postSearchTag(){
		if(Request::ajax()) {
			$q = Input::get('query_tag');
			
			$tags = Test::whereHas('tags',function($query) use ($q){
				$query->where("tag",$q);
			})->get();

			$new =$tags->filter(function($post){
				if($post->is_published == 1){
					return true;
				}
			});

			return json_encode($new);
		}   
	}
}
