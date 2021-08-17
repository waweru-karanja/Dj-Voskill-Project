@extends('frontend.master')
@section('title','Post Tags')
@section('content')
<section class="single-layout">
  <div class="container_fluid">
    <div class="row">
      <div class="col-lg-8 content">
        <!-- Archive posts -->
        <div class="archive-posts theiaStickySidebar">
          <h2>Tags:{{ $posttags->blogtag_title }}</h2>
          @foreach ($blogposts as $blog)
          <div class="card mb-5" style="background: white; border:2px solid black">
            <h4><a href="{{ url('blogpost/'.Str::slug($blog->blo_title).'/'.$blog->id) }}"><span>{{ $blog->id }}.</span>{{ $blog->blo_title }}</a></h4>
          </div>
          @endforeach
      </div>
      <div class="d-flex justify-content-center">
        {!! $blogposts->links() !!}
       </div>
      </div>
      @include('frontend.blogsidebar')
    </div>
  </div>
</section>
@endsection

  