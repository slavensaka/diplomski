@extends('app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Student Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif	
<h3>Student Login Form</h3>
 {!! Form::open(array('url' => url('student_login_verify'), 
 'class'=>'form-horizontal')) !!}
<div class="form-group">
	{!! Form::label('username', 'Username', array('class' => 'col-md-4 control-label')) !!}
	<div class="col-md-6">
	{!! Form::text('student_name', Session::get("student_name"),
		array('placeholder'=>'Type username')) !!}
	<div class="name">
	@if(Session::has('name'))
		{!! Session::get('name'); !!}
	@endif
	</div></div></div>
<div class="form-group">
	{!! Form::label('pass', 'Password', array('class' => 'col-md-4 control-label')) !!}
	<div class="col-md-6">	
@if(Session::has("changed") && Session::has("student_name"))
{!! Form::password('pass',
			array('placeholder' => 'Type Password','required' => "required")) !!}
@elseif(Session::has("student_name"))
{!! Form::input('pass', 'pass', Session::get("pass")) !!}
<h4>We already made you an account</h4>
<div><b>Enjoy</b></div>
@else
{!! Form::password('pass',
			array('placeholder' => 'Type Password','required' => "required")) !!}
@endif
<div class="pass">
	@if(Session::has('pass_message'))
		{!! Session::get('pass_message'); !!}
	@endif
	</div></div></div>
	<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
	{!! Form::submit('Login',array('class' => 'btn btn-primary')) !!}
	{!! Form::close() !!}
									</div>
								</div>				
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
