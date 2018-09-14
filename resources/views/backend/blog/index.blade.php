@extends('layouts.backend.main')

@section('title', 'Laravel 5 Blog | Blog Index')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Blog <small style="font-size: 15px">Display All Blog Posts</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/blog.index') }}">Blog</a></li>
              <li class="breadcrumb-item active">All Posts</li>
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
	                <h3 class="card-title">Blog Posts</h3>
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
  	              	<div class="row">
  	              		<div class="col-md-6" style="padding-left: 10px; padding-right: 30px; padding-top: 10px; padding-bottom: 10px; ">
  	              			<a href="{{ route('backend.blog.create') }}" class="btn btn-info float-left">
  	              			  <span>
  	              			    <i class="fa fa-plus-circle"></i>
  	              			    <span>
  	              			      Add Post
  	              			    </span>
  	              			  </span>
  	              			</a>
  	              		</div>
	              		<div class="col-md-6" style="padding-left: 10px; padding-right: 30px; padding-top: 10px; padding-bottom: 10px; ">
	              			<div class="float-right" style="color: blue;">
	              				<a class="" href="?status=active">Active(12) </a>
	              			</div>
	              		</div>
  	              	</div>
				@if(session('message'))
					<div class="alert alert-success">
						{{ session('message') }}
					</div>
				@endif

	            @if(!$posts->count())
				<div class="alert alert-danger">
					<strong>No Record Found</strong>
				</div>
				@else

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
					      	<a href="{{ route('backend.blog.edit', $post->id) }}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a>
					      	<a href="{{ route('backend.blog.destroy', $post->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
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
				@endif
			</div>
			<div class="card-footer clearfix">
				<div class="pull-left" id="pagination">
					{{ $posts->render() }}
				</div>
				<div class="pull-right">
					<?php $postCount = $posts->count();?>
					<small style="padding-right: 25px;">{{ $postCount }} out of {{ $allPostCount }} {{ str_plural('Items', $allPostCount) }}</small>
				</div>
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
