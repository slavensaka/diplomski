<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Dipl\Student as Student;


class StudentTableSeeder extends Seeder {

    public function run()
    {
    	// Student1
       Student::create(array(
			'student_name' => 'Slaven'
       	));
       // Student2
       Student::create(array(
			'student_name' => 'Pero'
       	));
       // Student3
       Student::create(array(
			'student_name' => 'Zoran'
       	));
       // Student4
       Student::create(array(
			'student_name' => 'User1'
       	));
       // Student5
       Student::create(array(
			'student_name' => 'Novi'
       	));
       // Student6
       Student::create(array(
			'student_name' => 'Neko_Novi'
       	));
       // Student7
       Student::create(array(
			'student_name' => 'Rush'
       	));
       // Student8
       Student::create(array(
			'student_name' => 'Loki'
       	));
       // Student9
       Student::create(array(
			'student_name' => 'New User'
       	));
       // Student10
       Student::create(array(
			'student_name' => 'User44'
       	));
       // Student11
       Student::create(array(
			'student_name' => 'Slavica'
       	));
       // Student12
       Student::create(array(
			'student_name' => 'Branimir'
       	));
       // Student13
       Student::create(array(
			'student_name' => 'Igor'
       	));
       // Student14
       Student::create(array(
			'student_name' => 'Milić'
       	));
       // Student15
       Student::create(array(
			'student_name' => 'Korisnik 3'
       	));
       // Student16
       Student::create(array(
			'student_name' => 'QuizTaker'
       	));
       // Student17
       Student::create(array(
			'student_name' => 'Student Pero'
       	));
       // Student18
       Student::create(array(
			'student_name' => 'Student zoro'
       	));
    }

}