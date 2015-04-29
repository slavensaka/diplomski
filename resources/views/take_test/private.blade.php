@extends('app')
@section('content')

{{-- {{ dd($test) }} --}}
{{-- {{ dd($questions) }} --}}
{{-- {{ dd($answers) }} --}}



<h1>Take this private test</h1>
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
 	
 	@if(Auth::check() || Session::has('student_name'))
	{!! Form::label('passcode', 'Passcode') !!}
	{!! Form::text('passcode', NULL, array(
		'placeholder' => 'Password')) !!}
	<br>
	{!! Form::submit('Enter Test', array('class' => 'btn btn-primary')) !!}
	{!! link_to_route('/', 'Go Back', array(), array('class' => 'btn btn-danger')) !!}
	{!! Form::close() !!}
	
	
	@else 
	{!! Form::label('student_name', 'Username:') !!}
	{!! Form::text('student_name', NULL,
		array('required' => "required",'placeholder'=>'Enter username')) !!}
	<br>
	
	{!! Form::label('passcode', 'Passcode') !!}
	{!! Form::text('passcode', NULL, array(
		'placeholder' => 'Enter Passcode')) !!}
	<br>
	
	
	{!! Form::submit('Enter Test', array('class' => 'btn btn-primary')) !!}
	{!! link_to_route('/', 'Go Back', array(), array('class' => 'btn btn-danger')) !!}
	{!! Form::close() !!}
	@endif
	<div>
		<p>
			Only students/users who have been given the passcode by a teacher can take this test.
		</p>
		<p>
			Please ask the person giving you the Test for the passcode.
		</p>
	</div>
@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif
@endsection