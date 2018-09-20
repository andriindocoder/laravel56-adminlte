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
			<a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
			<button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
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