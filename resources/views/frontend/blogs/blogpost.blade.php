@extends('frontend.master')
@section('title','Blog Post')
@section('content')
<!-- start blog-main -->
<section class="blog-main blog-details-content section-padding">
  <div class="container">
      <div class="row">
          <div class="blog-content col col-md-8">
              <div class="post">
                  <div class="entry-header">
                      <div class="entry-date-media">
                          {{-- <div class="entry-date">25 <span>july</span></div> --}}
                          <div class="entry-media" style="border: 5px solid black">
                            <img src="{{ asset ('blogposts/'.$postdetails->blo_image) }}" class="img img-responsive img-rounded" style="width:100%; height:500px;"alt="{{ $postdetails->blo_title }}">
                          </div>
                      </div>

                      <div class="entry-formet">
                          <div class="entry-meta">
                              <div class="cat">
                                  <i class="fa fa-tags"></i>
                                  <a href="{{ url('blog/category/'.Str::slug($postdetails->blogcategor->blogcat_title).'/'.$postdetails->blogcategor->id) }}">{{ $postdetails->blogcategor->blogcat_title }}</a>
                              </div>
                              <div class="cat">
                                <i class="fa fa-eye"><span>{{ $postdetails->views }} Views</span></i>
                              </div>
                          </div>
                      </div>

                      <div class="entry-title">
                          <h3>{{ $postdetails->blo_title }}</h3>
                      </div>
                  </div>
                  <!-- end of entry-header -->

                  <div class="entry-content">
                      <p>{{$postdetails->blo_details }}</p>
                  </div>
                  <!-- end of entry-content -->
              </div>

              <div class="tag-social-share">
                  <div class="tag">
                    @foreach ($postdetails->blogtags as $singleposttag )
                    <a href="#">{{ $singleposttag->blogtag_title }}</a>
                    @endforeach
                  </div>
                  
                  <div class="social-share">
                    <p>Share Now:</p>
                      <!-- Go to www.addthis.com/dashboard to customize your tools -->
                      <div class="addthis_inline_share_toolbox"></div>
                  </div>
              </div>
              <div class="comments-area">
                <h3 class="comments-title">{{ count($postcomments) }} comments</h3>
                <ol class="comment-list">
                  @if (count($postcomments)>0)
                    @foreach ($postcomments as $comment )
                    <li style="border: 2px solid red; padding:-5px;">
                      <article  style="border: 2px solid black; ">
                          <div class="comment-meta">
                              <div class="comment-author-metadata">
                                  <img src="{{ asset('usersimages'.'/'.$comment->user->avatar) }}" class="avatar" style="width: 50px;
                                  height: 50px;
                                  border-radius: 100%;">
                                  @if ($comment->user->is_admin==1)
                                    <h4><span>Admin</span></h4>
                                  @else
                                    <h4><span>{{ $comment->user->name }}</span></h4>
                                  @endif
                                  <div class="comment-metadata">
                                    <i class="fa fa-calendar mr-2"></i>{{ $comment->created_at->diffforhumans()  }}</span>
                                  </div>
                              </div>
                          </div>
                          <div class="comment-content">
                            <p data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">{{ $comment->comment }}</p>
                          </div>
                          {{-- <div class="review">
                              <a href="{{ url('login')}}" class="comment-reply-link">Reply</a>
                          </div> --}}
                      </article>

                      {{-- <ol>
                          <li>
                              <article>
                                  <div class="comment-meta">
                                      <div class="comment-author-metadata">
                                          <img src="images/blog-details/author-2.jpg" alt class="avatar">
                                          <h4><a href="#">Big bro's gf</a></h4>
                                          <div class="comment-metadata">
                                              <a href="#">June 4, 2017 at 08:00 AM</a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="comment-content">
                                      <p>Aenean commodo interdum ligula imperdiet dictum. Donec mollis non diam eget condimentum. Aliquam eu eros est. Praesent vulputate sodales magna, egestas blandit mi scelerisque a. Ut commodo venenatis luctus.</p>
                                  </div>
                                  <div class="review">
                                      <a href="#" class="comment-reply-link">Reply</a>
                                  </div>
                              </article>
                              <ol>
                                  <li>
                                      <article>
                                          <div class="comment-meta">
                                              <div class="comment-author-metadata">
                                                  <img src="images/blog-details/author.jpg" alt class="avatar">
                                                  <h4><a href="#">Big bro</a></h4>
                                                  <div class="comment-metadata">
                                                      <a href="#">June 4, 2017 at 08:00 AM</a>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="comment-content">
                                              <p>Aenean commodo interdum ligula imperdiet dictum. Donec mollis non diam eget condimentum. Aliquam eu eros est. Praesent vulputate sodales magna, egestas blandit mi scelerisque a. Ut commodo venenatis luctus.</p>
                                          </div>
                                          <div class="review">
                                              <a href="#" class="comment-reply-link">Reply</a>
                                          </div>
                                      </article>
                                  </li>
                              </ol>
                            </li>
                      </ol> --}}
                    </li>
                    @endforeach
                  @else
                    <p>No Comment Added for now</p>
                  @endif
                </ol>
                <div class="comment-respond">
                  <h3 class="comment-reply-title">Leave a comment</h3>
                  @if (Auth::check())
                  <form class="comment-form row" method="post" action="{{ route ('postcomment',['id'=>$postdetails->id]) }}" role="form">
                    @csrf
                      <div class="col col-sm-12">
                          <textarea class="form-control"name="comment" id="comment"placeholder="Enter Your Comment*"></textarea>
                      </div>
                      @if ($errors)
                        @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach
                      @endif
                      <div class="col col-sm-12 submit-btn">
                        <button type="submit" class="btn theme-btn">Post Comment</button>
                      </div>
                       @else
                        <div class="col col-sm-12 submit-btn">
                          <a href="#" data-toggle="modal" data-target="#RegistrationModal"><button class="btn theme-btn">Log In To Comment</button></a>
                        </div>
                      @endif
                  </form>
                </div>
              </div>
          </div>
          @include('frontend.blogsidebar')
          <!-- end of blog-content 

          <div class="blog-sidebar col col-md-4" style="border:2px solid blue;">
              

              <div class="widget categories-widget">
                  <h3>Categories</h3>
                  <ul>
                    @foreach ($cats as $blogcat )
                      <li><a href="#">{{ $blogcat->blogcat_title }}</a></li>
                    @endforeach
                  </ul>
              </div>
              <div class="widget popular-posts-widget" style="border:2px solid blue;">
                <div class="sidebar-posts">
                  <div class="sidebar-title">
                    <h5>Latest Posts</h5>
                  </div>
                  @if ($recent_posts)
                    @foreach ($recent_posts as $post )
                    <div class="sidebar-content p-0">
                      <div class="card border-0">
                          <div class="row no-gutters align-items-center">
                              <div class="col-3 col-md-3">
                                  <a href="{{ url('post/'.Str::slug($post->blo_title).'/'.$post->id) }}">
                                      <img src="{{ asset('blogposts'.'/'.$post->blo_image) }}" class="card-img" alt="">
                                  </a>
                              </div>
                              <div class="col-9 col-md-9">
                                  <div class="card-body">
                                      <ul class="category-tag-list mb-0">
                                          <li class="category-tag-name">
                                            <a href="{{ url('blogcategory/'.Str::slug($postdetails->blogcategor->blogcat_title).'/'.$postdetails->blogcategor->id) }}">{{ $postdetails->blogcategor->blogcat_title }}</a>
                                          </li>
                                      </ul>
                                      <h5 class="card-title title-font"><a href="{{ url('blogpost/'.Str::slug($post->blo_title).'/'.$post->id) }}">{{ $post->blo_title }}</a>
                                      </h5>
                                      <div class="author-date">
                                        <span>{{ $post->created_at->diffForHumans() }}</span>
                                      </div>
                                  </div>
                              </div>
                            </div>
                      </div>
                    </div>
                    @endforeach
                  @endif
                </div>
                  <h3>Latest Posts</h3>
                  <ul>
                    @if ($recent_posts)
                      @foreach ($recent_posts as $post )
                      <li>
                        <div>
                            <span class="date">{{ $post->created_at->diffForHumans() }}</span>
                            <h6><a href="{{ url('blogpost/'.Str::slug($post->blo_title).'/'.$post->id) }}">{{ $post->blo_title }}</a></h6>
                        </div>
                      </li>
                      @endforeach
                    @endif
                  </ul>
              </div>

              <div class="widget populer-tags-widget">
                  <h3>Popular tags</h3>
                  <ul>
                      <li><a href="#">Wedding ceremony</a></li>
                      <li><a href="#">Love</a></li>
                      <li><a href="#">Story</a></li>
                      <li><a href="#">Events</a></li>
                      <li><a href="#">Love</a></li>
                      <li><a href="#">First Metting</a></li>
                      <li><a href="#">Couple</a></li>
                      <li><a href="#">Gift</a></li>
                  </ul>
              </div>
          </div>
          <!-- end of sidebar -->
      </div>
      <!-- end of row -->
  </div>
  <!-- end of container -->
</section>
<!-- end of blog-main -->
<!-- Recommended posts end -->
<section class="related-posts p-2 mt-2">
  <h3 class="text-center">Related posts</h3>
    <div class="row">
      
        @forelse ($relatedposts as $singlepost)
        <div class="col-lg-3 col-md-6">
          <div class="swiper-slide">
              <div class="ms_rcnt_box">
                  <div class="ms_rcnt_box_img">
                    <img src="{{ asset('blogposts'.'/'.$singlepost->blo_image) }}" alt="{{ $singlepost->blo_title }}" style="width:100%; height:200px;">
                  </div>
                  <div class="ms_rcnt_box_text">
                    <h3><a href="{{ url('blog/post/'.Str::slug($singlepost->blo_title).'/'.$singlepost->id) }}">{{ $singlepost->blo_title }} </a></h3>
                  </div>
              </div>
          </div>
        </div>
        {{-- <div class="col-lg-3 p-2">
          <div class="card small-card simple-overlay-card m-0">
            <a href="#"><img  class="card-img img-fluid img-thumbnail" alt="" /></a>
            <div class="card-img-overlay">
              <h5 class="card-title title-font">
                <a href="#">{{ $singlepost->blo_title }}</a>
              </h5>
            </div>
          </div>
        </div> --}}
        @empty
          
        @endforelse
        
      
    </div>
</section>

@endsection

  