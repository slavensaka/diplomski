<?php namespace Dipl\Support;

class HelperFunctions {

 public static function CheckOnlyOneSelected($items) {
 		$items_sum =array_sum($items);
 		if($items_sum === 0) {
 			return 'Jedan mora biti točan';
 		} else if($items_sum > 1 ) {
 			return 'Više od jedan nesmije biti točan';
 		} else {
 			return 'Spremljeno';
 		}
    }

}