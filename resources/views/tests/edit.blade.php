@extends('app')
@section('content')
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/one_correct_answer.js') !!}
{{-- {!! dd($test,$tag) !!} --}}
@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Edit a Test</h1>
	{!! Form::model($test, array('method' => 'PATCH', 
	  	'route' =>array('tests.update', $test->id),'files'=> true)) !!}
	<ul>
		<li>
			{!! Form::label('test_name', 'Test name:',["class"=>"lead"]) !!}
			</li>
			<li>		
			{!! Form::textarea('test_name', Input::old('test_name'), 
		["data-original-title"=>"Making the test name descriptive ensures it's findable by others.","data-toggle"=>"tooltip" ,
		'required' => "required", 'placeholder'=>'Type the test name', 
		 'class' => 'form','size' => '30x5']) !!}  	 
			<?php echo $errors->first('test_name', '<p class=" text-danger">:message</p>'); ?>
		</li>
		<li>
			{!! Form::label('intro', 'Test Intro message:',["class"=>"lead"]) !!}		
		</li>
		<li>
		{!! Form::textarea('intro', Input::old('intro'), 
		["data-original-title"=>"Displayed message at the start of test","data-toggle"=>"tooltip" ,
		'placeholder'=>'Type the intro message', 'class' => 'field','size' => '30x5']) !!}
			<?php echo $errors->first('intro', '<p class=" text-danger">:message</p>'); ?>
		</li>
		<li>
		{!! Form::label('intro_image', 'Intro image:',["class"=>"lead"]) !!}
			@if($test->intro_image === "")
			X
			{!! Form::file('intro_image', array("data-original-title"=>"Tests identity image","data-toggle"=>"tooltip" ,'class' => '')) !!}
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
		</br>
		<li>
		{!! Form::label('conclusion_image', 'Conclusion image:',["class"=>"lead"]) !!}
		@if($test->conclusion_image === "")
		X
		{!! Form::file('conclusion_image',array("data-original-title"=>"Displayed image at end of test","data-toggle"=>"tooltip" ,)) !!}
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
		</br>
		<li>
			{!! Form::label('conclusion', 'Test conclusion message:',["class"=>"lead"]) !!}
		</li>
		<li>
			{!! Form::textarea('conclusion', Input::old('conclusion'), 
			["data-original-title"=>"Displayed message after the test was completed","data-toggle"=>"tooltip" ,'placeholder'=>'Type the conclusion', 'class' => 'field','size' => '30x5']) !!}
					<?php echo $errors->first('conclusion', '<p class=" text-danger">:message</p>'); ?>
		</li>
		<li>
		{!! Form::label('counter_time', 'Time of test in minutes:',["class"=>"lead"]) !!}
		{!! Form::select('counter_time', ["no change", "no time", 
									       1, 2, 3,4,5,6,7,8,9,10,
										   11,12,13,14,15,16,17,18,19,20,
										   21,22,23,24,25,26,27,28,29,30,
										   31,32,33,34,35,36,37,38,39,40,
										   41,42,43,44,45,46,47,48,49,50,
										   51,52,53,54,55,56,57,58,59,60 ], 0
										   ,["data-original-title"=>"Counter to test end [in minutes]","data-toggle"=>"tooltip" ]) !!}
		
		</li>
		<li>
			{!! Form::label('shuffle', 'Shuffle test questions:',["class"=>"lead"]) !!}
			{!! Form::hidden("shuffle", 0, false) !!}
			{!! Form::checkbox("shuffle", 1, Input::old('shuffle'),["data-original-title"=>"Questions order will be random on creation when student starts taking test","data-toggle"=>"tooltip"]) !!}
			
			{!! Form::hidden("test_id", $test->id) !!}
		</li>
		<li>
			{!! Form::label('passcode', 'Update passcode:',["class"=>"lead"]) !!}
			{!! Form::password('passcode',array("data-original-title"=>"If passcode is left blank, no passcode will be required when taking test.","data-toggle"=>"tooltip",'placeholder' => 'Update Passcode'),
			Input::old('passcode')) !!}
			<?php echo $errors->first('passcode', '<p class=" text-danger">:message</p>'); ?>
		</li>
		@if($tag === "")
		<li>
			{!! Form::label('tags', 'Add Tags:',["class"=>"lead"]) !!}
	{!! Form::text('tags', $tag ,array('size' => '35x5',"data-original-title"=>"Adding tags makes the test easier to find by students.","data-toggle"=>"tooltip" ,'placeholder' => 'Separate by commas')) !!}
	<?php echo $errors->first('tags', '<p class="text-danger">:message</p>'); ?>
		</li>
		@else
		<li>
		<p class="lead">
		<?php  echo "Added tags: "; ?>
		{!! link_to_route('delete_tags', 'DELETE ALL TAGS', 
				array('test_id'=>$test->id), 
				array('class' => 'btn btn-success')) !!}
		<?php foreach($tagging as $key => $tags){ ?>
			<br/>
			<?php
			echo $key+1;
			echo ".";
		?>
			{!! Form::label("$tag[$key]", $tags,["class"=>"lead"]) !!}
		<?php } ?>	
		</p>
		</li>
		@endif
		<li>
			@if(Session::has('tags_message'))
				{!! Session::get('tags_message'); !!}
			@endif
		</li>
		<li><p>To remove the passcode entirely, consider making <br/>
		the test PUBLIC on your <a href="{{ URL::previous() }}">control panel
		</a></p></li>
		<li>
			{!! Form::submit('Update', array('class' => 'btn btn-info')) !!}
			{!! link_to_route('/', 'Go Back ', array(), 
				array('class' => 'btn btn-primary')) !!}
		</li>
	</ul>
	{!! Form::close() !!}
@endif
@endsection		