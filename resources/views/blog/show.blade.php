@extends('layouts.main')
@section('content')
<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

      <!-- Title -->
      <h1 class="mt-4">{{ $post->title }}</h1>

      <!-- Author -->
      <p class="lead">
        by
        <a href="{{ route('author',$post->author->slug) }}">{{ $post->author->name }}</a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p>Posted {{ $post->date }} on <strong><a href="{{ route('category',$post->category->slug)}}">{{ $post->category->title}}</a></strong></p>

      <hr>
      @if($post->image_url)
      <!-- Preview Image -->
      <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">
      <hr>
      @endif

      <!-- Post Content -->
      <p class="lead">{!! $post->body_html !!}</p>

      <hr>
      
      <article class="post-author padding-10">
      <div class="media">
        <div class="media-center">
          <a href="{{ route('author', $post->author->slug) }}">
            <img src="{{ $post->author->gravatar() }}" width="100" height="100" alt="{{ $post->author->name }}" class="media-object">
          </a>
        </div>
        <div class="media-body" style="padding-left: 10px;">
          <h4 class="media-heading"><a href="{{ route('author', $post->author->slug) }}">{{ $post->author->name }}</a></h4>
          <div class="post-author-count">
            <a href="{{ $post->author->slug }}">
              <i class="fa fa-clone"></i>
              <?php $postCount = $post->author->posts()->published()->count();?>
              {{ $postCount }} {{ str_plural('post', $postCount) }}
            </a>
          </div>
          {!! $post->author->bio_html !!}
        </div>
      </div>
      </article>
      <br>
      

    </div>

    @include('layouts.sidebar')

  </div>
  <!-- /.row -->

</div>
<!-- /.container -->
@endsection