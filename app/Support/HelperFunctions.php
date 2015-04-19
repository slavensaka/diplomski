<?php namespace Dipl\Support;
use Input;
use Str;
use Config;
use Image;

class HelperFunctions {

     public static function CheckOnlyOneSelected($items) {
     		$items_sum =array_sum($items);
     		if($items_sum === 0) {
     			return 'Error, only one must be correct';
     		} else if($items_sum > 1 ) {
     			return 'Error, more than one are correct';
     		} else {
     			return 'Success';
     		}
        }

     public static function array_change_value_case($array, $case = CASE_LOWER){
           	if ( ! is_array($array)) return false;
           	foreach ($array as $key => &$value){
            if (is_array($value))
            call_user_func_array(__function__, array (&$value, $case ) ) ;
            else
            	$array[$key] = ($case == CASE_UPPER )
            	? strtoupper($array[$key])
                : strtolower($array[$key]);
            }
            return $array;
        }

     public static function generate_password($length = 10){
            $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
                    '0123456789';
            $str = '';
            $max = strlen($chars) - 1;
            for ($i=0; $i < $length; $i++)  $str .= $chars[mt_rand(0, $max)];
            return $str;
    }

    public static function get_slug_upload_make_image($inputed_file = null){

        $intro_image = $inputed_file;
        $intro_image_filename = $intro_image->getClientOriginalName();
        $intro_image_filename = pathinfo($intro_image_filename, PATHINFO_FILENAME);
        $intro_fullname = Str::slug(Str::random(8).$intro_image_filename).'.'. $intro_image->getClientOriginalExtension();
        $intro_image_upload = $intro_image->move(Config::get( 'test_images.upload_folder'),$intro_fullname);
        Image::make($intro_image_upload)->resize(Config::get( 'test_images.width'), Config::get( 'test_images.height'))
        ->save();
        // $resize_test_upload = Image::make(Config::get('test_images.upload_folder').'/'.$intro_fullname)
        // ->resize(Config::get('test_images.width'),Config::get('test_images.height'))
        // ->save
        $make =Image::make(Config::get( 'test_images.upload_folder').'/'.$intro_fullname)
        ->resize(Config::get( 'test_images.thumb_width'), Config::get( 'test_images.thumb_height'))
        ->save(Config::get( 'test_images.thumb_folder').'/'.$intro_fullname);
        return $intro_fullname;
        }

     public static function question_get_slug_upload_make_image($inputed_file = null){

        $intro_image = $inputed_file;
        $intro_image_filename = $intro_image->getClientOriginalName();
        $intro_image_filename = pathinfo($intro_image_filename, PATHINFO_FILENAME);
        $intro_fullname = Str::slug(Str::random(8).$intro_image_filename).'.'. $intro_image->getClientOriginalExtension();
        $intro_image_upload = $intro_image->move(Config::get( 'question_images.upload_folder'),$intro_fullname);
        Image::make($intro_image_upload)->resize(Config::get( 'question_images.width'), Config::get( 'question_images.height'))
        ->save();
        // $resize_test_upload = Image::make(Config::get('question_images.upload_folder').'/'.$intro_fullname)
        // ->resize(Config::get('question_images.width'),Config::get('question_images.height'))
        // ->save
        $make =Image::make(Config::get( 'question_images.upload_folder').'/'.$intro_fullname)
        ->resize(Config::get( 'question_images.thumb_width'), Config::get( 'question_images.thumb_height'))
        ->save(Config::get( 'question_images.thumb_folder').'/'.$intro_fullname);
        return $intro_fullname;
        }

}

