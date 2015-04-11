@extends('app')
@section('content')

{{-- {{ dd($test) }} --}}
{{-- {{ dd($questions) }} --}}
{{-- {{ dd($answers) }} --}}



<h1>Create a New Question</h1>
	<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Created By</th>
					<th>Test name</th>
				
				</tr >
			</thead>
			<tbody>
			<tr class="success">
					<td>{{ $created_by }}</td>
					<td>{{ $test->test_name }}</td>
					
			</tbody>
	</table>

{!! Form::open(array('route' => array('take_private_test', $test->id),'method' => 'post')) !!}
 	
 	@if(Auth::check())
	{!! Form::label('passcode', 'Passcode') !!}
	{!! Form::text('passcode', NULL, array('required' => "required",
		'placeholder' => 'Password')) !!}
	<br>
	{!! Form::submit('Enter') !!}
	{!! Form::close() !!}
	
	@else 
	{!! Form::label('student_name', 'Your Name:') !!}
	{!! Form::text('student_name', NULL,
		array('required' => "required",'placeholder'=>'Type your name')) !!}
	<br>
	
	{!! Form::label('passcode', 'Passcode') !!}
	{!! Form::text('passcode', NULL, array('required' => "required",
		'placeholder' => 'Password')) !!}
	<br>
	
	{!! Form::submit('Enter') !!}
	{!! Form::close() !!}
	@endif
@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif
@endsection