@extends('layouts.backend.main')

@section('title', 'Laravel 5 Blog | Category Index')

@section('content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category <small style="font-size: 15px">Display All Categories</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/blog.index') }}">Category</a></li>
              <li class="breadcrumb-item active">All Categories</li>
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
	                <h3 class="card-title">Categories</h3>
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
  	              			<a href="{{ route('backend.category.create') }}" class="btn btn-info float-left">
  	              			  <span>
  	              			    <i class="fa fa-plus-circle"></i>
  	              			    <span>
  	              			      Add Category
  	              			    </span>
  	              			  </span>
  	              			</a>
  	              		</div>
						<div class="col-md-6" style="padding-left: 10px; padding-right: 30px; padding-top: 10px; padding-bottom: 10px; ">
							<div class="pull-right">
							  
							</div>
						</div>
  	              	</div>
				@include('backend.partials.message')

	            @if(!$categories->count())
				<div class="alert alert-danger">
					<strong>No Record Found</strong>
				</div>
				@else
					@include('backend.category.table')
				@endif
			</div>
			<div class="card-footer clearfix">
				<div class="pull-left" id="pagination">
					{{ $categories->appends( Request::query() )->render() }}
				</div>
				<div class="pull-right">
					<?php $categoriesCount = $categories->count();?>
					<small style="padding-right: 25px;">{{ $categoriesCount }} out of {{ $categoriesCount }} {{ str_plural('Items', $categoriesCount) }}</small>
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
