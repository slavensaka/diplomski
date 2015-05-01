@extends('app')
@section('content')
{{-- {!! dd($users_published_tests_private) !!} --}}

@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif
    <div class="container">
        <div class="content">
           
<div class="jumbotron">
  <h1> Take public tests: </h1>
  

            <table class="table table-striped table-bordered table-condensed table-responsive">
                <thead>
                    <tr class="danger">
                        <th>Created By User</th>

                        {{-- <th>Intro image</th> --}}
                        {{-- <th>Id</th> --}}
                        <th>Test name</th>
                        {{-- <th>Intro</th> --}}
                        {{-- <th>Conclusion</th> --}}
                        <th>Questions Shuffled</th>
                        <th>Password</th>
                        {{-- <th>Is_published</th> --}}
                        {{-- <th>Is_public</th> --}}
                        {{-- <th>user_id</th> --}}
                    </tr>
                </thead>
                <tbody>

                   
                    @foreach ($users_published_tests_public as $published_test)
                    @if($published_test->is_published && $published_test->is_public)
                    <tr>
                        <td>{{ $published_test->name }}</td>
                        

                        {{-- <td>{{ $published_test->id }}</td> --}}
                       @if($published_test->intro_image === "")
                        <td>{{ $published_test->test_name }}</td>
                        @else 
                       <td>{!! Html::image("test_uploads/thumbs/$published_test->intro_image",
                            $published_test->intro_image, array("class"=>"thumb")) !!}
                            {{ $published_test->test_name }}</td>
                        
                       @endif
                        
                        {{-- <td>{{ $published_test->intro }}</td> --}}
                        {{-- <td>{{ $published_test->conclusion }}</td> --}}
                        @if($published_test->shuffle)
                        <td>{{ "Yes" }}</td> @else <td>{{ "No" }}</td> @endif
                        {{-- <td>{{ $published_test->is_published }}</td> --}}
                        {{-- <td>{{ $published_test->is_public }}</td> --}}
                        {{-- <td>{{ $published_test->user_id }}</td> --}}
                        <td>No</td>
                        <td>{!! link_to_route('take_test', 'Take This Test', 
                        		array($published_test->id), 
                        		array('class' => 'btn btn-success')) !!}
                        </td>
                        @if(Auth::check() && !($published_test->user_id === Auth::user()->id))
                        <td>{!! link_to_route('copy_public_test', 'Copy this Test', 
                                array($published_test->id), 
                                array('class' => 'btn btn-primary')) !!}
                        </td>
                        @endif
                    </tr>
                    @endif
                    @endforeach
                            </tbody>
            </table>
</div>

<div class="jumbotron">
 <h1> Take private tests: </h1>

            
            <table class="table table-striped table-bordered table-condensed table-responsive">
                <thead>
                    <tr class="danger">
                        <th>Created By User</th>
                        {{-- <th>Intro Image</th> --}}
                        <th>Test name</th>
                        {{-- <th>Intro</th> --}}
                        {{-- <th>Conclusion</th> --}}
                        <th>Questions shuffled</th>
                        <th>Password</th>
                        {{-- <th>Is_published</th> --}}
                        {{-- <th>Is_public</th> --}}
                        {{-- <th>user_id</th> --}}
                    </tr>
                </thead>
                <tbody>
                 @foreach ($users_published_tests_private as $published_test_private)
               @if($published_test_private->is_published )
    
                    <tr>
                   
                        <td>{{ $published_test_private->name }}</td>
                        @if($published_test_private->intro_image === "")
                        <td>{{ $published_test_private->test_name }}</td>
                        @else 
                       <td>{!! Html::image("test_uploads/thumbs/$published_test_private->intro_image",
                            $published_test_private->intro_image, array("class"=>"thumb")) !!}
                            {{ $published_test_private->test_name }}</td>
                        
                       @endif
                        
                        {{-- <td>{{ $published_test_private->intro }}</td> --}}
                        {{-- <td>{{ $published_test_private->conclusion }}</td> --}}
                        @if($published_test_private->shuffle)
                        <td>{{ "Yes" }}</td> @else <td>{{ "No" }}</td> 
                        @endif
                        <td>Yes</td>
                        {{-- <td>{{ $published_test_private->is_published }}</td> --}}
                        {{-- <td>{{ $published_test_private->is_public }}</td> --}}
                        {{-- <td>{{ $published_test_private->user_id }}</td> --}}
                        <td>{!! link_to_route('take_test', 'Take This Test', 
                                array($published_test_private->id), 
                                array('class' => 'btn btn-danger')) !!}
                        </td>
                    </tr>

                    @endif
                     @endforeach
                            </tbody>
            </table>
</div>
        </div>
    </div>
    @endsection
{{-- </body>
</html> --}}