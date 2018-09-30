  <div class="card">
    <!-- /.card-header -->
    <div class="card-header">
      <h3 class="card-title">Add New User</h3>
      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
		  	

          <!-- /.card-header -->
		<div class="card-body p-1">
		<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
			{!! Form::label('name') !!}
			{!! Form::text('name', null, ['class'=>'form-control']) !!}
			@if($errors->has('name'))
				<span class="badge badge-danger">{{ $errors->first('name') }}</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
			{!! Form::label('email') !!}
			{!! Form::text('email', null, ['class'=>'form-control']) !!}
			@if($errors->has('email'))
				<span class="badge badge-danger">{{ $errors->first('email') }}</span>
			@endif
		</div>

    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
      {!! Form::label('password') !!}
      {!! Form::password('password', ['class'=>'form-control']) !!}
      @if($errors->has('password'))
        <span class="badge badge-danger">{{ $errors->first('password') }}</span>
      @endif
    </div>

    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
      {!! Form::label('password_confirmation') !!}
      {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
      @if($errors->has('password_confirmation'))
        <span class="badge badge-danger">{{ $errors->first('password_confirmation') }}</span>
      @endif
    </div>

    <div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
      {!! Form::label('role') !!}
      @if($user->exists && $user->id == config('cms.default_user_id'))
        {!! Form::hidden('role',$user->roles->first()->id) !!}
        <p class="form-control-static">{{ $user->roles->first()->display_name }}</p>
      @else
      {!! Form::select('role',App\Role::pluck('display_name','id'), $user->exists ? $user->roles->first()->id : null, ['class'=>'form-control','placeholder' => 'Choose a Role']) !!}
      @endif
      @if($errors->has('role'))
        <span class="badge badge-danger">{{ $errors->first('role') }}</span>
      @endif
    </div>

        <div class="pull-left">
          <button type="submit" class="btn btn-primary">{{ $user->exists ? 'Update' : 'Save'}}</button>
          <a href="{{ route('backend.user.index') }}" class="btn btn-default">Back</a>
        </div>
    </div>



    </div>
    <!-- /.card -->
  </div>