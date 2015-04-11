<?php

use Illuminate\Database\Seeder;
use Dipl\UserTestPivot as UserTestPivot;

class UserTestPivotTableSeeder extends Seeder {

    public function run()
    {
        UserTestPivot::create(array(
			'user_id' => 1,
			'test_id' => 2,
			'test_result' => 12
       	));
       	UserTestPivot::create(array(
			'user_id' => 1,
			'test_id' => 3,
			'test_result' => 3
       	));
       	UserTestPivot::create(array(
			'user_id' => 1,
			'test_id' => 2,
			'test_result' => 10
       	));
       	UserTestPivot::create(array(
			'user_id' => 1,
			'test_id' => 4,
			'test_result' => 9
       	));
       	UserTestPivot::create(array(
			'user_id' => 1,
			'test_id' => 5,
			'test_result' => 0
       	));
       	UserTestPivot::create(array(
			'user_id' => 1,
			'test_id' => 6,
			'test_result' => 1
       	));
       	UserTestPivot::create(array(
			'user_id' => 1,
			'test_id' => 1,
			'test_result' => 3
       	));
       	UserTestPivot::create(array(
			'user_id' => 2,
			'test_id' => 1,
			'test_result' => 10
       	));
       	UserTestPivot::create(array(
			'user_id' => 3,
			'test_id' => 4,
			'test_result' => 13
       	));
       	UserTestPivot::create(array(
			'user_id' => 4,
			'test_id' => 6,
			'test_result' => 3
       	));
       	UserTestPivot::create(array(
			'user_id' => 4,
			'test_id' => 3,
			'test_result' => 9
       	));
       	UserTestPivot::create(array(
			'user_id' => 4,
			'test_id' => 5,
			'test_result' => 25
       	));
       	UserTestPivot::create(array(
			'user_id' => 5,
			'test_id' => 5,
			'test_result' => 23
       	));
       	UserTestPivot::create(array(
			'user_id' => 5,
			'test_id' => 5,
			'test_result' => 12
       	));
       	UserTestPivot::create(array(
			'user_id' => 5,
			'test_id' => 1,
			'test_result' => 23
       	));
       	UserTestPivot::create(array(
			'user_id' => 3,
			'test_id' => 5,
			'test_result' => 23
       	));
       	UserTestPivot::create(array(
			'user_id' => 6,
			'test_id' => 1,
			'test_result' => 32
       	));
       	UserTestPivot::create(array(
			'user_id' => 7,
			'test_id' => 6,
			'test_result' => 16
       	));
       	UserTestPivot::create(array(
			'user_id' => 8,
			'test_id' => 2,
			'test_result' => 23
       	));
       	UserTestPivot::create(array(
			'user_id' => 9,
			'test_id' => 6,
			'test_result' => 21
       	));

    }

}