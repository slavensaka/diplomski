<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Dipl\StudentTestPivot as StudentTestPivot;

class StudentTestPivotTableSeeder extends Seeder {

    public function run()
    {
        StudentTestPivot::create(array(
			'student_id' => 1,
			'test_id' => 2,
			'test_result' => 12
       	));
       	StudentTestPivot::create(array(
			'student_id' => 1,
			'test_id' => 3,
			'test_result' => 3
       	));
       	StudentTestPivot::create(array(
			'student_id' => 1,
			'test_id' => 2,
			'test_result' => 10
       	));
       	StudentTestPivot::create(array(
			'student_id' => 1,
			'test_id' => 4,
			'test_result' => 9
       	));
       	StudentTestPivot::create(array(
			'student_id' => 1,
			'test_id' => 5,
			'test_result' => 0
       	));
       	StudentTestPivot::create(array(
			'student_id' => 1,
			'test_id' => 6,
			'test_result' => 1
       	));
       	StudentTestPivot::create(array(
			'student_id' => 1,
			'test_id' => 1,
			'test_result' => 3
       	));
       	StudentTestPivot::create(array(
			'student_id' => 2,
			'test_id' => 1,
			'test_result' => 10
       	));
       	StudentTestPivot::create(array(
			'student_id' => 3,
			'test_id' => 4,
			'test_result' => 13
       	));
       	StudentTestPivot::create(array(
			'student_id' => 4,
			'test_id' => 6,
			'test_result' => 3
       	));
       	StudentTestPivot::create(array(
			'student_id' => 4,
			'test_id' => 3,
			'test_result' => 9
       	));
       	StudentTestPivot::create(array(
			'student_id' => 4,
			'test_id' => 5,
			'test_result' => 25
       	));
       	StudentTestPivot::create(array(
			'student_id' => 5,
			'test_id' => 5,
			'test_result' => 23
       	));
       	StudentTestPivot::create(array(
			'student_id' => 5,
			'test_id' => 5,
			'test_result' => 12
       	));
       	StudentTestPivot::create(array(
			'student_id' => 5,
			'test_id' => 1,
			'test_result' => 23
       	));
       	StudentTestPivot::create(array(
			'student_id' => 3,
			'test_id' => 5,
			'test_result' => 23
       	));
       	StudentTestPivot::create(array(
			'student_id' => 6,
			'test_id' => 1,
			'test_result' => 32
       	));
       	StudentTestPivot::create(array(
			'student_id' => 7,
			'test_id' => 6,
			'test_result' => 16
       	));
       	StudentTestPivot::create(array(
			'student_id' => 8,
			'test_id' => 2,
			'test_result' => 23
       	));
       	StudentTestPivot::create(array(
			'student_id' => 9,
			'test_id' => 6,
			'test_result' => 21
       	));

    }

}