<?php use Dipl\Answer; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@extends('app')

@section('content')

@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Edit a Question</h1>
@endif	
{{-- 
@if( "answers/create" === Route::current()->getUri() )
<h1>Add new Answer</h1>
	{!! Form::open(array('route' => 'answers.store')) !!}

	<br>
	{!! Form::label('answer', 'Answer') !!}
	{!! Form::text('answer',Input::old('answer')) !!}
	<br>
	{!! Form::label('correct', 'correct') !!}
	{!! Form::text('correct', Input::old('correct')) !!}
	<br>
	{!! Form::hidden('quest_id', $quest->id, array('id' => 'quest_id')) !!}

	<br>
	{!! Form::submit('Send it!') !!}
	{!! Form::close() !!}
@else
 --}}



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

@foreach ($answers as $answer)

	{!! Form::model($answers, array('method' => 'PATCH', 'route' =>array('answers.update',$question->id)), function(){       }) !!}
	
<ul>
	
    {{-- {!! $answer->id !!} --}}
   
  

  		
	<li>
		{!! Form::label('answer', 'Answer:') !!}
		{!! Form::text('answer', $answer->answer) !!}		            	            

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
$( document ).ready(function() {

var myArray = [];
$('input:radio').each(function(){
	myArray.push($(this).attr('name'));
	myArray = jQuery.unique(myArray);
	// console.log(myArray);

// 	// var name=$(this).attr('name');
// 	// my.push(name);
// 	// console.log(my.length);

//    			// for(i=0;i <=$("input[name=+correct]:checked"); i++)
//    			// result = result+1;
//    		 //    console.log(result);
 });

// $('input:radio').click(function(){
// 	// var name=$(this).attr('name');
//    		if($("input[name="+name+"]:checked").val() == 1) {
//    			for(i=0;i <=$("input[name=+correct]:checked"); i++)
//    			result = result+1;
//    		    console.log(result);
//    		}
// });

$('input.btn.btn-info.updated_answers').click( createCallback(myArray));
	// $('input:radio').click(function(){
		// preventDefault(e);
   		
			
			// console.log(my);
// $('input.btn.btn-info.updated_answers').each(function(){

			
   				
   			
   		

   			// if(result >= 1) {
   			// 	console.log("NE! Izabrali ste više od 1, kao točan odgovor");
   			// 	return false;
   			// } else {
   			// 	console.log("Valja, Forma je poslana");
   			// 	return true;
   			// }
   
   		


	// });
});

function createCallback( myArray ){

return function() {
			var result=0;
			var my = [];
			my.push(myArray);
			myArray.map(function(item){
			// for(var i=0; i<myArray.length;i++){
				if($("input[name="+item+"]:checked").val() == 1) {
   		    		result = result+1;
   					console.log(result);
   		    	// } 
				}
			});
			if(result >= 2) {
   				
   				$('#divCheckbox').show().append(' Error! Izabrali ste više od 1 kao točne odgovore');
   				// console.log(result);
   				
   				return false;
   			} 
   			else if (result == 0){
   				
   				$('#divCheckbox').show().append(' Niste izabrani niti jedan odgovor kao točan');
   				return false;
   			} 
   			else {

   				// $('#divCheckbox').show().append('Valja');
   				
   				// console.log(result);
   				return true;
			}
}
}

	// 		for(var i = 0; i < my.length; i++)
	// 		{
				
	// 			// my[i].toString();
	// 			currentElem = my[i];
	// 			currentElem[i].toString();

	// 			// console.log(currentElem[i]);
	// 			// console.log($("input[name="+currentElem[i]+"]:checked").val());

 //      $('input.btn.btn-info.updated_answers').each(function(){
	// 			if($("input[name="+currentElem[i]+"]").is(':checked') ) { 
 //  				if($("input[name="+currentElem[i]+"]:checked").val() == 1) {
					
 //  					result = result+1;
 //  					console.log(result);
   		    		
 //   		    	} 
	// 			}
				
	// });
	// 		}

				// if(result >= 2) {
   	// 			console.log("NE! Izabrali ste više od 1, kao točan odgovor");
   	// 			result = 0;
   	// 			return false;
   	// 		} else {
   	// 			console.log("Valja, Forma je poslana");
   	// 			result = 0;
   	// 			return true;
   	// 		}
   











   			// if($('form input[type=radio]:checked').val() == 1){
   			

   			 // for (i = 0; i < 2; i++) {
   			 // 	result += name;
   			 // 	if(result == 1) {
   			 // 		console.log("ima dva");
   			 // 	}
   			 // }
   		



			// if(name_id = $(this).attr('name')){
				
					// console.log('Ovo je 1');
				// $('form input[type=radio]:checked').val() == 1
			// }
			// console.log($('form input[type=radio]:checked').val());
		
		// console.log($('form input[type=radio]:checked').val());


	// 	// return false;
	// 	// e.preventDefault();
	// 	// $('input#correct').not(':has(:radio:checked)')
	
	// console.log($("label#correct").prop('checked')  );


 </script>


@endsection		