@extends('layouts.backend.main')

@section('title', 'Laravel 5 Blog | Add New POst')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Blog <small style="font-size: 15px">Add New Posts</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/blog.index') }}">Blog</a></li>
              <li class="breadcrumb-item active">Add new</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->	    <!-- Main content -->
	    <section class="content">
	      <div class="container-fluid">
	        <div class="row">
	          <div class="col-md-12">
	            <div class="card">
	              <!-- /.card-header -->
	              <div class="card-header">
	                <h3 class="card-title">Add New Post</h3>
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
					{!! Form::model($post, [
						'method' => 'POST',
						'route' => 'backend.blog.store',
						'files' => TRUE,
					])!!}

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

				<div class="form-group {{ $errors->has('excerpt') ? 'has-error' : ''}}">
					{!! Form::label('excerpt') !!}
					{!! Form::textarea('excerpt', null, ['class'=>'form-control']) !!}
					@if($errors->has('excerpt'))
						<span class="badge badge-danger">{{ $errors->first('excerpt') }}</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
					{!! Form::label('body') !!}
					{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
					@if($errors->has('body'))
						<span class="badge badge-danger">{{ $errors->first('body') }}</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('published_at') ? 'has-error' : ''}}">
					{!! Form::label('published_at', 'Publish Date') !!}
					{!! Form::text('published_at', null, ['class'=>'form-control','placeholder' => 'Date Format: Y-m-d H:i:s']) !!}
					@if($errors->has('published_at'))
						<span class="badge badge-danger">{{ $errors->first('published_at') }}</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
					{!! Form::label('category_id', 'Category') !!}
					{!! Form::select('category_id', App\Category::pluck('title','id'), null, ['class'=>'form-control', 'placeholder' => 'Select Category']) !!}
					@if($errors->has('category_id'))
						<span class="badge badge-danger">{{ $errors->first('category_id') }}</span>
					@endif
				</div>

				<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
					{!! Form::label('image', 'Featured Image') !!}
					<br>
					{!! Form::file('image') !!}

					@if($errors->has('image'))
						<span class="badge badge-danger">{{ $errors->first('image') }}</span>
					@endif
				</div>

				<hr>

				{!! Form::submit('Create New Post', ['class' => 'btn btn-primary']) !!}

					{!! Form::close() !!}
				</div>
				<div class="card-footer clearfix">

				</div>		                    	                	              

        </div>
        <!-- /.card -->
      </div>

    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
	  <!-- /.content-wrapper -->
@endsection

@section('script')
	<script type="text/javascript">
		$('#pagination').addClass('no-margin pagination-sm');
	</script>
@endsection
