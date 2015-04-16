@extends('app')
@section('content')

    <div class="container">
        <div class="content">
            <h1> Take public tests: </h1>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Created By User</th>
                        {{-- <th>Id</th> --}}
                        <th>Test name</th>
                        {{-- <th>Intro</th> --}}
                        {{-- <th>Conclusion</th> --}}
                        <th>Questions Shuffled</th>
                        {{-- <th>Is_published</th> --}}
                        {{-- <th>Is_public</th> --}}
                        {{-- <th>user_id</th> --}}
                    </tr>
                </thead>
                <tbody>

                   
                    @foreach ($users_published_tests as $published_test)
                    @if($published_test->is_published && $published_test->is_public)
                    <tr>
                        <td>{{ $published_test->name }}</td>
                        {{-- <td>{{ $published_test->id }}</td> --}}
                        <td>{{ $published_test->test_name }}</td>
                        {{-- <td>{{ $published_test->intro }}</td> --}}
                        {{-- <td>{{ $published_test->conclusion }}</td> --}}
                        @if($published_test->shuffle)
                        <td>{{ "Yes" }}</td> @else <td>{{ "No" }}</td> @endif
                        {{-- <td>{{ $published_test->is_published }}</td> --}}
                        {{-- <td>{{ $published_test->is_public }}</td> --}}
                        {{-- <td>{{ $published_test->user_id }}</td> --}}

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

            <h1> Take private tests: </h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Created By User</th>
                        {{-- <th>Id</th> --}}
                        <th>Test name</th>
                        {{-- <th>Intro</th> --}}
                        {{-- <th>Conclusion</th> --}}
                        <th>Questions shuffled</th>
                        {{-- <th>Is_published</th> --}}
                        {{-- <th>Is_public</th> --}}
                        {{-- <th>user_id</th> --}}
                    </tr>
                </thead>
                <tbody>
                 @foreach ($users_published_tests as $published_test)
               @if($published_test->is_published && $published_test->is_public === 0)
                    <tr>
                        <td>{{ $published_test->name }}</td>
                        {{-- <td>{{ $published_test->id }}</td> --}}
                        <td>{{ $published_test->test_name }}</td>
                        {{-- <td>{{ $published_test->intro }}</td> --}}
                        {{-- <td>{{ $published_test->conclusion }}</td> --}}
                        @if($published_test->shuffle)
                        <td>{{ "Yes" }}</td> @else <td>{{ "No" }}</td> @endif
                        
                        {{-- <td>{{ $published_test->is_published }}</td> --}}
                        {{-- <td>{{ $published_test->is_public }}</td> --}}
                        {{-- <td>{{ $published_test->user_id }}</td> --}}
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