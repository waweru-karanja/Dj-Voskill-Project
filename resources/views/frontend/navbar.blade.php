<!-- header -->
		{{-- <header id="header" style="background-image: url('dist/frontend/images/DjVoskillLogo.jpg');background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;">
			<!-- logo -->
			<strong class="logo">
				<a href="index.html">
					<img class="logo-desktop" src="dist/frontend/images/DjVoskillLogo.jpg" alt="Dj Voskill">
					<img class="logo-mobile" src="dist/frontend/images/DjVoskillLogomobile.png" alt="Dj Voskill">
				</a>
			</strong>	
			<!-- slogan -->
			{{-- <strong class="slogan">Dj Voskill</strong> 
			
		</header> --}}
        {{-- panel --}}
        <div class="panel">
            {{-- nav-holder  --}}
            <div class="site-mobile-menu site-navbar-target">
                <div class="site-mobile-menu-header">
                  <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                  </div>
                </div>
                <div class="site-mobile-menu-body"></div>
              </div> 
              <!-- .site-mobile-menu -->
            <div class="nav-holder">
                {{-- nav --}}
                <nav id="nav">
                    <header class="site-navbar mt-3">
                        <div class="container-fluid">
                          <div class="row align-items-center">
                            <div class="site-logo col-6"><a href="index.html">Brand</a></div>
                      
                            <nav class="mx-auto site-navigation">
                              <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                                <li><a href="index.html" class="nav-link active">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li class="has-children">
                                  <a href="job-listings.html">Job Listings</a>
                                  <ul class="dropdown">
                                    <li><a href="job-single.html">Job Single</a></li>
                                    <li><a href="post-job.html">Post a Job</a></li>
                                  </ul>
                                </li>
                                <li class="has-children">
                                  <a href="services.html">Pages</a>
                                  <ul class="dropdown">
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="service-single.html">Service Single</a></li>
                                    <li><a href="blog-single.html">Blog Single</a></li>
                                    <li><a href="portfolio.html">Portfolio</a></li>
                                    <li><a href="portfolio-single.html">Portfolio Single</a></li>
                                    <li><a href="testimonials.html">Testimonials</a></li>
                                    <li><a href="faq.html">Frequently Ask Questions</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                  </ul>
                                </li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li class="d-lg-none"><a href="post-job.html"><span class="mr-2">+</span> Post a Job</a></li>
                                <li class="d-lg-none"><a href="login.html">Log In</a></li>
                              </ul>
                            </nav>
                            
                            <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
                              <div class="ml-auto">
                                <a href="post-job.html" class="btn btn-outline-white border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-add"></span>Post a Job</a>
                                <a href="login.html" class="btn btn-primary border-width-2 d-none d-lg-inline-block"><span class="mr-2 icon-lock_outline"></span>Log In</a>
                              </div>
                              <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
                            </div>
                      
                          </div>
                        </div>
                      </header>
                    {{-- <strong class="logo-panel"><a href="{{route ('index') }}"><img src="dist/frontend/images/DjVoskillLogo.jpg" alt="Dj Voskill"></a></strong>
                    <ul>
                        <li class="{{'/'==request()->path()?'active':' ' }}"><a href="{{route ('index') }}">Home</a></li>
                        <li class="{{'contact'==request()->path()?'active':' ' }}"><a href="{{route ('contact') }}">Contact Us</a></li>
                        <li class="{{'audiomixtapes'==request()->path()?'active':' ' }}"><a href="{{route ('audiomixtapes') }}">Mixtapes</a></li>
                        <li class="{{'events'==request()->path()?'active':' ' }}"><a href="{{route ('events') }}">Events</a></li>
                        <li class="menu-item menu-item--expanded {{'blog'==request()->path()?'active':' ' }}">
                            <a href="{{ route ('blog') }}">Blog</a>
                            <ul class="menu {{'blog/*'==request()->path()?'active':' ' }}">
                                <li class="menu-item {{'blog/category'==request()->path()?'active':' ' }}">
                                    <?php $cats=DB::table('blogcategories')->get();?>
                                    @foreach ( $cats as $cat )
                                       <li><a class="dropdown-item" href="{{ url('blog/category/'.Str::slug($cat->blogcat_title).'/'.$cat->id) }}">{{ Ucwords($cat->blogcat_title) }}</a></li>
                                    @endforeach
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="float-right">
                        {{-- <li class="nav-item">
                            <a href="#!" class="nav-link navbar-link-2 waves-effect">
                            <i class="fas fa-shopping-cart pl-0"></i>
                            </a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Log In/Sign Up
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#LogInModal">Log in</a></li>
                                {{-- href="{{ url ('login') }}" 
                                <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#RegistrationModal">Register</a>
                                {{-- href="{{ url ('register') }}" 
                            </ul>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ route('userprofile.show',Auth::user()->id)}}">My Account</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('logout') }}">Log Out</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="post">
                            @csrf
                        </form>
                        @endguest
    
                        
           
                    </ul> --}}
                </nav>
            </div>
        </div>
          header --}}


          {{-- <!-- header -->
		<header id="header" style="background-image: url('dist/frontend/images/DjVoskillLogo.jpg');background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;">
			<!-- logo -->
			<strong class="logo">
				<a href="index.html">
					<img class="logo-desktop" src="dist/frontend/images/DjVoskillLogo.jpg" alt="Dj Voskill">
					<img class="logo-mobile" src="dist/frontend/images/DjVoskillLogomobile.png" alt="Dj Voskill">
				</a>
			</strong>	
			<!-- slogan -->
			{{-- <strong class="slogan">Dj Voskill</strong> --}}
			
		</header>
    <!-- panel
    <div class="panel">
        <!-- nav-holder 
        <a class="opener" href="#"><span>Menu</span></a>
        <div class="nav-holder">
            <!-- nav
            <nav id="nav">
                <strong class="logo-panel"><a href="{{route ('index') }}"><img src="dist/frontend/images/DjVoskillLogo.jpg" alt="Dj Voskill"></a></strong>
                <ul>
                    <li class="{{'/'==request()->path()?'active':' ' }}"><a href="{{route ('index') }}">Home</a></li>
                    <li class="{{'contact'==request()->path()?'active':' ' }}"><a href="{{route ('contact') }}">Contact Us</a></li>
                    <li class="{{'audiomixtapes'==request()->path()?'active':' ' }}"><a href="{{route ('audiomixtapes') }}">Mixtapes</a></li>
                    <li class="{{'events'==request()->path()?'active':' ' }}"><a href="{{route ('events') }}">Events</a></li>
                    <li class="menu-item menu-item--expanded {{'blog'==request()->path()?'active':' ' }}">
                        <a href="{{ route ('blog') }}">Blog</a>
                        <ul class="menu {{'blog/*'==request()->path()?'active':' ' }}">
                            <li class="menu-item {{'blog/category'==request()->path()?'active':' ' }}">
                                <?php $cats=DB::table('blogcategories')->get();?>
                                @foreach ( $cats as $cat )
                                   <li><a class="dropdown-item" href="{{ url('blog/category/'.Str::slug($cat->blogcat_title).'/'.$cat->id) }}">{{ Ucwords($cat->blogcat_title) }}</a></li>
                                @endforeach
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="float-right">
                    {{-- <li class="nav-item">
                        <a href="#!" class="nav-link navbar-link-2 waves-effect">
                        <i class="fas fa-shopping-cart pl-0"></i>
                        </a>
                    </li> --}}
                    @guest
                    <li class="nav-item">
                        <a class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Log In/Sign Up
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#LogInModal">Log in</a></li>
                            {{-- href="{{ url ('login') }}" --}}
                            <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#RegistrationModal">Register</a>
                            {{-- href="{{ url ('register') }}" --}} 
                        </ul>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('userprofile.show',Auth::user()->id)}}">My Account</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('logout') }}">Log Out</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="post">
                        @csrf
                    </form>
                    @endguest

                    
       
                </ul>
            </nav>
        </div>
    </div>
      {{-- header --}} 







      <!-- header -->
		<header id="header" style="background-image: url('dist/frontend/images/DjVoskillLogo.jpg');background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;">
<!-- logo -->
<strong class="logo">
<a href="index.html">
  <img class="logo-desktop" src="dist/frontend/images/DjVoskillLogo.jpg" alt="Dj Voskill">
  <img class="logo-mobile" src="dist/frontend/images/DjVoskillLogomobile.png" alt="Dj Voskill">
</a>
</strong>	
<!-- slogan
<strong class="slogan">Dj Voskill</strong> -->

</header>
 {{-- panel --}}
<div class="panel" style="border:2px solid rgb(214, 70, 70);
                        box-shadow: 0px 10px 10px 3px rgba(0, 0, 0, 0.3);
                        background-color: rgb(248, 248, 248);">
    
    
  <!-- Header End -->
    <a class="opener" href="#"><span>Menu</span></a>
    <div class="nav-holder">
            {{-- nav  --}}
        <nav id="nav">
            <strong class="logo-panel"><a href="{{route ('index') }}"><img src="dist/frontend/images/DjVoskillLogo.jpg" alt="Dj Voskill"></a></strong>
            <ul>
                <li class="{{'/'==request()->path()?'active':' ' }}"><a href="{{route ('index') }}">Home</a></li>
                <li class="{{'contact'==request()->path()?'active':' ' }}"><a href="{{route ('contact') }}">Contact Us</a></li>
                <li class="{{'audiomixtapes'==request()->path()?'active':' ' }}"><a href="{{route ('audiomixtapes') }}">Mixtapes</a></li>
                <li class="{{'events'==request()->path()?'active':' ' }}"><a href="{{route ('events') }}">Events</a></li>
                <li class="menu-item menu-item--expanded dropdown {{'blog'==request()->path()?'active':' ' }}">
                    <a href="{{ route ('blog') }}">Blog</a>
                    <ul class="menu {{'blog/*'==request()->path()?'active':' ' }}">
                        <li class="menu-item {{'blog/category'==request()->path()?'active':' ' }}">
                            <?php $cats=DB::table('blogcategories')->get();?>
                            @foreach ( $cats as $cat )
                               <li><a class="dropdown-item" href="{{ url('blog/category/'.Str::slug($cat->blogcat_title).'/'.$cat->id) }}">{{ Ucwords($cat->blogcat_title) }}</a></li>
                            @endforeach
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="login-signup" style="float: right;">
                 {{-- <li class="nav-item">
                    <a href="#!" class="nav-link navbar-link-2 waves-effect">
                    <i class="fas fa-shopping-cart pl-0"></i>
                    </a>
                </li>  --}}
                @guest
                <li class="nav-item">
                    <a class="dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Log In/Sign Up
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#LogInModal">Log in</a></li>
                        {{-- href="{{ url ('login') }}"  --}}
                        <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#RegistrationModal">Register</a></li>
                        {{-- href="{{ url ('register') }}"  --}}
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('userprofile.show',Auth::user()->id)}}">My Account</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('logout') }}">Log Out</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="post">
                    @csrf
                </form>
                @endguest

                
   
            </ul>
        </nav>
    </div>
</div>
{{-- header --}} 