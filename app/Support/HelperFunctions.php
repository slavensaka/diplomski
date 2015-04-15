<?php namespace Dipl\Support;

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

}