@extends('app')

@section('content')
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/one_correct_answer.js') !!}
@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Edit a Question</h1>
@endif	

 	{!! $correct = $answers->fetch('correct') !!}
 	{!! $answer = $answers->fetch('answer') !!}
 
@for($i=0;$i<$correct->count();$i++)
	
		{!! Form::model($answers, array('method' => 'PATCH', 'route' =>array('answers.update',$question->id)), function(){  }) !!}
	<br>	
		{!! Form::label('answer', 'Answer:') !!}
		{!! Form::text('answer', $answer[$i] ) !!}		            	            
 	<br>	
		{!! Form::label('correct', 'TRUE:') !!}		    
		{!! Form::radio('correct', '1', $correct[$i] ) !!}
		{{-- {!! Form::text( 'correct',$answer->correct) !!} --}}
	<br>   
		{!! Form::label('correct', 'FALSE:') !!}		    
		{!! Form::radio( 'correct', '0') !!}
		{{-- {!! Form::text( 'correct',$answer->correct) !!} --}}
	<br>	

@endfor

		{!! Form::submit('Update This Answer', array('class' => 'btn btn-info updated_answers')) !!}

		{!! link_to_route('answers.show', 'Go Back', $question->id , array('class' => 'btn btn-danger')) !!}

		{!! Form::close() !!}

@endsection



