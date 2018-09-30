<table class="table table-striped">
  <tr>
    <th width="10%">Action </th>
    <th>Name</th>
    <th>Email</th>
   	<th>Role</th>
  </tr>
  @foreach($users as $user)
	  <tr>
		<td>
			<a href="{{ route('backend.user.edit', $user->id) }}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
			
			@if($user->id == config('cms.default_user_id'))
				<button onclick="return false" type="submit" class="btn btn-sm btn-danger disabled"><i class="fa fa-times"></i></button>
			@else
				<a href="{{ route('backend.user.confirm', $user->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
			@endif

		</td>
	  	  <td>{{ $user->name }}</td>
	      <td>{{ $user->email }}</td>
			<td>{{ $user->roles->first()->display_name }}</td>
	  	</tr>
  @endforeach
</table>