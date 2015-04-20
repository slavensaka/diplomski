{{-- {{ dd($question) }} --}}
{{-- {{ dd($answers) }} --}}
@extends('app')
@section('content')

{!! link_to_route('answers.show', 'Go Back', $question->id , 
	array('class' => 'btn btn-warning')) !!}
<h1>Edit The Question</h1>

@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif


{!! Form::model($question, array('method' => 'PATCH', 
'route' =>array('questions.update', $question->id), 'files'=> true), function(){  }) !!}
<ul>
	<li>
		{!! Form::label('question', 'Question:') !!}
		{!! Form::text('question') !!}		            	            
	</li>
	<li>
		{!! Form::label('points', 'Points:') !!}
		{!! Form::text('points') !!}
	</li>
	<li>
		{!! Form::label('question_image', 'Question Image:') !!}
		{!! Html::image("question_uploads/thumbs/$question->question_image", 
							$question->question_image) !!}
		{!! link_to_route('question_image_delete', 'DELETE', 
				array('question_image'=>$question->question_image), 
				array('class' => 'btn btn-success')) !!}
	</li>
	<li>
			@if(Session::has('question_image_message'))
				{!! Session::get('question_image_message'); !!}
			@endif
		</li>
	<li>
		{!! Form::file('question_image') !!}
	</li>
	<li>
		{!! Form::label('shuffle_question', 'shuffle_question') !!}
		{!! Form::hidden("shuffle_question", 0, false) !!}
		{!! Form::checkbox("shuffle_question", 1, Input::old('shuffle_question')) !!}
		{!! Form::hidden("last_question_id", $question->id, false) !!}
	</li>
	<li>
		{!! Form::submit('Update Question', array('class' => 'btn btn-info')) !!}
		{!! link_to_route('answers.show', 'Go Back', $question->id, array('class' => 'btn btn-danger')) !!}
	</li>
	</ul>
		{!! Form::close() !!}






<h1>Edit The Answer For Question</h1>
 <?php 
 $answer =  $answers->toArray() ;
 ?>

@for ($i=1; $i <= count($answers); $i++)

{{-- {!! dd($answer[$i-1]['id']); !!} --}}{{-- 
					{!! Form::open(array('method'=> 'DELETE', 
						'route' => array('answers.destroy', $answer[$i-1]['id']))) !!}
					{!! Form::hidden( 'route' , Route::getCurrentRoute()->getPath(), false ) !!}
					{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
					{!! Form::close() !!}
 --}}

	{!! Form::model($answers, array('method' => 'PATCH', 'route' =>array('answers.update',$question->id)), function(){ }) !!}
<ul>
	<li>
		{!! Form::label('answer', 'Answer:') !!}
		{!! Form::text("answer_form[$i][answer]",$answer[$i-1]['answer']) !!}
	</li>
	<li>{{-- 
		{!! Form::hidden($answer[$i-1]['id'], 0, false) !!}
		{!! Form::label($answer[$i-1]['id'], 'Correct:') !!}
	    {!! Form::checkbox($answer[$i-1]['id'], 1, $answer[$i-1]['correct']) !!}
	 --}}
	 	{!! Form::label('correct', 'Correct:') !!}
	 	{!! Form::hidden("answer_id_form[$i][answer]", $answer[$i-1]['id'], false) !!}
		{!! Form::hidden("correct_form[$i][correct]", 0, false) !!}
	    {!! Form::checkbox("correct_form[$i][correct]", 1, $answer[$i-1]['correct']) !!}
	    {!! Form::hidden( 'route' , Route::getCurrentRoute()->getPath(), false ) !!}
	    {!! Form::hidden( 'question_test_id' , $question->test_id, false ) !!}
	 </li>


</ul>
@endfor
	<li>
		{!! Form::submit('Update This Answers', 
			array('class' => 'btn btn-info updated_answers')) !!}
		{!! link_to_route('answers.show', 'Go Back', $question->id, 
			array('class' => 'btn btn-danger')) !!}
	</li>	
		{!! Form::close() !!}
				


@endsection		