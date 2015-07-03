<?php namespace Dipl\Http\Controllers;

use DB;
use Str;
use Auth;
use File;
use Hash;
use Input;
use Image;
use Config;
use Dipl\Tag;
use Redirect;
use Dipl\User;
use Dipl\Test;
use Validator;
use Carbon\Carbon;
use Dipl\Http\Requests;
use Illuminate\Http\Request;
use Dipl\Support\HelperFunctions;
use Dipl\Http\Controllers\Controller;

class TestController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tests = User::find(Auth::id())->tests()->paginate(10);
		return view('users.index', compact('tests'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tests/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// dd(Input::all());
		$validation = Validator::make(Input::all(), Test::$test_upload_rules);
			$counter_time = Input::get("counter_time");	
			$counter_time *=  60;
			if($validation->fails()){
				return Redirect::back()->withInput()->withErrors($validation);
			} else {

				if(Input::file('intro_image') && Input::file('conclusion_image')){
					$intro_fullname = HelperFunctions::get_slug_upload_make_image(Input::file('intro_image'));
					$conclusion_fullname = HelperFunctions::get_slug_upload_make_image(Input::file('conclusion_image'));		
					$test = new Test;
					$test->test_name = Input::get('test_name');
					$test->intro = Input::get('intro');
					$test->conclusion = Input::get('conclusion');
					$test->passcode = Hash::make(Input::get('passcode'));
					$test->intro_image = $intro_fullname;
					$test->conclusion_image = $conclusion_fullname;
					$test->counter_time =$counter_time;
					$test->shuffle = Input::get('shuffle');
					$test->is_public = Input::get('is_public');
					$user = User::find(Auth::user()->id);
					$user=(string)$user->id;
					$test->user_id = $user;
					$test->save();
				} elseif(Input::file('conclusion_image')){
					$conclusion_fullname = HelperFunctions::get_slug_upload_make_image(Input::file('conclusion_image'));		
					$test = new Test;
					$test->test_name = Input::get('test_name');
					$test->intro = Input::get('intro');
					$test->conclusion = Input::get('conclusion');
					$test->passcode = Hash::make(Input::get('passcode'));
					$test->conclusion_image = $conclusion_fullname;
					$test->counter_time =$counter_time;
					$test->shuffle = Input::get('shuffle');
					$test->is_public = Input::get('is_public');
					$user = User::find(Auth::user()->id);
					$user=(string)$user->id;
					$test->user_id = $user;
					$test->save();
				} elseif(Input::file('intro_image')){
					
					$intro_fullname = HelperFunctions::get_slug_upload_make_image(Input::file('intro_image'));
					$test = new Test;
					$test->test_name = Input::get('test_name');
					$test->intro = Input::get('intro');
					$test->conclusion = Input::get('conclusion');
					$test->passcode = Hash::make(Input::get('passcode'));
					$test->intro_image = $intro_fullname;
					$test->counter_time =$counter_time;
					$test->shuffle = Input::get('shuffle');
					$test->is_public = Input::get('is_public');
					$user = User::find(Auth::user()->id);
					$user=(string)$user->id;
					$test->user_id = $user;
					$test->save();
					
				} else {
					$test = new Test;
					$test->test_name = Input::get('test_name');
					$test->intro = Input::get('intro');
					$test->conclusion = Input::get('conclusion');
					$test->passcode = Hash::make(Input::get('passcode'));
					$test->counter_time =$counter_time;
					$test->shuffle = Input::get('shuffle');
					$test->is_public = Input::get('is_public');
					$user = User::find(Auth::user()->id);
					$user=(string)$user->id;
					$test->user_id = $user;
					$test->save();
				}				
				
				$last_test_id=DB::getPdo()->lastInsertId();
				$tags = Input::get('tags');
				$tag = explode(",",$tags);
				for($i=0;$i < count($tag) ;$i++){
					$tagging = new Tag(array('tag' => $tag[$i]));
					Test::find($last_test_id)->tags()->save($tagging);
				}
				return Redirect::route('tests')
					->with('message','CREATED NEW TEST');
			}
		}
	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$test = Test::find($id);
		$tagging = array();
		if(is_null($test)) {
			return Redirect::route('tests');
		}
		$tags = Test::find($id)->tags()->select('tag')->get();	
		foreach ($tags as $key => $tag) {
			$tagging[]=$tag->tag;
			
		}
		// dd($tagging);
		$str = implode (", ", $tagging);
		
		return view('tests.edit',compact('test'))
		->with("tag",$str)
		->with("tagging",$tagging);	
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
		// dd(Input::all());

		$counter_time = Input::get("counter_time");
		if(Input::get("counter_time") == 0){
			$counter_time =DB::table('tests')->where('id', $id)->pluck("counter_time");	
		} else {
			$counter_time =$counter_time-1; 
			$counter_time *=  60;
		}
		$validation = Validator::make(Input::all(), Test::$test_upload_rules);

		if($validation->fails()){
				return Redirect::back()->withInput()->withErrors($validation);
			} else {

				$passcode = Hash::make(Input::get('passcode'));
				$updated_at = Carbon::now();
				$intro='intro'; 
				$conclusion = 'conclusion';

				if(Input::file('intro_image') && Input::file('conclusion_image') ){
					$intro_fullname = HelperFunctions::update_slug_upload_make_image(
						$intro,Input::file('intro_image'),Input::get('test_id'));
 					$conclusion_fullname = HelperFunctions::update_slug_upload_make_image(
						$conclusion,Input::file('conclusion_image'),Input::get('test_id'));
 					DB::table('tests')->where('id', $id)->update(array(
						'test_name' => Input::get('test_name'), 'intro' => Input::get('intro'),
						'conclusion' => Input::get('conclusion'), 'counter_time' => $counter_time,
						'shuffle' => Input::get('shuffle'),'passcode' => $passcode,
						'updated_at' => $updated_at, 'conclusion_image'=> $conclusion_fullname,
						'intro_image' => $intro_fullname
						));
					
				} elseif(Input::file('conclusion_image')){
					$conclusion_fullname = HelperFunctions::update_slug_upload_make_image(
						$conclusion,Input::file('conclusion_image'),Input::get('test_id'));		
					DB::table('tests')->where('id', $id)->update(array(
						'test_name' => Input::get('test_name'), 'intro' => Input::get('intro'),
						'conclusion' => Input::get('conclusion'), 'counter_time' => $counter_time,
						'shuffle' => Input::get('shuffle'),'passcode' => $passcode,
						'updated_at' => $updated_at, 'conclusion_image'=> $conclusion_fullname
						));
 				} else if( Input::file('intro_image')){
 					$intro_fullname = HelperFunctions::update_slug_upload_make_image(
						$intro,Input::file('intro_image'),Input::get('test_id'));
			
					DB::table('tests')->where('id', $id)->update(array(
						'test_name' => Input::get('test_name'), 'intro' => Input::get('intro'),
						'conclusion' => Input::get('conclusion'), 'counter_time' => $counter_time,
						'shuffle' => Input::get('shuffle'),'passcode' => $passcode, 
						'updated_at' => $updated_at, 'intro_image' => $intro_fullname
						));
					
 				} else {
					DB::table('tests')->where('id', $id)->update(array(
						'test_name' => Input::get('test_name'), 'intro' => Input::get('intro'),
						'conclusion' => Input::get('conclusion'), 'counter_time' => $counter_time,
						'shuffle' => Input::get('shuffle'),'passcode' => $passcode,'updated_at' => $updated_at
						));
				}

				$tags = Input::get('tags');
				$tag = explode(",",$tags);
				for($i=0;$i < count($tag) ;$i++){
					$tagging = new Tag(array('tag' => $tag[$i]));
					Test::find(Input::get('test_id'))->tags()->save($tagging);
				}				
				return Redirect::route('tests.index', $id)
				->with('message', 'TEST UPDATED');
			}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Respons
	 */
	public function destroy($id)
	{
		Test::find($id)->delete();
		return Redirect::route('tests.index');
	}

	public function intro_image_delete() {
		// dd(Input::get("intro_image"));
		File::delete(Config::get('test_images.upload_folder').'/'.Input::get("intro_image"));
        File::delete(Config::get('test_images.thumb_folder').'/'.Input::get("intro_image"));

        DB::table('tests')->where('intro_image', '=', Input::get("intro_image"))
        ->update(array("intro_image"=> ""));
        return Redirect::back()->with("intro_image_message", "Intro Image Succesfully deleted");
	}

	public function conclusion_image_delete() {
		// dd(Input::get("conclusion_image"));

		File::delete(Config::get('test_images.upload_folder').'/'.Input::get("conclusion_image"));
		File::delete(Config::get('test_images.thumb_folder').'/'.Input::get("conclusion_image"));

		DB::table('tests')->where('conclusion_image','=',Input::get("conclusion_image"))
		->update(array("conclusion_image" => ""));

		return Redirect::back()->with("conclusion_image_message","Conclusion Image Succesfully deleted");
	}

	public function delete_tags() {
		$test_id = Input::get("test_id");
		$affe = Test::find($test_id)->tags()->delete();
		return Redirect::back()->with("tags_message","Tags successfully deleted");
	}
	// public function getNameAttribute($value)
	// {
 //    return Crypt::decrypt($value);
	// }
	
	// public function setNameAttribute($value)
	// {
	//     $this->attributes['name'] = Crypt::encrypt($value);
	// }
	
}
