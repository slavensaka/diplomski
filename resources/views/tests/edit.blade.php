@extends('app')
@section('content')
{{-- {!! dd($test) !!} --}}
@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Edit a Test</h1>
	{!! Form::model($test, array('method' => 'PATCH', 
	  	'route' =>array('tests.update', $test->id),'files'=> true)) !!}
	<ul>
		<li>
			{!! Form::label('test_name', 'Test name:') !!}
			{!! Form::text('test_name',Input::old('test_name')) !!}		            	            
			<?php echo $errors->first('test_name', '<p class=" text-danger">:message</p>'); ?>
		</li>
		<li>
			{!! Form::label('intro', 'Test Intro message:') !!}
			
		</li>
		<li>
			{!! Form::textarea('intro', Input::old('intro'), 
			['placeholder'=>'Type the intro', 'class' => 'field','size' => '30x5']) !!}
			<?php echo $errors->first('intro', '<p class=" text-danger">:message</p>'); ?>
		</li>
		<li>
		{!! Form::label('intro_image', 'Intro image:') !!}
			@if($test->intro_image === "")
			X
			<?php echo $errors->first('intro_image', '<p class=" text-danger">:message</p>'); ?>
			@else 
		{!! Html::image("test_uploads/thumbs/$test->intro_image", 
							$test->intro_image, array('class' => 'img-rounded')) !!}
		{!! link_to_route('intro_image_delete', 'DELETE', 
				array('intro_image'=>$test->intro_image), 
				array('class' => 'btn btn-success')) !!}
		<?php echo $errors->first('intro_image', '<p class=" text-danger">:message</p>'); ?>
			@endif
						
		
		</li>
		<li>
			@if(Session::has('intro_image_message'))
				{!! Session::get('intro_image_message'); !!}
			@endif
		</li>
	
		<li>
		{!! Form::file('intro_image', array('class' => '')) !!}
		</li>
		</br>
		<li>
		{!! Form::label('conclusion_image', 'Conclusion image:') !!}
		@if($test->conclusion_image === "")
		X
		<?php echo $errors->first('conclusion_image', '<p class=" text-danger">:message</p>'); ?>
		@else
		{!! Html::image("test_uploads/thumbs/$test->conclusion_image",
							$test->conclusion_image, array("class"=>"img-rounded")) !!}
		{!! link_to_route('conclusion_image_delete', 'DELETE', 
				array('conclusion_image'=>$test->conclusion_image), 
				array('class' => 'btn btn-success')) !!}
		<?php echo $errors->first('conclusion_image', '<p class=" text-danger">:message</p>'); ?>
	
		@endif
		
		</li>

		<li>
			@if(Session::has('conclusion_image_message'))
				{!! Session::get('conclusion_image_message'); !!}
			@endif
		</li>
		<li>
		{!! Form::file('conclusion_image') !!}
		</li>
		</br>
		<li>
			{!! Form::label('conclusion', 'Test conclusion message:') !!}
		</li>
		<li>
			{!! Form::textarea('conclusion', Input::old('conclusion'), 
			['placeholder'=>'Type the conclusion', 'class' => 'field','size' => '30x5']) !!}
					<?php echo $errors->first('conclusion', '<p class=" text-danger">:message</p>'); ?>

		</li>
		<li>
		{!! Form::label('counter_time', 'Time of test in minutes:') !!}
		{!!  Form::selectRange('counter_time', 0, 60); !!}
		<b>0 for no time on test</b>
		</li>
		<li>
			{!! Form::label('shuffle', 'Shuffle test questions:') !!}
			{!! Form::hidden("shuffle", 0, false) !!}
			{!! Form::checkbox("shuffle", 1, Input::old('shuffle')) !!}
			
			{!! Form::hidden("test_id", $test->id) !!}
		</li>

		<li>
			{!! Form::label('passcode', 'Update passcode:') !!}
			{!! Form::password('passcode',array('placeholder' => 'Update Passcode'),
			Input::old('passcode')) !!}
			<?php echo $errors->first('passcode', '<p class=" text-danger">:message</p>'); ?>
		</li>
		<li>
			<p><b>If passcode is left blank, no passcode will be required when taking test.</b></p>
		</li>
		<li>
			<p><b>To remove the passcode entirely, consider making the test 
				PUBLIC on your </b><a href="{{ URL::previous() }}">control panel</a>
			</p>
		</li>
		<li>
			{!! Form::submit('Update', array('class' => 'btn btn-info')) !!}
			{!! link_to_route('/', 'Go Back ', array(), 
				array('class' => 'btn btn-primary')) !!}
		</li>
	</ul>
	{!! Form::close() !!}

@endif
@endsection		