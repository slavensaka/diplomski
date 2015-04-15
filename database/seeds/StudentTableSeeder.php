<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Dipl\Student as Student;


class StudentTableSeeder extends Seeder {

    public function run()
    {
    	// Student1
       Student::create(array(
			'student_name' => 'Slaven',
                  'pass' => Hash::make('123456')
       	));
       // Student2
       Student::create(array(
			'student_name' => 'Pero',
                  'pass' => Hash::make('123456')
       	));
       // Student3
       Student::create(array(
			'student_name' => 'Zoran',
                  'pass' => Hash::make('123456')
       	));
       // Student4
       Student::create(array(
			'student_name' => 'User1',
                  'pass' => Hash::make('123456')
       	));
       // Student5
       Student::create(array(
			'student_name' => 'Novi',
                  'pass' => Hash::make('123456')
       	));
       // Student6
       Student::create(array(
			'student_name' => 'Neko_Novi',
                  'pass' => Hash::make('123456')
       	));
       // Student7
       Student::create(array(
			'student_name' => 'Rush',
                  'pass' => Hash::make('123456')
       	));
       // Student8
       Student::create(array(
			'student_name' => 'Loki',
                  'pass' => Hash::make('123456')
       	));
       // Student9
       Student::create(array(
			'student_name' => 'New User',
                  'pass' => Hash::make('123456')
       	));
       // Student10
       Student::create(array(
			'student_name' => 'User44',
                  'pass' => Hash::make('123456')
       	));
       // Student11
       Student::create(array(
			'student_name' => 'Slavica',
                  'pass' => Hash::make('123456')
       	));
       // Student12
       Student::create(array(
			'student_name' => 'Branimir',
                  'pass' => Hash::make('123456')
       	));
       // Student13
       Student::create(array(
			'student_name' => 'Igor',
                  'pass' => Hash::make('123456')
       	));
       // Student14
       Student::create(array(
			'student_name' => 'Milić',
                  'pass' => Hash::make('123456')
       	));
       // Student15
       Student::create(array(
			'student_name' => 'Korisnik 3',
                  'pass' => Hash::make('123456')
       	));
       // Student16
       Student::create(array(
			'student_name' => 'QuizTaker',
                  'pass' => Hash::make('123456')
       	));
       // Student17
       Student::create(array(
			'student_name' => 'Student Pero',
                  'pass' => Hash::make('123456')
       	));
       // Student18
       Student::create(array(
			'student_name' => 'Student zoro',
                  'pass' => Hash::make('123456')
       	));
    }

}