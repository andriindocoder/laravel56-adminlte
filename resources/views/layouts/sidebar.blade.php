<!-- Sidebar Widgets Column -->
    <div class="col-md-4">
 
      <!-- Search Widget -->
      <form action="{{ route('blog') }}">
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" value="{{ request('term') }}" name="term" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit">Go!</button>
              </span>
            </div>
          </div>
        </div>
      </form>
 
      <!-- Categories Widget -->
      {{-- <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#">Web Design</a>
                </li>
                <li>
                  <a href="#">HTML</a>
                </li>
                <li>
                  <a href="#">Freebies</a>
                  </li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#">JavaScript</a>
                </li>
                <li>
                  <a href="#">CSS</a>
                </li>
                <li>
                  <a href="#">Tutorials</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div> --}}
       <!-- Side Widget -->
      <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <div>
          <ul class="list-group list-group-flush">
            @foreach($categories as $category)
            <li class="list-group-item"><a href="{{ route('category', $category->slug)}}">{{ $category->title }} <span class="badge badge-pill badge-secondary float-right">{{ $category->posts->count() }}</span></a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="card my-4">
        <h5 class="card-header">Popular Posts</h5>
        <div>
          <ul class="list-group list-group-flush">
            @foreach($popularPosts as $popularPost)
            <li class="list-group-item"><img src="{{ $popularPost->image_thumb_url }}" width=35% alt=""><a href="{{ route('blog.show', $popularPost->slug)}}">&nbsp;{{ substr($popularPost->title, 0, 20) }} ...<span class="badge badge-pill badge-secondary float-right">{{ $popularPost->view_count }} {{ str_plural('hit', $popularPost->view_count)}}</span></a></li>
            @endforeach
          </ul>
        </div>
      </div>
 
    </div>