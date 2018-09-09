@extends('layouts.main')
 
@section('content')
<!-- Page Content -->
<div class="container">
 
  <div class="row">
 
    <!-- Blog Entries Column -->
    <div class="col-md-8">
 
      <h1 class="my-4">
      </h1>

      @foreach($posts as $post)
 
      <!-- Blog Post -->
      <div class="card mb-4">
        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title">{{ $post->title }}</h2>
          <p class="card-text">{{ $post->excerpt }}</p>
          <a href="#" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted on {{ $post->date }} by
          <a href="#">{{ $post->author->name }}</a>
        </div>
      </div>

      @endforeach
      
      <!-- Pagination -->
      <ul class="pagination justify-content-center mb-4">
        {{ $posts->links() }}
      </ul>
 
    </div>
 
    @include('layouts.sidebar')
 
  </div>
  <!-- /.row -->
 
</div>
<!-- /.container -->
@endsection