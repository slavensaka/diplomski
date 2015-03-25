
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@extends('app')

@section('content')

@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Edit a Question</h1>
@endif	


{!! Form::model($question, array('method' => 'PATCH', 'route' =>array('questions.update', $question->id)), function(){       }) !!}
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
		{!! Form::label('shuffle_question', 'shuffle_question:') !!}
		{!! Form::text('shuffle_question') !!}
	</li>
	<li>
		{!! Form::submit('Update Question', array('class' => 'btn btn-info')) !!}
		{!! link_to_route('answers.show', 'Cancel', $question->id, array('class' => 'btn btn-danger')) !!}
	</li>
	</ul>
		{!! Form::close() !!}


	<h1>Edit answers</h1>

<h2 id="divCheckbox" style="display: none; color: red;"></h2>

	{!! Form::model($answers, array('method' => 'PATCH', 'route' =>array('answers.update',$question->id)), function(){       }) !!}
<ul>
	@foreach ($answers as $answer)
    {!! $answer->id !!}
   
    

  		
	<li>
		{!! Form::label('answer', 'Answer:') !!}
		{!! Form::text( 'answer',$answer->answer) !!}
{{-- 
		{!! Form::select('answer', [
   					'true' => 'true',
		   			'false' => 'false'], 'true', ['class' => 'true_or_false']) !!}
		  --}}  	
		  	
	</li>
	<li>
	   
		{!! Form::label('correct', 'TRUE:') !!}		    
		{!! Form::radio($answer->id, '1' ) !!}
		{{-- {!! Form::text( 'correct',$answer->correct) !!} --}}

	
	</li>
	<li>
	   
		{!! Form::label('correct', 'FALSE:') !!}		    
		{!! Form::radio( $answer->id, '0',true) !!}
		{{-- {!! Form::text( 'correct',$answer->correct) !!} --}}
	
	</li>


	<li>
		{!! Form::submit('Update Answers', array('class' => 'btn btn-info updated_answers')) !!}

		{!! link_to_route('answers.show', 'Cancel', $question->id , array('class' => 'btn btn-danger')) !!}
	</li>


	
		{!! Form::close() !!}
	</ul>
@endforeach	

<script type="text/javascript">
$(document).ready(function() {

    var myArray = [];
    $('input:radio').each(function() {
        myArray.push($(this).attr('name'));
        myArray = jQuery.unique(myArray);
    });

    $('input.btn.btn-info.updated_answers').click(createCallback(myArray));
});

function createCallback(myArray) {
    return function() {
        var result = 0;
        var my = [];
        my.push(myArray);
        myArray.map(function(item) {
            if ($("input[name=" + item + "]:checked").val() == 1) {
                result = result + 1;
                console.log(result);
            }
        });
        if (result >= 2) {
            $('#divCheckbox').show().append(' Error! Izabrali ste više od 1 kao točne odgovore');
            return false;
        } else if (result == 0) {
            $('#divCheckbox').show().append(' Niste izabrali niti jedan odgovor kao točan');
            return false;
        } else {
            return true;
        }
    }
}
 </script>
@endsection