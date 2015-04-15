@extends('app')
@section('content')
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/one_correct_answer.js') !!}

@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Create a New Test</h1>

	{!! Form::open(array('route' => 'tests.store')) !!}
 	{!! Form::label('test_name', 'Test_name') !!}
	{!! Form::text('test_name', Input::old('test_name'),
		array('required' => "required",'placeholder'=>'Type the test name')) !!}
	<br>
	{!! Form::label('intro', 'Intro') !!}
	{!! Form::textarea('intro', Input::old('intro'), 
		['placeholder'=>'Type the intro', 'class' => 'field','size' => '30x5']) !!}
	<br>
	{!! Form::label('conclusion', 'conclusion') !!}
	{!! Form::textarea('conclusion', Input::old('conclusion'), 
		['placeholder'=>'Type the conclusion', 'class' => 'field','size' => '30x5']) !!}
	<br>
	{!! Form::label('passcode', 'Passcode') !!}
	{!! Form::text('passcode', NULL ,array('placeholder' => 'Enter passcode')) !!}
	<br>
	{!! Form::label('is_public', 'Is test public') !!}
	{!! Form::hidden("is_public", 0, false) !!}
	{!! Form::checkbox("is_public", 1, Input::old('is_public')) !!}
	<br>
	{!! Form::label('shuffle', 'Shuffle test questions') !!}
	{!! Form::hidden("shuffle", 0, false) !!}
	{!! Form::checkbox("shuffle", 1, Input::old('shuffle')) !!}
	<br>	
	{!! Form::submit('Send it!') !!}
	{!! Form::close() !!}

@endif
@endsection