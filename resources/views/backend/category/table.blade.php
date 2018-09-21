<table class="table table-striped">
  <tr>
    <th width="10%">Action </th>
    <th>Category Name</th>
    <th width="20%" class="text-center">Post Count</th>
  </tr>
  @foreach($categories as $category)
	  <tr>
		<td>
			{!! Form::open(['method' => 'DELETE', 'route' => ['backend.category.destroy', $category->id] ]) !!}
			<a href="{{ route('backend.category.edit', $category->id) }}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
			
			@if($category->id == config('cms.default_category_id'))
				<button onclick="return false" type="submit" class="btn btn-sm btn-danger disabled"><i class="fa fa-times"></i></button>
			@else
				<button onclick="return confirm('Are you sure to delete?')" type="submit" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
			@endif

			{!! Form::close() !!}
		</td>
	  	  <td>{{ $category->title }}</td>
	      <td align="center">{{ $category->posts->count() }}</td>
	  	</tr>
  @endforeach
</table>