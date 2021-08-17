<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.codevibrant.com/html/kavya/archive-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Mar 2021 09:30:37 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Favicon -->
    <link rel="icon" type="image/JPG" sizes="48x48" href="{{ asset('dist/frontend/images/DjVoskillLogo.jpg') }}">
	

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600&amp;display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <!-- Fontawesome CSS-->
    <link rel="stylesheet" href="assets/css/all.css" />

    <!-- slick css -->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/preloader.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}" />

    <title>Voskill Frontend</title>
</head>

<body>
    <div class="preloader-wrapper">
        <div class="preloader">
            <div class="preloader-circle" id="status">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- Preloader end -->

    <main class="kavya-archive">
        <!-- Header -->
        <header>
            <!-- Top header -->
            <div class="top-header">
                <div class="container">
                    <div class="row  align-items-center">
                        <div class="col-md-3">
                            <div class="social-links">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="brand-name text-center">
                                <a href="index.html">
                                    <h1>Voskill</h1>
                                    <span>The Muzikal Murder</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="search-wrapper">
                                <div class="search-icon">
                                    <button class="open-search-btn"><i class="fa fa-search"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Top header end -->
            <form onsubmit="event.preventDefault()" class="form-inline my-2 my-lg-0"> <input class="form-control mr-sm-2" type="text" placeholder="Search"> <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button> </form>
            <!-- Navbar  -->
            <div class="kavya-navbar" id="sticky-top">
                <div class="container">
                    <nav class="nav-menu-wrapper ">
                        <span class="navbar-toggle" id="navbar-toggle">
                            <i class="fas fa-bars"></i>
                        </span>
                        <div class="sticky-logo">
                            <a href="index.html">
                                <img class="logo-mobile" src="images/logo-mobile.png">
                            </a>
                        </div>
                        <ul class="nav-menu ml-auto mr-auto" id="nav-menu-toggle">
                            <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Categories <span class="arrow-icon"> <span
                                            class="left-bar"></span>
                                        <span class="right-bar"></span></span>
                                </a>
                                <ul class="drop-menu">
                                    <li class="drop-menu-item"><a href="archive-right-sidebar.html">Food</a></li>
                                    <li class="drop-menu-item"><a href="archive-right-sidebar.html">Technology</a></li>
                                    
                                </ul>
                            </li>
                            <li class="nav-item drop-arrow">
                                <a href="#" class="nav-link">Pages
                                    <span class="arrow-icon">
                                        <span class="left-bar"></span>
                                        <span class="right-bar"></span>
                                    </span>
                                </a>
                                <ul class="drop-menu">
                                    <li class="drop-menu-item"><a href="index.html">Home Page 1</a></li>
                                    <li class="drop-menu-item"><a href="index2.html">Home Page 2</a></li>
                                </ul>
                            </li>
                            
                            <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                            <!-- <a class="hide-toggle" id="hide-toggle"><i class="fas fa-arrow-up"></i></a> -->
                            <ul class="float-right">
                                <li class="nav-item">
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
                                        <li><a class="dropdown-item" href="{{ url ('login') }}">Log In</a></li>
                                        <li><a class="dropdown-item" href="{{ url ('register') }}">Create An Account</a></li>
                                    </ul>
                                </li>
                                @else
                                <li class="nav-item nav-profile dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                                        <img src="/usersimages/{{ Auth::user()->avatar }}" alt="profile"/>
                                        <span class="nav-profile-name">{{ Auth::user()->name }}</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                        <a href="{{ route('userprofile.show',Auth::user()->id)}}">My Account</a>
                                        <a href="{{ url('logout') }}">Log Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="post">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                                
                            </ul>
                        </ul>
                        <div class="sticky-search">
                            <div class="search-wrapper">
                                <div class="search-icon">
                                    <button class="open-search-btn"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Navbar end -->
        </header>
        <!-- header end -->

        <!-- Page header -->
        <section class="page-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class=" col-md-6">
                        <div class="page-title">
                            <h2>Travel</h2>
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Travel</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page header end -->

        <!-- Archive content -->
        <section class="archive-content">
            <div class="container">
                <div class="row " id="main-content">
                    <div class="col-md-7 col-lg-8 content">
                        <!-- Archive posts -->
                        <div class="archive-posts theiaStickySidebar">
                            <div class="card border-0 mb-5">
                                <div class="row no-gutters align-items-center align-items-center">
                                    <div class="col-md-5">
                                        <a href="#"> <img src="assets/images/town-street.jpg" class="card-img"
                                                alt=""></a>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <ul class="category-tag-list">
                                                <li class="category-tag-name">
                                                    <a href="#">Travel</a>
                                                </li>

                                            </ul>
                                            <h5 class="card-title title-font"><a href="#">Top 10 tourist destinations of
                                                    the world</a></h5>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Quis ipsum rem, delectus
                                                deserunt consectetur saepe? Expedita sapiente rerum nostrum fuga non
                                                iure minima sunt inventore.<p>

                                                    <div class="author-date">
                                                        <a class="author" href="#">
                                                            <img src="assets/images/writer.jpg" alt=""
                                                                class="rounded-circle" />
                                                            <span class="writer-name-small">Julie</span>
                                                        </a>
                                                        <a class="date" href="#">
                                                            <span>21 Dec, 2019</span>
                                                        </a>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 mb-5">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-5">
                                        <a href="#"> <img src="assets/images/coach.jpg" class="card-img" alt=""></a>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <ul class="category-tag-list">
                                                <li class="category-tag-name">
                                                    <a href="#">Lifestyle</a>
                                                </li>

                                            </ul>
                                            <h5 class="card-title title-font"><a href="#">Old yet beautiful things</a>
                                            </h5>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Quis ipsum rem, delectus
                                                deserunt consectetur saepe? Expedita sapiente rerum nostrum fuga non
                                                iure minima sunt inventore.<p>
                                                    <div class="author-date">
                                                        <a class="author" href="#">
                                                            <img src="assets/images/writer.jpg" alt=""
                                                                class="rounded-circle" />
                                                            <span class="writer-name-small">Julie</span>
                                                        </a>
                                                        <a class="date" href="#">
                                                            <span>21 Dec, 2019</span>
                                                        </a>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 mb-5">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-5">
                                        <a href="#"> <img src="assets/images/shoes.jpg" class="card-img" alt=""></a>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <ul class="category-tag-list">
                                                <li class="category-tag-name">
                                                    <a href="#">Lifestyle</a>
                                                </li>

                                            </ul>
                                            <h5 class="card-title title-font"><a href="#">I want to leave my footprints
                                                    all over the world</a></h5>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Quis ipsum rem, delectus
                                                deserunt consectetur saepe? Expedita sapiente rerum nostrum fuga non
                                                iure minima sunt inventore.<p>
                                                    <div class="author-date">
                                                        <a class="author" href="#">
                                                            <img src="assets/images/writer.jpg" alt=""
                                                                class="rounded-circle" />
                                                            <span class="writer-name-small">Julie</span>
                                                        </a>
                                                        <a class="date" href="#">
                                                            <span>21 Dec, 2019</span>
                                                        </a>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 mb-5">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-5">
                                        <a href="#"> <img src="assets/images/holidays.jpg" class="card-img" alt=""></a>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <ul class="category-tag-list">
                                                <li class="category-tag-name">
                                                    <a href="#">Lifestyle</a>
                                                </li>

                                            </ul>
                                            <h5 class="card-title title-font"><a href="#">How to make most out of
                                                    vaccation</a></h5>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Quis ipsum rem, delectus
                                                deserunt consectetur saepe? Expedita sapiente rerum nostrum fuga non
                                                iure minima sunt inventore.<p>
                                                    <div class="author-date">
                                                        <a class="author" href="#">
                                                            <img src="assets/images/writer.jpg" alt=""
                                                                class="rounded-circle" />
                                                            <span class="writer-name-small">Julie</span>
                                                        </a>
                                                        <a class="date" href="#">
                                                            <span>21 Dec, 2019</span>
                                                        </a>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 mb-5">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-5">
                                        <a href="#"> <img src="assets/images/lighthouse.jpg" class="card-img"
                                                alt=""></a>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <ul class="category-tag-list">
                                                <li class="category-tag-name">
                                                    <a href="#">Travel</a>
                                                </li>

                                            </ul>
                                            <h5 class="card-title title-font"><a href="#">7 things you don't know about
                                                    Light house</a></h5>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Quis ipsum rem, delectus
                                                deserunt consectetur saepe? Expedita sapiente rerum nostrum fuga non
                                                iure minima sunt inventore.<p>
                                                    <div class="author-date">
                                                        <a class="author" href="#">
                                                            <img src="assets/images/writer.jpg" alt=""
                                                                class="rounded-circle" />
                                                            <span class="writer-name-small">Julie</span>
                                                        </a>
                                                        <a class="date" href="#">
                                                            <span>21 Dec, 2019</span>
                                                        </a>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 mb-5">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-md-5">
                                        <a href="#"> <img src="assets/images/blonde-girl.jpg" class="card-img"
                                                alt=""></a>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <ul class="category-tag-list">
                                                <li class="category-tag-name">
                                                    <a href="#">Travel</a>
                                                </li>

                                            </ul>
                                            <h5 class="card-title title-font"><a href="#">Why alone time is a must for
                                                    you</a></h5>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Quis ipsum rem, delectus
                                                deserunt consectetur saepe? Expedita sapiente rerum nostrum fuga non
                                                iure minima sunt inventore.<p>
                                                    <div class="author-date">
                                                        <a class="author" href="#">
                                                            <img src="assets/images/writer.jpg" alt=""
                                                                class="rounded-circle" />
                                                            <span class="writer-name-small">Julie</span>
                                                        </a>
                                                        <a class="date" href="#">
                                                            <span>21 Dec, 2019</span>
                                                        </a>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 mb-5">
                                <div class="row no-gutters align-items-center align-items-center">
                                    <div class="col-md-5">
                                        <a href="#"> <img src="assets/images/town-street.jpg" class="card-img"
                                                alt=""></a>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body">
                                            <ul class="category-tag-list">
                                                <li class="category-tag-name">
                                                    <a href="#">Travel</a>
                                                </li>

                                            </ul>
                                            <h5 class="card-title title-font"><a href="#">Top 10 tourist destinations of
                                                    the world</a></h5>
                                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                elit. Quis ipsum rem, delectus
                                                deserunt consectetur saepe? Expedita sapiente rerum nostrum fuga non
                                                iure minima sunt inventore.<p>

                                                    <div class="author-date">
                                                        <a class="author" href="#">
                                                            <img src="assets/images/writer.jpg" alt=""
                                                                class="rounded-circle" />
                                                            <span class="writer-name-small">Julie</span>
                                                        </a>
                                                        <a class="date" href="#">
                                                            <span>21 Dec, 2019</span>
                                                        </a>
                                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Archive posts end -->
                    </div>
                    <div class="col-md-5 col-lg-4 sidebar">
                        <!-- Sidebar posts -->
                        <div id="sticker" class="theiaStickySidebar">
                            <div class="sidebar-posts">
                                <div class="sidebar-title">
                                    <h5><i class="fas fa-circle"></i>Popular Posts</h5>
                                </div>
                                <div class="sidebar-content p-0">
                                    <div class="card border-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-3 col-md-3">
                                                <a href="#">
                                                    <img src="assets/images/sea-lighthouse.jpg" class="card-img" alt="">
                                                </a>
                                            </div>
                                            <div class="col-9 col-md-9">
                                                <div class="card-body">
                                                    <ul class="category-tag-list mb-0">
                                                        <li class="category-tag-name">
                                                            <a href="#">Lifestyle</a>
                                                        </li>
                                                    </ul>
                                                    <h5 class="card-title title-font"><a href="#">Lighthouse since
                                                            ages</a>
                                                    </h5>
                                                    <div class="author-date">
                                                        <a class="date" href="#">
                                                            <span>21 Dec, 2019</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card border-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-3 col-md-3">
                                                <a href="#">
                                                    <img src="assets/images/paris.jpg" class="card-img" alt="">
                                                </a>
                                            </div>
                                            <div class="col-9 col-md-9">
                                                <div class="card-body">
                                                    <ul class="category-tag-list mb-0">
                                                        <li class="category-tag-name">
                                                            <a href="#">Lifestyle</a>
                                                        </li>
                                                    </ul>
                                                    <h5 class="card-title title-font"><a href="#">5 things you should
                                                            not miss about Paris</a>
                                                    </h5>
                                                    <div class="author-date">
                                                        <a class="date" href="#">
                                                            <span>21 Dec, 2019</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card border-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-3 col-md-3">
                                                <a href="#">
                                                    <img src="assets/images/orange-bus.jpg" class="card-img" alt="">
                                                </a>
                                            </div>
                                            <div class="col-9 col-md-9">
                                                <div class="card-body">
                                                    <ul class="category-tag-list mb-0">
                                                        <li class="category-tag-name">
                                                            <a href="#">Lifestyle</a>
                                                        </li>
                                                    </ul>
                                                    <h5 class="card-title title-font"><a href="#">5 reasons for
                                                            travelling more</a>
                                                    </h5>
                                                    <div class="author-date">
                                                        <a class="date" href="#">
                                                            <span>21 Dec, 2019</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card border-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-3 col-md-3">
                                                <a href="#">
                                                    <img src="assets/images/city-pink.jpg" class="card-img" alt="">

                                                </a>
                                            </div>
                                            <div class="col-9 col-md-9">
                                                <div class="card-body">
                                                    <ul class="category-tag-list mb-0">

                                                        <li class="category-tag-name">
                                                            <a href="#">Lifestyle</a>
                                                        </li>
                                                    </ul>
                                                    <h5 class="card-title title-font"><a href="#">Pink city</a>
                                                    </h5>
                                                    <div class="author-date">

                                                        <a class="date" href="#">
                                                            <span>21 Dec, 2019</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card border-0">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-3 col-md-3">
                                                <a href="#">
                                                    <img src="assets/images/umbrella.jpg" class="card-img" alt="">
                                                </a>
                                            </div>
                                            <div class="col-9 col-md-9">
                                                <div class="card-body">
                                                    <ul class="category-tag-list mb-0">

                                                        <li class="category-tag-name">
                                                            <a href="#">Lifestyle</a>
                                                        </li>
                                                    </ul>
                                                    <h5 class="card-title title-font"><a href="#">Top 10 tips with
                                                            common lifestyles</a>
                                                    </h5>
                                                    <div class="author-date">

                                                        <a class="date" href="#">
                                                            <span>21 Dec, 2019</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="popular-tags mt-4">
                                <div class="sidebar-title">
                                    <h5><i class="fas fa-circle"></i>Popular tags</h5>
                                </div>
                                <div class="sidebar-content">
                                    <ul class="sidebar-list tags-list">
                                        <li><a href="#">Food</a></li>
                                        <li><a href="#">Technology</a></li>
                                        <li><a href="#">UI/UX</a></li>
                                        <li><a href="#">Diet
                                            </a></li>
                                        <li><a href="#">Lovelife</a></li>
                                        <li><a href="#">Jobs</a></li>
                                        <li><a href="#">Popular</a></li>
                                        <li><a href="#">health</a></li>
                                        <li><a href="#">VisitNepal</a></li>
                                        <li><a href="#">travel</a></li>
                                        <li><a href="#">freelance</a></li>
                                        <li><a href="#">leadership</a></li>
                                        <li><a href="#">happiness</a></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="sidebar-posts mt-4">
                                <div class="sidebar-title">
                                    <h5><i class="fas fa-circle"></i>Archive</h5>
                                </div>
                                <div class="sidebar-content">
                                    <ul class="archive-date-list">
                                        <li><a href="#"><img src="assets/images/archive-icon.svg" alt=""> December
                                                2019</a></li>
                                        <li><a href="#"><img src="assets/images/archive-icon.svg" alt=""> November
                                                2019</a></li>
                                        <li><a href="#"><img src="assets/images/archive-icon.svg" alt=""> October
                                                2019</a></li>
                                        <li><a href="#"><img src="assets/images/archive-icon.svg" alt=""> September
                                                2019</a></li>
                                        <li><a href="#"><img src="assets/images/archive-icon.svg" alt=""> August
                                                2019</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-posts mt-4">
                                <div class="sidebar-title">
                                    <h5><i class="fas fa-circle"></i>Categories</h5>
                                </div>
                                <div class="sidebar-content">
                                    <div class="category-name-list">
                                        <div class="card small-card">
                                            <a href="#"><img src="assets/images/shoes.jpg" class="card-img"
                                                    alt="" /></a>
                                            <div class="card-img-overlay">

                                                <h5 class="card-title title-font mb-0">
                                                    <a href="#">Travel</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="card small-card">
                                            <a href="#"><img src="assets/images/photography.jpg" class="card-img"
                                                    alt="" /></a>
                                            <div class="card-img-overlay">

                                                <h5 class="card-title title-font mb-0">
                                                    <a href="#">Photography</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="card small-card">
                                            <a href="#"><img src="assets/images/fashion.jpg" class="card-img"
                                                    alt="" /></a>
                                            <div class="card-img-overlay">

                                                <h5 class="card-title title-font mb-0">
                                                    <a href="#">Fashion</a>
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="card small-card">
                                            <a href="#"><img src="assets/images/tech.jpg" class="card-img" alt="" /></a>
                                            <div class="card-img-overlay">
                                                <h5 class="card-title title-font mb-0">
                                                    <a href="#">Technology</a>
                                                </h5>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar posts end -->
                    </div>
                </div>
            </div>
        </section>
        <!-- Archive content end -->
        <!-- Pagination section -->
        <section class="pagination-section">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-arrow-left"></i></a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-arrow-right"></i></a>
                    </li>
                </ul>
            </nav>
        </section>
        <!-- pagination section end -->
        <!-- Footer setion -->
        <footer class="footer-section" id="main-footer">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-logo">
                        <a href="index.html">
                            <h5 class="brand-name"> Kavya</h5>
                        </a>
                    </div>
                    <div class="footer-copyright">
                        <p>&copy;2019 Kavya. All rights reserved. Theme designed by <a href="#">CodeVibrant</a> </p>

                    </div>
                    <div class="social-links">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer section end -->

        <!-- Scroll to top -->
        <div id="stop" class="scroll-to-top">
            <span><a href="#"><i class="fas fa-arrow-up"></i></a></span>
        </div>
    </main>

    <!-- Javascript -->
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/ResizeSensor.min.js"></script>
    <script src="assets/js/theia-sticky-sidebar.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from demo.codevibrant.com/html/kavya/archive-right-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 22 Mar 2021 09:31:04 GMT -->
</html>