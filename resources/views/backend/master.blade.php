 <!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="{{ asset('dist/admin/adminimages/DjVoskillLogo.jpg') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title','master page')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="{{ asset('dist/admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('dist/admin/assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet" />
  <link href="{{ asset('dist/admin/assets/css/mycustom.css') }}" rel="stylesheet" />
  
</head>

<body class="">
    <div class="wrapper " style="background:orange;">
        <div class="sidebar" data-color="blue">
            <!--
                Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
            -->
            <div class="logo">
                <a href="{{ route('dashboard') }}" class="simple-text logo-normal">
                <img src="{{ asset('dist/admin/adminimages/DjVoskillLogo.jpg') }}">
                </a>
            </div>
            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ 'dashboard' == request ()->path() ? 'active': ''}}">
                        <a href="{{ route('dashboard') }}">
                        <i class="now-ui-icons design_app"></i>
                        <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="{{ 'dashboard' == request ()->path() ? 'active': ''}}">
                        <a href="{{ route('dashboard') }}">
                        <i class="now-ui-icons design_app"></i>
                        <p>Admins</p>
                        </a>
                    </li>
                    <li class="{{ 'dashboard' == request ()->path() ? 'active': ''}}">
                        <a href="{{ url('admin/settings') }}">
                        <i class="now-ui-icons design_app"></i>
                        <p>Admin Settings</p>
                        </a>
                    </li>
                    <h4>Merchadise</h4>
                    <li class="{{ 'admin/products/create' == request ()->path() ? 'active': ''}}">
                        {{-- <a href="{{route('products.create')}}"> --}}
                            <i class="now-ui-icons education_atom"></i>
                            <p>Add Product</p>
                        </a>
                    </li>
                    <li class="{{ 'admin/products' == request ()->path() ? 'active': ''}}">
                        {{-- <a href="{{route('products.index') }}"> --}}
                        <i class="now-ui-icons location_map-big"></i>
                        <p>List Products</p>
                        </a>
                    </li>
                    <h4>Blog</h4>
                    <li class="{{ 'admin/blogs/create' == request ()->path() ? 'active': ''}}">
                        <a href="{{ url('admin/blogpost/create') }}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>Add Blog</p>
                        </a>
                    </li>
                    <li class="{{ 'admin/blogs' == request ()->path() ? 'active': ''}}">
                        <a href="{{ url('admin/blogpost') }}">
                        <i class="now-ui-icons location_map-big"></i>
                        <p>List Blogs</p>
                        </a>
                    </li>
                    <li>
                    <li class="{{ 'admin/blogs/create' == request ()->path() ? 'active': ''}}">
                        <a href="{{ url('admin/blogcategory') }}">
                        <i class="now-ui-icons ui-1_bell-54"></i>
                        <p>Blog categories</p>
                        </a>
                    </li>
                    <h4 class="admintitles">Events</h4>
                    <li class="{{ 'admin/events/create' == request ()->path() ? 'active': ''}}">
                        <a href="{{ route('events.create')}}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>Add an Event</p>
                        </a>
                    </li>
                    <li class="{{ 'admin/events' == request ()->path() ? 'active': ''}}">
                        <a href="{{route('events.store')}}">
                        <i class="now-ui-icons location_map-big"></i>
                        <p>List Events</p>
                        </a>
                    </li>
                    <h4>Audio Mixxes</h4>
                    <li class="{{ 'admin/mixxes/create' == request ()->path() ? 'active': ''}}">
                        <a href="{{route('mixxes.create') }}">
                        <i class="now-ui-icons education_atom"></i>
                        <p>Add A Mix</p>
                        </a>
                    </li>
                    <li class="{{ 'admin/mixxes' == request ()->path() ? 'active': ''}}">
                        <a href="{{route('mixxes.index') }}">
                        <i class="now-ui-icons location_map-big"></i>
                        <p>All Audio Mixtapes</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute" style="border:2px solid black;">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Dashboard</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="now-ui-icons ui-1_zoom-bold"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                <i class="now-ui-icons media-2_sound-wave"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Stats</span>
                                </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="now-ui-icons location_world"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Some Actions</span>
                                </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                <i class="now-ui-icons users_single-02"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Account</span>
                                </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content" style="border:2px solid yellow; margin-top:65px;">
                @yield('content')
            
            </div>
        </div>
    </div>
  <!--   Core JS Files   -->
  <script src="{{asset('dist/admin/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('dist/admin/assets/js/mycustom.js')}}"></script>
  <script src="{{asset('dist/admin/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('dist/admin/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('dist/admin/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('dist/admin/assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('dist/admin/assets/js/now-ui-dashboard.min.js')}}" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('dist/admin/assets/demo/demo.js')}}"></script>
  
</body>

</html> --}}