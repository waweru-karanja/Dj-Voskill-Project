@extends('frontend.master')
@section('title','post category')
@section('content')
<section class="single-layout">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 content">
        <h1>{{ $blogcategorys->blogcat_title }}</h1>
        @foreach ($blogposts as $blog)
            <div class="card mb-5">
                <div class="row no-gutters align-items-center align-items-center">
                    <h5 class="card-title title-font" style=" width:100%;"><a href="{{ url('blog/post/'.Str::slug($blog->blo_title).'/'.$blog->id) }}"><span>{{ $blog->id }}.</span>{{ $blog->blo_title }}</h5>
                    <div class="col-md-4" style="border: 2px solid black;">
                        <a href="{{ url('blog/post/'.Str::slug($blog->blo_title).'/'.$blog->id) }}">
                            <img src="{{ asset('blogposts/'.$blog->blo_image) }}" class="card-img img-fluid img-thumbnail" alt="{{ $blog->blo_title }}" style="width: 100%; height:100%;">
                        </a>
                    </div>
                    <div class="col-md-8"> 
                        <div class="card-body">
                            <div class="blog-meta">
                                <!--date and time the article was published-->
                                <i class="fa fa-clock"><span>{{$blog->created_at->diffforhumans()}}</span></i>
                                <!--category the article belongs to-->
                                <a href="{{ url('blog/category/'.Str::slug($blog->blogcategor->blogcat_title).'/'.$blog->blogcategor->id) }}"><i class="fa fa-rss-square"><span>{{ $blog->blogcategor->blogcat_title }}</span></i></a>
                                <!--comments for the article-->
                                {{-- <a href="#"><i class="fa fa-comments"><span>{{ count($blog->blogcomments) }} Comments</span></i></a> --}}

                                <p class="card-text">{{ str_limit($blog->blo_details,255)}}
                                    <div class="stage">
                                    <a href="{{ url('blog/post/'.Str::slug($blog->blo_title).'/'.$blog->id) }}">Read More</a>
                                    </div>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center">
          {!! $blogposts->links() !!}
        </div>
        <!-- Archive posts -->
        {{-- <div class="archive-posts theiaStickySidebar">
          <h2></h2>
          @foreach ($blogposts as $blog)
          <div class="card mb-5" style="background: white; border:2px solid black">
            <h4><a href="{{ url('blogpost/'.Str::slug($blog->blo_title).'/'.$blog->id) }}"><span>{{ $blog->id }}.</span>{{ $blog->blo_title }}</a></h4>
          </div>
          @endforeach
          {{-- @if (count($blogcategorys)>0)
          
          @else
           <h3>No Trending News Or Music Releases Found</h3>
          @endif 
      </div> --}}
      {{-- <div class="d-flex justify-content-center">
            {!! $blogcategorys->links() !!}
       </div> --}}
      </div>
      @include('frontend.blogsidebar')
    </div>
  </div>
</section>
@endsection

  