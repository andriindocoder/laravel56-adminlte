<table class="table table-striped">
  <tr>
    <th width="10%">Action </th>
    <th>Title</th>
    <th width="20%">Author</th>
    <th width="20%">Category</th>
    <th width="20%">Date</th>
  </tr>
  @foreach($posts as $post)
	  <tr>
		<td>
			{!! Form::open(['style' => 'display:inline-block' , 'method' => 'PUT', 'route' => ['backend.blog.restore', $post->id] ]) !!}
			@if(check_user_permissions(request(), "Blog@restore", $post->id))
			<button title="Restore" class="btn btn-sm btn-default"><i class="fa fa-refresh"></i></button>
			@else
			<button title="Restore" class="btn btn-sm btn-default disabled"><i class="fa fa-refresh"></i></button>
			@endif
			{!! Form::close() !!}
			{!! Form::open(['style' => 'display:inline-block' ,'method' => 'DELETE', 'route' => ['backend.blog.force-destroy', $post->id] ]) !!}
			@if(check_user_permissions(request(), "Blog@forceDestroy", $post->id))
			<button title="Hard Delete" type="submit" onclick="return confirm('Are you sure to delete the post?')" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
			@else
			<button title="Hard Delete" type="button" onclick="return false" class="btn btn-sm btn-danger disabled"><i class="fa fa-times"></i></button>
			@endif
			{!! Form::close() !!}
		</td>
	  	  <td>{{ $post->title }}</td>
	      <td>{{ $post->author->name }}</td>
			<td>{{ $post->category->title }}</td>
			<td>
				<abbr title="{{ $post->formattedDate(true) }}"> {{ $post->formattedDate() }}</abbr>
			</td>
	  	</tr>
  @endforeach
</table>