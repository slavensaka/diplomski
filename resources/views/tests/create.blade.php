@extends('app')
@section('content')
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/one_correct_answer.js') !!}

@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Create a New Test</h1>


	{!! Form::open(array('route' => 'tests.store', 'files'=> true)) !!}
 	{!! Form::label('test_name', 'Test name:',["class"=>"lead"]) !!}
	 <div>
	{!! Form::textarea('test_name', Input::old('test_name'), 
		['required' => "required", 'placeholder'=>'Type the test name', 
		 'class' => 'field','size' => '30x2']) !!}

		<b>Making the test name descriptive ensures making it findable by others.</b>
	</div>
	<div><?php echo $errors->first('test_name', '<p class=" text-danger">:message</p>'); ?></div>
	{!! Form::label('intro', 'Intro message:') !!}
	<div>
	{!! Form::textarea('intro', Input::old('intro'), 
		['placeholder'=>'Type the intro message', 'class' => 'field','size' => '30x5']) !!}
		<b>Displayed message at the start of test</b>
	</div>
	<div><?php echo $errors->first('intro', '<p class=" text-danger">:message</p>'); ?></div>
	<div>
	{!! Form::label('intro_image', 'Intro image:') !!}
	{!! Form::file('intro_image', array('class' => 'btn btn-info')) !!}
 	<?php //  echo $errors->first('intro_image', '<p>:Lorem</p>'); ?>
	<b>Intro image</b>
	</div>
	<div>	<?php echo $errors->first('intro_image', '<p class=" text-danger">:message</p>'); ?>
</div>
	<div>
	{!! Form::label('conclusion_image', 'Conclusion image:') !!}
	{!! Form::file('conclusion_image') !!}
	
	<b>Conclusion image</b>
	</div>
	<div><?php echo $errors->first('conclusion_image', '<p class=" text-danger">:message</p>'); ?></div>
	{!! Form::label('conclusion', 'Test conclusion message:') !!}
	<div>
	{!! Form::textarea('conclusion', Input::old('conclusion'), 
		['placeholder'=>'Type the conclusion message', 'class' => 'field','size' => '30x5']) !!}
		<b>Displayed message after the test was completed</b>
	</div>
	<div>	<?php echo $errors->first('conclusion', '<p class=" text-danger">:message</p>'); ?>
</div>
	<div>
		{!! Form::label('counter_time', 'Time of test in minutes:') !!}
		{!! Form::select('counter_time', ["no time", 
									       1, 2, 3,4,5,6,7,8,9,10,
										   11,12,13,14,15,16,17,18,19,20,
										   21,22,23,24,25,26,27,28,29,30,
										   31,32,33,34,35,36,37,38,39,40,
										   41,42,43,44,45,46,47,48,49,50,
										   51,52,53,54,55,56,57,58,59,60 ], 0) !!}
		<b>Counter to test end [minutes]</b>
	</div>
	<div>	<?php echo $errors->first('counter_time', '<p class=" text-danger">:message</p>'); ?>
</div>
	<div>
	{!! Form::label('shuffle', 'Shuffle test questions') !!}
	{!! Form::hidden("shuffle", 0, false) !!}
	{!! Form::checkbox("shuffle", 1, Input::old('shuffle')) !!}
	<b>Questions order will be random on creation when student starts taking test
	</b>
	</div>
	<div>	<?php echo $errors->first('shuffle', '<p class=" text-danger">:message</p>'); ?>
</div>
	<div>
	{!! Form::label('passcode', 'Passcode') !!}
	{!! Form::text('passcode', NULL ,array('placeholder' => 'Enter passcode')) !!}
	<b>If left blank, passcode field will be left empty.</b>
	</div>
	<div>	<?php echo $errors->first('passcode', '<p class=" text-danger">:message</p>'); ?>
</div>
	<div>
	{!! Form::label('is_public', 'Is test public') !!}
	{!! Form::hidden("is_public", 0, false) !!}
	{!! Form::checkbox("is_public", 1, Input::old('is_public')) !!}	
	<b>Or it will be private.</b> 
	<div><b>Public test doesn't need a passcode, but you can still enter it, if later you 
	decide to make the test private.</b><div>
	</div>
	<br/>
	{!! Form::submit('Create Test', array('class' => 'btn btn-info')) !!}
	{!! link_to_route('/', 'Go Back ', array(), 
			array('class' => 'btn btn-primary')) !!}
	<br/><br/>
	{!! Form::reset('Reset Form Fields', array('class' => 'btn btn-danger')) !!}
	
	{!! Form::close() !!}

@endif
@endsection