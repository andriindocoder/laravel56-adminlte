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

		<div class="form-group excerpt {{ $errors->has('excerpt') ? 'has-error' : ''}}">
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
		</div>
		<div class="card-footer clearfix">

		</div>		                    	                	              

    </div>
    <!-- /.card -->
  </div>
  <div class="col-md-3">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"> Publish</h3>
        </div>
        <div class="card-body">
          <div class="form-group">
              <div class="form-group {{ $errors->has('published_at') ? 'has-error' : ''}}">
		  {!! Form::label('published_at','Published Date') !!}

		  <div class='input-group date'>
                  {!! Form::text('published_at', null, ['class'=> 'form-control','placeholder' => 'Y-m-d H:i:s', 'id'=>'datetimepicker1']) !!}
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
		    

		  @if($errors->has('published_at'))
		  <span class="label label-danger help-block">{{ $errors->first('published_at') }}</span>
		  @endif
		</div>
          </div>
        </div>
        <div class="card-footer">
            <div class="pull-right">
              {!! Form::submit('Publish', ['class' => 'btn btn-primary']) !!}
            </div>
            <div class="pull-left">
            	<a id="draft-btn" href="#" class="btn btn-default">Save Draft</a>
            </div>
        </div>
      </div>
      <!-- /.card -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"> Category</h3>
        </div>
        <div class="card-body">
		<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
			{!! Form::select('category_id', App\Category::pluck('title','id'), null, ['class'=>'form-control', 'placeholder' => 'Select Category']) !!}
			@if($errors->has('category_id'))
				<span class="badge badge-danger">{{ $errors->first('category_id') }}</span>
			@endif
		</div>
        </div>
      </div>
      <div class="card card-default">
        <div class="card-header with-border">
          <h3 class="card-title"> Featured Image</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body text-center">
          <div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
          	<div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                <img src="{{ ($post->image_thumb_url) ? $post->image_thumb_url : 'http://placehold.it/200x150&text=No+Image'}}" alt="...">
              </div>
          	  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
          	  <div>
          	    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span>
          	    {!! Form::file('image') !!}
          		</span>
          	    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
          	  </div>
          	</div>

          	@if($errors->has('image'))
          		<span class="badge badge-danger">{{ $errors->first('image') }}</span>
          	@endif
          </div>
        </div>
          <!-- /.card-body -->
      </div>
  </div>
  <!-- right column -->