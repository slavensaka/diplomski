{{-- {{ dd($user) }} --}}

@extends('app')
@section('content')


@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Preferences</h1>

@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif
	
	{!!  Form::model($user, array('route' => array('preferences'))) !!}
	{!! Form::label('email', 'Your email: ') !!}
	{!! Form::label('email', $user->email) !!}
 	<br>
	{!! Form::label('name', 'Change name: ') !!}
	{!! Form::text('name', $user->name,
		array('required' => "required",'placeholder'=>'Type yout name')) !!}
	
	<br>
	{!! Form::label('password', 'Change password') !!}
	{!! Form::password('password', ['placeholder' => 'Enter new paswoord', 'required' => 'required']) !!}
	<br>
	{!! Form::submit('Update', array('class' => 'btn btn-info')) !!}
	<a class="btn btn-info" href="{{ URL::previous() }}">Go Back</a>
	{!! Form::close() !!}

</br>
</br>
</br>
	{!!  Form::model($user, array('route' => array('delete_user'))) !!}
	<b>Delete your account: </b>
		{!! Form::submit('DELETE ACCOUNT', array('class' => 'btn btn-danger')) !!}
	
	{!! Form::close() !!}
@endif
@endsection