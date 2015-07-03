@extends('app')
@section('content')
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/remove_publish.js') !!}
{!! Html::script('js/students_taken_tests.js') !!}
@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1 style="text-align:center"><?php echo Auth::user()->name;  ?> Tests</h1>
	<p>{!! link_to_route('tests.create', 'Create new test', 
		   array() , array('class' => 'btn btn-primary btn-lg ')) !!}
	</p>
	<p>	
		@if(Session::has('message'))
		{!! Session::get('message'); !!}
@endif
	</p>
@if ($tests->count())
{{-- {!! dd($tests) !!} --}}
	<table class="table table-striped table-bordered table-hover manji">
			<thead>
				<tr>
					<th>TEST ID</th>
					<th>Test name</th>
					<th>Intro</th>
					<th>Intro Image</th>
					<th>Conclusion</th>
					<th>Conclusion Image</th>
					{{-- <th>user_id</th> --}}
					{{-- <th>Is_Public</th> --}}
					<th>Manage Q/A</th>
					<th>Edit Test</th>
					<th>Delete Test</th>
					<th>Public/Private</th>
					<th>Publish/Unpublish</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($tests as $test)
				<tr class="warning">
					<td>{{ $test->id }}</td>
					<td>{{ $test->test_name }}</td>
					<td><i>{{ $test->intro }}</i></td>
					 @if($test->intro_image === "")
						<td>X</td>
					@else 
					<td>{!! Html::image("test_uploads/thumbs/$test->intro_image", 
							$test->intro_image, array('class' => 'thumb')) !!}
					</td>
					@endif
					<td><i>{{ $test->conclusion }}</i></td>
					@if($test->conclusion_image === "")
					 <td>X</td>
					 @else 
					<td>{!! Html::image("test_uploads/thumbs/$test->conclusion_image",
							$test->intro_image, array("class"=>"thumb")) !!}
					</td>
					@endif
					{{-- <td>{{ $test->user_id }}</td> --}}
					{{-- <td>{{ $test->is_public }}</td> --}}
					<td>
						{!! link_to_route('questions.show', 'Manage Q/A', 
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
						array('class' => 'btn btn-danger', 
						'onclick' =>"if(!confirm('Are you sure?')) return false;")) !!}
						{!! Form::close() !!}
					</td>
					{{-- For public --}}
					@if(!$test->is_public)
					<td class="is_public">
						{!! link_to_route('is_private', 'PRIVATE', 
						array('test_id'=>$test->id), 
						array('class' => 'btn btn-danger is_public')) !!}
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
			<?php echo $tests->render(); ?>
			</tbody>
	</table>
@else
	<h1>There are no tests</h1>
@endif
@stop
@endif
@endsection

