@extends('layouts.main')

@section('content')
<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

      <h1 class="my-4">
      </h1>
      @if(!$posts->count())
        <div class="alert alert-warning">
          <p>Nothing Found</p>
        </div>
      @else
        @if(isset($categoryName))
          <div class="alert alert-info">
            <p>Category: <strong>{{ $categoryName }}</strong></p>
          </div>
        @endif

        @if(isset($authorName))
          <div class="alert alert-info">
            <p>Author: <strong>{{ $authorName }}</strong></p>
          </div>
        @endif

        @foreach($posts as $post)

        <!-- Blog Post -->
        <div class="card mb-4">
          @if($post->image_url)
          <img class="card-img-top" src="{{ $post->image_url }}" alt="{{ $post->slug }}">
          @endif
          <div class="card-body">
            <h2 class="card-title"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2>
            <p class="card-text">{!! $post->excerpt_html !!}</p>
            <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on {{ $post->date }} by <a href="{{ route('author', $post->author->slug) }}">{{ $post->author->name }}</a>
             in category <a href="{{ route('category', $post->category->slug )}}">{{ $post->category->title }}</a>
          </div>
        </div>

        @endforeach
      @endif

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