@extends('app')
@section('content')
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/one_correct_answer.js') !!}

@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Create a New Test</h1>

	{!! Form::open(array('route' => 'tests.store')) !!}
 	{!! Form::label('test_name', 'Test name:') !!}
	{{-- {!! Form::text('test_name', Input::old('test_name'),
		array('required' => "required",'placeholder'=>'Type the test name')) !!}
	 --}}
	 <div>
	{!! Form::textarea('test_name', Input::old('test_name'), 
		['required' => "required", 'placeholder'=>'Type the test name', 
		 'class' => 'field','size' => '30x2']) !!}
		<b>Making the test name descriptive ensures making it findable by others.</b>
	</div>
	
	{!! Form::label('intro', 'Intro message:') !!}
	<div>
	{!! Form::textarea('intro', Input::old('intro'), 
		['placeholder'=>'Type the intro message', 'class' => 'field','size' => '30x5']) !!}
		<b>Displayed message at the start of test</b>
	</div>
	{!! Form::label('conclusion', 'Test conclusion message:') !!}
	<div>
	{!! Form::textarea('conclusion', Input::old('conclusion'), 
		['placeholder'=>'Type the conclusion message', 'class' => 'field','size' => '30x5']) !!}
		<b>Displayed message after the test was completed</b>
	</div>
	<div>
	{!! Form::label('shuffle', 'Shuffle test questions') !!}
	{!! Form::hidden("shuffle", 0, false) !!}
	{!! Form::checkbox("shuffle", 1, Input::old('shuffle')) !!}
	<b>Questions order will be random on creation when student starts taking test
	</b>
	</div>
	
	<div>
	{!! Form::label('passcode', 'Passcode') !!}
	{!! Form::text('passcode', NULL ,array('placeholder' => 'Enter passcode')) !!}
	<b>If left blank, passcode field will be left empty.</b>
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
	<a href="{{ URL::previous() }}">Go Back</a>
	{!! Form::close() !!}

@endif
@endsection