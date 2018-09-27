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
			{!! Form::open(['method' => 'DELETE', 'route' => ['backend.blog.destroy', $post->id] ]) !!}
			@if(check_user_permissions(request(), "Blog@edit", $post->id))
			<a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
			@else
			<a href="#" class="btn btn-sm btn-default disabled"><i class="fa fa-edit"></i></a>
			@endif
			@if(check_user_permissions(request(), "Blog@destroy", $post->id))
			<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
			@else
			<button type="button" onclick="return false;" class="btn btn-sm btn-danger disabled"><i class="fa fa-trash"></i></button>
			@endif
			{!! Form::close() !!}
		</td>
	  	  <td>{{ $post->title }}</td>
	      <td>{{ $post->author->name }}</td>
			<td>{{ $post->category->title }}</td>
			<td>
				<abbr title="{{ $post->formattedDate(true) }}"> {{ $post->formattedDate() }}</abbr> | 
				{!! $post->publicationLabel() !!}
			</td>
	  	</tr>
  @endforeach
</table>