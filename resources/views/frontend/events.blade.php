
@extends('frontend.master')
@section('title','Voskill Events')
@section('content')
<!-- layout -->
<!--=================================
      Latest Events
      =================================-->
      {{-- <div class="row">
        <div class="col-lg-9" style="border: 2px solid black">
            <section id="latest-events">
                <div class="container">
                    <div class="row">
                        @foreach ($events as $event )
                        <div class="col-lg-4 col-md-4 col-sm-6" style="border: 2px solid green;">
                            <div class="event-feed latest">
                                <img src="{{asset('eventimages/'.$event->eve_image) }}"  alt="" style="width:100%; height:200px;">
                                <div class="date">
                                    <span class="day">24</span>
                                    <span class="month">AUG</span>
                                </div>
                                <h5><a href="event-detail.html" >{{ $event->eve_name }}</a></h5>
                                <ul>
                                    <li><b class=" fa fa-location-arrow"></b>{{ $event->eve_location }}</li>
                                    <li><b class=" fa fa-clock-o"></b>{{ $event->eve_time }}</li>
                                    
                                </ul>
                                <a class="btn" href="#">Buy tickets</a>
                                <a class="btn more" href="#">More Details</a>
                            </div><!--\\event-feed latest-->
                        </div>  
                        @endforeach
                    </div><!--row-->
                </div><!--//container-->  
            </section>
            <div class="clearfix"></div>
          </div>
          
          <div class="col-lg-3" style="border: 2px solid yellow">
                            <!-- Sidebar posts -->
                <div id="sticker" class="theiaStickySidebar">
                    <div class="widget search-widget">
                    <h3>Search</h3>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search a Post">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </form>
                    </div>
                    <div class="widget categories-widget">
                    <h3>Categories</h3>
                    <ul>
                        @foreach ($cats as $blogcat )
                        <li><a href="{{ url('blogcategory/'.Str::slug($blogcat->blogcat_title).'/'.$blogcat->id) }}">{{ $blogcat->blogcat_title }}</a></li>
                        @endforeach
                    </ul>
                    </div>
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
                                                <a href="{{ url('blogcategory/'.Str::slug($post->blogcategor->blogcat_title).'/'.$post->blogcategor->id) }}" style="font-style: italic; font-size:10px;">{{ $post->blogcategor->blogcat_title }}</a>
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
                    <div class="popular-tags mt-4">
                        <div class="sidebar-title">
                            <h5>Popular tags</h5>
                        </div>
                        <div class="sidebar-content">
                            <ul class="sidebar-list tags-list">
                            @foreach ($posttags as $tag )
                            <li><a href="#">{{ $tag->blogtag_title }}</a></li>
                            @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- Sidebar posts end -->
          </div>
      </div> --}}
      
    

<!-- End layout -->

<!-- START SCHEDULE -->
<section id="schedule" class="section-padding" style="border: 2px solid black;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h3>Event Schedule</h3>
                    <span></span>
                    <p>This are all our upcoming Events and Tv shows</p>
                </div>
            </div>
            <!-- end col -->
            <div class="container">
                @if (count($events)>0)
                            @foreach ($events as $eve)
                            <div class="schedule-single">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                        <img class="rounded  img-fluid" src="{{ asset('eventimages/'.$eve->eve_image) }}" alt="{{ $eve->eve_name }}">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="schedule-single-info">
                                            <h4>{{ $eve->eve_name }}</h4>
                                            <p>{{ $eve->eve_details }}</p>
                                            <span class="post-date"><i class="far fa-clock"></i>{{ $eve->eve_date}}</span>
                                            <span class="post-comment"><i class="fas fa-compass"></i>{{ $eve->eve_location }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="border: 2px solid green">
                                        <a href="#" class="schedule-btn">Purchase Ticket</a>
                                        <a href="#" class="schedule-btn">View Details</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                             <h3>No Events has been Found</h3>
                            @endif
                            <div class="d-flex justify-content-center">
                                {!! $events->links() !!}
                            </div>
            </div>
            {{-- <div class="col-lg-12 schedule-tab">
                <ul id="tabsJustified" class="nav nav-tabs justify-content-center text-center">
                    <li class="nav-item">
                        <a href="#" data-target="#one" data-toggle="tab" class="nav-link">
                            <p>Dec 24, 2017</p><span>Saturday</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-target="#two" data-toggle="tab" class="nav-link active">
                            <p>Dec 25, 2017</p><span>Sunday</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" data-target="#three" data-toggle="tab" class="nav-link">
                            <p>Dec 26, 2017</p><span>Monday</span>
                        </a>
                    </li> 
                </ul>
                <div id="tabsJustifiedContent" class="tab-content">
                    <div id="one" class="tab-pane fade">
                            @if (count($events)>0)
                            @foreach ($events as $eve)
                            <div class="schedule-single">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="border: 2px solid black;">
                                        <img class="rounded  img-fluid" src="assets/img/speakers/person6.jpg" alt="" style="border: 2px solid black;">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="schedule-single-info">
                                            <h4>Reinventing Experiences to All</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                            <span class="post-date"><i class="far fa-clock"></i>20 Dec 2017</span>
                                            <span class="post-comment"><i class="fas fa-compass"></i>Theater Room 5</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12" style="border: 2px solid green">
                                        <a href="#" class="schedule-btn">View Details</a>
                                        <a href="#" class="schedule-btn">View Details</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                             <h3>No Events For This Month Found</h3>
                            @endif
                            <div class="d-flex justify-content-center">
                                {!! $events->links() !!}
                            </div>
                    </div>
                    {{-- <div id="two" class="tab-pane active show fade">
                        <div class="schedule-single">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <img class="rounded  img-fluid" src="assets/img/speakers/person5.jpg" alt="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="schedule-single-info">
                                        <h4>Welcome & Registration</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                        <span class="post-admin"><a href="#"><i class="icofont icofont-business-man-alt-3"></i>Kyle Mark</a></span>
                                        <span class="post-date"><i class="icofont icofont-clock-time"></i>24 Dec 2017</span>
                                        <span class="post-comment"><i class="icofont icofont-location-pin"></i>Theater Room 5</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <a href="#" class="schedule-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- end single schedule -->
                        <div class="schedule-single">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <img class="rounded  img-fluid" src="assets/img/speakers/person2.jpg" alt="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="schedule-single-info">
                                        <h4>How to make beautiful design ?</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                        <span class="post-admin"><a href="#"><i class="icofont icofont-business-man-alt-3"></i>Stepen Bay</a></span>
                                        <span class="post-date"><i class="icofont icofont-clock-time"></i>25 Dec 2017</span>
                                        <span class="post-comment"><i class="icofont icofont-location-pin"></i>Theater Room 5</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <a href="#" class="schedule-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- end single schedule -->
                        <div class="schedule-single">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <img class="rounded  img-fluid" src="assets/img/speakers/person4.jpg" alt="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="schedule-single-info">
                                        <h4>How to optimize design ?</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                        <span class="post-admin"><a href="#"><i class="icofont icofont-business-man-alt-3"></i>Maria law</a></span>
                                        <span class="post-date"><i class="icofont icofont-clock-time"></i>26 Dec 2017</span>
                                        <span class="post-comment"><i class="icofont icofont-location-pin"></i>Theater Room 5</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <a href="#" class="schedule-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- end single schedule -->
                        <div class="schedule-single">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <img class="rounded  img-fluid" src="assets/img/speakers/person1.jpg" alt="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="schedule-single-info">
                                        <h4>Introduction about event & conference</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                        <span class="post-admin"><a href="#"><i class="icofont icofont-business-man-alt-3"></i>Marlen Waller</a></span>
                                        <span class="post-date"><i class="icofont icofont-clock-time"></i>27 Dec 2017</span>
                                        <span class="post-comment"><i class="icofont icofont-location-pin"></i>Theater Room 5</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <a href="#" class="schedule-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- end single schedule -->
                    </div>
                    <div id="three" class="tab-pane fade">
                        <div class="schedule-single">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <img class="rounded  img-fluid" src="assets/img/speakers/person2.jpg" alt="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="schedule-single-info">
                                        <h4>Halloween Festival</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                        <span class="post-admin"><a href="#"><i class="icofont icofont-business-man-alt-3"></i>Mhala Deen</a></span>
                                        <span class="post-date"><i class="icofont icofont-clock-time"></i>21 Dec 2017</span>
                                        <span class="post-comment"><i class="icofont icofont-location-pin"></i>Theater Room 5</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <a href="#" class="schedule-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- end single schedule -->
                        <div class="schedule-single">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <img class="rounded  img-fluid" src="assets/img/speakers/person3.jpg" alt="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="schedule-single-info">
                                        <h4>Menu Serving</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                        <span class="post-admin"><a href="#"><i class="icofont icofont-business-man-alt-3"></i>Hory Moon</a></span>
                                        <span class="post-date"><i class="icofont icofont-clock-time"></i>22 Dec 2017</span>
                                        <span class="post-comment"><i class="icofont icofont-location-pin"></i>Theater Room 5</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <a href="#" class="schedule-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- end single schedule -->
                        <div class="schedule-single">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <img class="rounded  img-fluid" src="assets/img/speakers/person1.jpg" alt="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="schedule-single-info">
                                        <h4>Fireworks</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                        <span class="post-admin"><a href="#"><i class="icofont icofont-business-man-alt-3"></i>Sat Rolens</a></span>
                                        <span class="post-date"><i class="icofont icofont-clock-time"></i>20 Dec 2017</span>
                                        <span class="post-comment"><i class="icofont icofont-location-pin"></i>Theater Room 5</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <a href="#" class="schedule-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- end single schedule -->
                        <div class="schedule-single">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <img class="rounded  img-fluid" src="assets/img/speakers/person4.jpg" alt="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                    <div class="schedule-single-info">
                                        <h4>Introduction about event & conference</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                        <span class="post-admin"><a href="#"><i class="icofont icofont-business-man-alt-3"></i>Sharleen Charles</a></span>
                                        <span class="post-date"><i class="icofont icofont-clock-time"></i>23 Dec 2017</span>
                                        <span class="post-comment"><i class="icofont icofont-location-pin"></i>Theater Room 5</span>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                                    <a href="#" class="schedule-btn">View Details</a>
                                </div>
                            </div>
                        </div>
                        <!-- end single schedule -->
                    </div> 
                </div>
            </div> --}}
            <!-- end col -->
        </div>
        <!--- END ROW -->
    </div>
    <!--- END CONTAINER -->
</section>
<!-- END SCHEDULE -->

@endsection