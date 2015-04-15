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
	{!! Form::submit('Enter') !!}
	<a href="{{ URL::previous() }}">Go Back</a>
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
	
	{!! Form::submit('Enter') !!}
	<a href="{{ URL::previous() }}">Go Back</a>
	{!! Form::close() !!}
	@endif
@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif
@endsection