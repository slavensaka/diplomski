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
	{!! Form::text('test_name', Input::old('test_name')) !!}
	<br>
	{!! Form::label('intro', 'intro') !!}
	{!! Form::text('intro', Input::old('intro')) !!}
	<br>
	{!! Form::label('conclusion', 'conclusion') !!}
	{!! Form::text('conclusion', Input::old('conclusion')) !!}
	<br>
	{!! Form::label('is_public', 'Is test public') !!}
	{!! Form::hidden("is_public", 0, false) !!}
	{!! Form::checkbox("is_public", 1, Input::old('is_public')) !!}
	<br>
	{!! Form::label('passcode', 'Passcode') !!}
	{!! Form::password('passcode') !!}
	<br>
	{!! Form::label('shuffle', 'shuffle') !!}
	{!! Form::hidden("shuffle", 0, false) !!}
	{!! Form::checkbox("shuffle", 1, Input::old('shuffle')) !!}
	<br>
	{!! Form::submit('Send it!') !!}
	{!! Form::close() !!}

@endif
@endsection