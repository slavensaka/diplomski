@extends('app')
@section('content')
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/one_correct_answer.js') !!}

	<h1>Create a New Test</h1>

<div class="col-xs-6 col-md-4">
	{!! Form::open(array('route' => 'tests.store', 'files'=> true)) !!}
 	{!! Form::label('test_name', 'Test name:',["class"=>"lead"]) !!}
	 <div class="form-group">
	{!! Form::textarea('test_name', Input::old('test_name'), 
		['required' => "required", 'placeholder'=>'Type the test name', 
		 'class' => 'form','size' => '45x2']) !!}

		<p class="bg-primary">Making the test name descriptive ensures making it findable by others.</p>
	</div>
	<div><?php echo $errors->first('test_name', '<p class=" text-danger">:message</p>'); ?></div>
	{!! Form::label('intro', 'Intro message:',["class"=>"lead"]) !!}
	<div>
	{!! Form::textarea('intro', Input::old('intro'), 
		['placeholder'=>'Type the intro message', 'class' => 'field','size' => '30x5']) !!}
		<p class="help-block">Displayed message at the start of test</p>
	</div>
	<div><?php echo $errors->first('intro', '<p class=" text-danger">:message</p>'); ?></div>
	<div>
	{!! Form::label('intro_image', 'Intro image:',["class"=>"lead"]) !!}
	{!! Form::file('intro_image', array('class' => 'btn btn-info')) !!}
 	<?php //  echo $errors->first('intro_image', '<p>:Lorem</p>'); ?>
	<p class="help-block">Intro image</p>
	</div>
	<div>	<?php echo $errors->first('intro_image', '<p class=" text-danger">:message</p>'); ?>
</div>
	<div>
	{!! Form::label('conclusion_image', 'Conclusion image:',["class"=>"lead"]) !!}
	{!! Form::file('conclusion_image') !!}
	
	<p class="help-block">Conclusion image</p>
	</div>
	<div><?php echo $errors->first('conclusion_image', '<p class=" text-danger">:message</p>'); ?></div>
	{!! Form::label('conclusion', 'Test conclusion message:',["class"=>"lead"]) !!}
	<div>
	{!! Form::textarea('conclusion', Input::old('conclusion'), 
		['placeholder'=>'Type the conclusion message', 'class' => 'field','size' => '30x5']) !!}
		<p class="help-block">Displayed message after the test was completed</p>
	</div>
	<div>	<?php echo $errors->first('conclusion', '<p class=" text-danger">:message</p>'); ?>
</div>
	<div>
		{!! Form::label('counter_time', 'Time of test in minutes:',["class"=>"lead"]) !!}
		{!! Form::select('counter_time', ["no time", 
									       1, 2, 3,4,5,6,7,8,9,10,
										   11,12,13,14,15,16,17,18,19,20,
										   21,22,23,24,25,26,27,28,29,30,
										   31,32,33,34,35,36,37,38,39,40,
										   41,42,43,44,45,46,47,48,49,50,
										   51,52,53,54,55,56,57,58,59,60 ], 0, 
		['class' => '']) !!}
		<p class="help-block">Counter to test end [minutes]</p>
	</div>
	<div>	
		<?php echo $errors->first('counter_time', '<p class=" text-danger">:message</p>'); ?>
	</div>
	<div>
	{!! Form::label('shuffle', 'Shuffle test questions',["class"=>"lead"]) !!}
	{!! Form::hidden("shuffle", 0, false) !!}
	{!! Form::checkbox("shuffle", 1, Input::old('shuffle')) !!}
	<p class="help-block">Questions order will be random on creation when student starts taking test
	</p>
	</div>
	<div>	<?php echo $errors->first('shuffle', '<p class=" text-danger">:message</p>'); ?>
</div>
	<div>
	{!! Form::label('passcode', 'Passcode',["class"=>"lead"]) !!}
	{!! Form::text('passcode', NULL ,array('placeholder' => 'Enter passcode')) !!}
	<p class="help-block">If left blank, passcode field will be left empty.</p>
	</div>
	<div>	<?php echo $errors->first('passcode', '<p class=" text-danger">:message</p>'); ?>
</div>
	<div>
	{!! Form::label('is_public', 'Is test public',["class"=>"lead"]) !!}
	{!! Form::hidden("is_public", 0, false) !!}
	{!! Form::checkbox("is_public", 1, Input::old('is_public')) !!}	
	<p class="help-block">Or it will be private.</p> 
	<div><p class="help-block">Public test doesn't need a passcode, but you can still enter it, if later you 
	decide to make the test private.</p><div>
	</div>
	<br/>
	{!! Form::submit('Create Test', array('class' => 'btn btn-info')) !!}
	{!! link_to_route('/', 'Go Back ', array(), 
			array('class' => 'btn btn-primary')) !!}
	<br/><br/>
	{!! Form::close() !!}

</div>

@endsection