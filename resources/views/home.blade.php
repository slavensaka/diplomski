@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					You are logged in!

		
		{!!  Form::open(array('url'=>'/','method'=>'post')) !!}
		{!!Form::text('link',Input::old('link'), array('placeholder'=>'Insert your URL')) !!}
		{!! Form::close() !!}






				</div>
			</div>
		</div>
	</div>
</div>
@endsection
