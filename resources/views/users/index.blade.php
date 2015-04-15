@extends('app')
@section('content')
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/remove_publish.js') !!}

@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Users Tests</h1>

	<p>{!! link_to_route('tests.create', 'Create new test', 
		   array() , array('class' => 'btn btn-primary')) !!}
	</p>

<p>	
@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif
</p>
@if ($tests->count())
{{-- {!! dd($tests) !!} --}}
	<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>Test ID</th>
					<th>Test_name</th>
					<th>Intro</th>
					<th>Conclusion</th>
					<th>user_id</th>
					<th>Is_Public</th>
					<th>Add Q/A</th>
					<th>Edit Test</th>
					<th>Delete</th>
					<th>Public/Private</th>
					<th>Publish/Unpublish</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($tests as $test)
				<tr>
					<td>{{ $test->id }}</td>
					<td>{{ $test->test_name }}</td>
					<td>{{ $test->intro }}</td>
					<td>{{ $test->conclusion }}</td>
					<td>{{ $test->user_id }}</td>
					<td>{{ $test->is_public }}</td>
					<td>
						{!! link_to_route('questions.show', 'Add Q/A', 
						array($test->id), array('class' => 'btn btn-primary')) !!}
					</td>
					<td>
						{!! link_to_route('tests.edit', 'Edit Test', 
						array($test->id), array('class' => 'btn btn-info')) !!}
					</td>
					<td>
						{!! Form::open(array('method'=> 'DELETE', 
						'route' => array('tests.destroy', $test->id))) !!}
						{!! Form::submit('Delete Test', 
						array('class' => 'btn btn-danger')) !!}
						{!! Form::close() !!}
					</td>
					{{-- For public --}}
					@if(!$test->is_public)
					<td class="is_public">
						{!! link_to_route('is_private', 'PRIVATE', 
						array('test_id'=>$test->id), 
						array('class' => 'btn btn-info is_public')) !!}
					</td>
					@else
					<td class="publish">
						{!! link_to_route('is_public', 'PUBLIC', 
						array('test_id'=>$test->id), 
						array('class' => 'btn btn-success is_private')) !!}
					</td> 
					@endif
					{{-- For Published --}}
					@if(!$test->is_published)
					<td class="publish">
						{!! link_to_route('publish', 'PUBLISH', 
						array('test_id'=>$test->id), 
						array('class' => 'btn btn-danger publish')) !!}
					</td>
					@else
					<td class="publish">
						{!! link_to_route('unpublish', 'UNPUBLISH', 
						array('test_id'=>$test->id), 
						array('class' => 'btn btn-success unpublished')) !!}
					</td> 
					@endif

				</tr>
			@endforeach
			</tbody>
	</table>
@else
	<h1>There are no tests</h1>
@endif
@stop
@endif
 
@endsection

