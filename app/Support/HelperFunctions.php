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

}