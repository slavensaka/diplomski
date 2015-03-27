@extends('app')
@section('content')

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
	{!! Form::label('passcode', 'Passcode') !!}
	{!! Form::password('passcode') !!}
	<br>
	{!! Form::label('shuffle', 'shuffle') !!}
	{!! Form::text('shuffle', Input::old('shuffle')) !!}
	<br>
	{!! Form::submit('Send it!') !!}
	{!! Form::close() !!}

@endif
@endsection