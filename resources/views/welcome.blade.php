@extends('app')
@section('content')
{{-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="/css/app.css" rel="stylesheet">
	<title>Auto Generate</title>
    <link rel="stylesheet" href="">
</head> --}}

{{-- <body> --}}
    <div class="container">
        <div class="content">
            {{-- <div class="quote">Create automatically graded online tests for free!</div>
            <p>
                {!! link_to('auth/register', 'Register FREE', array('class' => 'btn btn-primary')) !!}
            </p>
            <p>
                {!! link_to('auth/login', 'Admin login', array('class' => 'btn btn-primary')) !!}
            </p> --}}
            <h1> Take public tests: </h1>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Created By:</th>
                        <th>Id</th>
                        <th>Testname</th>
                        <th>Intro</th>
                        <th>Conclusion</th>
                        <th>Test is Shuffled</th>
                        <th>Is_published</th>
                        <th>Is_public</th>
                        <th>user_id</th>
                    </tr>
                </thead>
                <tbody>

                   
                    @foreach ($users_published_tests as $published_test)
                    @if($published_test->is_published && $published_test->is_public)
                    <tr>
                        <td>{{ $published_test->name }}</td>
                        <td>{{ $published_test->id }}</td>
                        <td>{{ $published_test->test_name }}</td>
                        <td>{{ $published_test->intro }}</td>
                        <td>{{ $published_test->conclusion }}</td>
                        <td>{{ $published_test->shuffle }}</td>
                        <td>{{ $published_test->is_published }}</td>
                        <td>{{ $published_test->is_public }}</td>
                        <td>{{ $published_test->user_id }}</td>
                        <td>{!! link_to_route('take_test', 'Take This Test', 
                        		array($published_test->id), 
                        		array('class' => 'btn btn-success')) !!}
                        </td>
                    </tr>
                    @endif
        
              
                    @endforeach
                            </tbody>
            </table>

            <h1> Take private tests: </h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Created By:</th>
                        <th>Id</th>
                        <th>Testname</th>
                        <th>Intro</th>
                        <th>Conclusion</th>
                        <th>Test is Shuffled</th>
                        <th>Is_published</th>
                        <th>Is_public</th>
                        <th>user_id</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach ($users_published_tests as $published_test)
               @if($published_test->is_published && $published_test->is_public === 0)
                    <tr>
                        <td>{{ $published_test->name }}</td>
                        <td>{{ $published_test->id }}</td>
                        <td>{{ $published_test->test_name }}</td>
                        <td>{{ $published_test->intro }}</td>
                        <td>{{ $published_test->conclusion }}</td>
                        <td>{{ $published_test->shuffle }}</td>
                        <td>{{ $published_test->is_published }}</td>
                        <td>{{ $published_test->is_public }}</td>
                        <td>{{ $published_test->user_id }}</td>
                        <td>{!! link_to_route('take_test', 'Take This Test', 
                                array($published_test->id), 
                                array('class' => 'btn btn-danger')) !!}
                        </td>
                    </tr>

                    @endif
                     @endforeach
                            </tbody>
            </table>

        </div>
    </div>
    @endsection
{{-- </body>
</html> --}}