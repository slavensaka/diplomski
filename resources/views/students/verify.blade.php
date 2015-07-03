@extends('app')
@section('content')
{{-- {!! dd($student_name,$pass,$student_changed_password) !!} --}}
@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif
<div><h1>Consider Changing default password</h1></div>
{!! Form::open(array('route' => array('control_panel'),'method' => 'post'))	!!}
<ul>
	<li>
		{!! Form::label('default', "Default password: $pass") !!}
	</li>
	<li>
		{!! Form::label('pass', 'New Password:') !!}
		{!! Form::password('pass',
			array('placeholder' => 'New Password','required' => "required")) !!}
		{!! Form::hidden("student_name", $student_name, false) !!}
		{!! Form::hidden("changed_password", 1, false) !!}
	</li>
	<li>
		{!! Form::submit('Send it!', array('class' => 'btn btn-primary')) !!}
	</li>
	</ul>
		{!! Form::close() !!} <br/><br/>
<div><b>Or keep using default the password by</b>
		{!! Form::open(array('route' => array('control_panel'),'method' => 'post'))	 !!}
		{!! Form::hidden("student_name", $student_name, false) !!}
		{!! Form::hidden("changed_password", 1, false) !!}
		{!! Form::hidden("pass", $pass, false) !!}
		{!! Form::submit('CLICKING HERE', array('class' => 'btn btn-primary')) !!}
		{!! Form::close() !!}
</div>
@endsection		
