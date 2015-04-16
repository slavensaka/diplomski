@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Student Register</div>
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


<h3>Student Register Form</h3>
{!! Form::open(array('route' => array('student_register_form'),'method' => 'post','class'=>'form-horizontal')) !!}
<div class="form-group">
{!! Form::label('username', 'Username', array('class' => 'col-md-4 control-label')) !!}
	<div class="col-md-6">
{!! Form::text('student_name', NULL,array('placeholder'=>'Type username')) !!}
	<div class="name">
	@if(Session::has('name_message'))
		{!! Session::get('name_message'); !!}
	@endif
	</div>
	</div>
	</div>

<div class="form-group">
{!! Form::label('pass', 'Password', array('class' => 'col-md-4 control-label')) !!}
	<div class="col-md-6">	
{!! Form::password('pass', array('placeholder' => 'Type Password','required' => "required")) !!}
	<div class="name">
		@if(Session::has('pass_message'))
		{!! Session::get('name_message'); !!}
		@endif
	</div>
	</div>
	</div>
	<div class="form-group">
	<div class="col-md-6 col-md-offset-4">
{!! Form::submit('Student Register',array('class' => 'btn btn-primary')) !!}
{!! Form::close() !!}




				</div>
			</div>
		</div>
	</div>
</div>
@endsection
