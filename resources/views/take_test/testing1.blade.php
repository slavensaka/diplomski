<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-2" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auto Generate</title>
    <link href="/css/app.css" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
                @if (Auth::check())
                <h2>{{ "Test Started" }}</h2>
                @else 
                 <h2>{{ "Test Started" }}</h2>
                @endif
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">           
                </ul>            
                <ul class="nav navbar-nav navbar-right">             
                    @if (Auth::guest() )    
              @if(!Session::has("logged_in"))     
            @else 
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Student {{  Session::get("student_name")}} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="../../student_logout">Logout</a></li>
                        </ul>
                    </li>                    
             @endif
                  {{--   <li>{!! link_to_route('student_login', 'Go Back', $question->id , array('class' => 'btn btn-danger')) !!}
                    </li> --}}
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/auth/logout">Logout</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
<?php use Dipl\Question;
      use Dipl\Student;
?> 
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/functions.js') !!} 
{{-- {{ dd($test->intro,$questions,$student_name,$answers) }}  --}}
<noscript>
    <h2>
        JavaScript is disabled! To take this test JavaScript is needed.</br>
        Please enable JavaScript in your web browser!</br>
        Redirecting back...
    </h2>
    <meta http-equiv="refresh" content="5; URL=/" />
    <style type="text/css">
        #testing1_form { display:none; }
        .updated_answers { display:none; }
    </style>
</noscript>
@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif
<?php $test_res = 0; ?>
@if(Auth::check())
<?php $type ="user" ?>
<div class="type"> {{ $type }} </div>
<div class="user_id">{{ Auth::user()->id }} </div>
<div class="test_id">{{ $test->id }} </div>
<div class="test_res"> {{ $test_res }}</div>
@else 
<?php $student_id = Student::where('student_name', '=', Session::get('student_name'))->pluck("id");  
      $type="student";
?>
<div class="type"> {{ $type }} </div>
<div class="user_id">{{ $student_id }} </div>
<div class="test_id">{{ $test->id }} </div>
<div class="test_res"> {{ $test_res }}</div>
@endif
<div class="counter_time">{{ $test->counter_time  }}</div>
<div class="counter"></div>
<div class="intro alert alert-success text-center"><h3><b>{!! $test->intro !!}</b></h3></div>
@if($test->intro_image)
<div class="intro_image row text-center">
{!! Html::image("test_uploads/$test->intro_image",
	$test->intro_image, array("class"=>"img-thumbnail")) !!}
</div>
@endif
<div id="testing1_form" class="testing1_form">
<?php 
$answer = $questions->each(function($question) use($test, $student_name){
		  // for ($i=0;$i<count($questions);$i++){
          //    echo count($questions);
          //   	}
		  echo '<p><strong>'.($question["question"]).'</strong></p>';
		if($question["question_image"]){
		  	echo Html::image("question_uploads/".$question["question_image"] );
		}
		  $answers = Question::find($question->id)->answers;
		  //OVAJ SHUFFLE VALJA, JE ZA ANSWERS (Question)
		  if($question->shuffle_question){
		  	$answers->shuffle(); 
		  } 
		$answers->each(function($answer) use ($question,$answers,$test, $student_name){
		// echo $answer->question_id;
		// echo $question->id;
	echo Form::open(array('route' => array('testing1',$test->id),'method' => 'post',"id"=>"test_form")) ;	 
if($question->type === 'multiple_choice' || $question->type === 'true_false') {
?>
<ul>
	<li>
<?php	echo '</br>'; ?>
<?php echo Form::label($answer["answer"],$answer["answer"]); ?>
<?php echo Form::radio($answer->question_id, $answer["answer"]); ?>
<?php echo Form::hidden('student_name', $student_name);  ?>
	</li>
</ul>
<?php 
echo "<br>";
 } elseif($question->type === 'multiple_response') {
 	echo '</br>';
 echo Form::label($answer["answer"], $answer["answer"]);
 // echo Form::hidden($answer["answer"], "multiple_response");
echo Form::hidden('student_name', $student_name);
echo Form::checkbox($answer["id"],$answer["answer"]); 
// echo Form::selectRange($answer->question_id, 1, count($answers) );
echo '</br>';
	} else {
		echo '</br>';
		echo '</br>';
		echo Form::text($answer->question_id);
	}
	}); 
});
?>
</div>
<?php
// echo Form::hidden('student_name', $student_name);
// echo Form::hidden('test_id', $test->id);
echo Form::submit('Send', array('class' => 'btn btn-info updated_answers'));
?> 
{{-- <a href="{{ URL::previous() }}" class="btn btn-danger">Go Back</a> --}}
<?php echo Form::close(); ?>
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>

	


