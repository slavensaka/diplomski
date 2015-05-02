<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-2" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auto Generate</title>
    
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/autogenerate.css" rel="stylesheet">
    

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
                <a class="navbar-brand" href="../../homepage">
                <span class="texti">Auto Generate</span>
                </a>
                @else 
                <a class="navbar-brand" href="/">
                <span class="texti">Auto Generate</span>
                </a>
                @endif

            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                {{-- <li><a href="/">Taken Tests</a></li> --}}
                @if(Session::has("student_name"))
                <li id="students_taken_tests">
                <a href="../../tests_taken">Students Taken Tests</a>
                </li>
                @endif
                @if(Session::has("logged_in"))
                <li><a href="../../control_panel">Control Panel</a></li>
                @endif

                @if (Auth::check())
                   <?php Session::forget('student_name');
                         Session::forget("changed"); 
                         Session::forget("logged_in"); ?>
                    <li><a href="../../students">Your Students</a></li>
                    <li><a href="../../tests_taken">{{ Auth::user()->name }} Taken Tests</a></li>
                    <li><a href="/">{{ Auth::user()->name }} Tests</a></li>
                @endif
                </ul>


                
                <ul class="nav navbar-nav navbar-right">
               
                    @if (Auth::guest() )
                   
                
              @if(!Session::has("logged_in"))
                    <li><a href="../../student_login">Student Login</a></li>
              
                    <li><a href="../../student_register">Student Register</a></li>
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
                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="/auth/register">Register</a></li>
                    
                
                    


                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                            {!! link_to_route('users.show', 'Preferences', 
                                array(Auth::user()->id) , array()) !!}
                            </li>
                            <li><a href="/auth/logout">Logout</a></li>
                           
                        </ul>
                    </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>

</html>