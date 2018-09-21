  <div class="card">
    <!-- /.card-header -->
    <div class="card-header">
      <h3 class="card-title">Add New Category</h3>
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
		<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
			{!! Form::label('title') !!}
			{!! Form::text('title', null, ['class'=>'form-control']) !!}
			@if($errors->has('title'))
				<span class="badge badge-danger">{{ $errors->first('title') }}</span>
			@endif
		</div>

		<div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
			{!! Form::label('slug') !!}
			{!! Form::text('slug', null, ['class'=>'form-control']) !!}
			@if($errors->has('slug'))
				<span class="badge badge-danger">{{ $errors->first('slug') }}</span>
			@endif
		</div>
        <div class="pull-left">
          <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Update' : 'Save'}}</button>
          <a href="{{ route('backend.category.index') }}" class="btn btn-default">Back</a>
        </div>
    </div>



    </div>
    <!-- /.card -->
  </div>