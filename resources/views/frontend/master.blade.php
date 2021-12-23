<!doctype html>
<html lang="en">   

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Dj Voskill The Muzikal Genious">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">


                    {{-- favicon --}}
    <link rel="icon" type="image/JPG" href="{{ asset('dist/frontend/images/DjVoskillLogo.jpg') }}">
		
                    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('dist/frontend/assets/css/demostyles.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/frontend/assets/css/navstyle.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/frontend/assets/css/customstyle.css') }}">
    {{-- <s --}}
                    {{-- BOOTSTRAP SELECT --}}
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" >
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.6/mediaelementplayer.css">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  

    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
</head>
    <body class="animate fadeIn four">
        
        <!-- header-start -->
		    @include('frontend.nav')
        <!-- header-start -->
        <div class="container">

           @yield('content')
            
        </div>

        <!-- footer-area-start -->
            @include('frontend.footer')
        <!-- footer-area-end -->

         @yield('xtra-js')
        
        {{-- Bootstrap Modals Forms --}}

        <!-- ------- REGISTRATION ------- -->
        <div class="modal fade" id="RegistrationModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Title -->
                        <div class="form-heading text-center">
                            <div class="title">Registration</div>
                            <p class="title-description">Already have an account? <a href="#" data-toggle="modal" data-target="#LogInModal" data-dismiss="modal">Sign in.</a></p>
                            
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Name -->
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" type="text" name="name" :value="old('name')" required autofocus  /> 
                                </div>
                            </div>
                            
                            <!-- Email Address -->
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" name="email" :value="old('email')" required /> 
                                </div>
                            </div>
                                  
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="current_page" value="{{Request::getRequestUri()}}">
                                </div>
                            </div>
                            
                            <!-- Password -->
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                                </div>
                            </div>

                            <!--confirm Password -->
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" id="password_confirmation"
                                    type="password"
                                    name="password_confirmation" required/>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-md btn-danger" type="submit">Create Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------- REGISTRATION Ends ------- -->

        <!-- ------- LOGIN ------- -->
        <div class="modal fade" id="LogInModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                
                            <!-- Form Title -->
                            <div class="form-heading text-center">
                                <div class="title">Sign In</div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" placeholder="email" required type="email" name="email" :value="old('email')"/> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="current_page" value="{{Request::getRequestUri()}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <input id="myInput"
                                    type="password" name="password" required autocomplete="current-password" />
                                    <input type="checkbox" onclick="myFunction()">Show Password
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="checkbox" />
                                    <label>Remember Me</label>
                                </div>
                                <div class="col-md-5 col-md-offset-1">
                                    <label><a href="#" data-toggle="modal" data-target="#ForgotModal" data-dismiss="modal">Forget Password?</a></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-md btn-danger">Sign In</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------- LOGIN Ends ------- -->

        <!-- ------- FORGOT FORM ------- -->
        <div class="modal fade" id="ForgotModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <form>
                        <!-- Form Title -->
                            <div class="form-heading text-center">
                                <div class="title">Forgot Password?</div>
                                <p class="title-description">We'll email you a link to reset it.</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" required placeholder="Your E-mail Address" /> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-md btn-danger">Send Mail</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------- FORGOT FORM ends ------- --> 

        <!-- ------- COUPON MODAL------- -->
        <div class="modal fade" id="showcoupon" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="#">
                            <p class="checkout-coupon">
                                <input type="text" placeholder="Coupon Code" />
                                <button class="btn theme-btn" type="submit">Apply Coupon</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ------- COUPON MODAL ENDS ------- -->

        
{{-- bootstrap jquery --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script> --}}

{{-- // Go to www.addthis.com/dashboard to customize your tools --}}
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-608158671db44c40"></script>

<script type="text/javascript" src="{{ asset('dist/frontend/assets/js/demoscripts.js')}}"></script>


{{-- sweetalert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>


{{-- // JS Library by CXDI --}}

<script src="https://cdn.jsdelivr.net/gh/CDNSFree/mediaelement@latest/mediaelement.js"></script>

{{-- // datatables --}}
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script> 

<!-- extension responsive -->
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

@section('scripts')
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    $(document).ready(function() {
        $('#frontendmix').DataTable({
            responsive: true
        });
    } ); 	

    $(document).ready(function(){
        $(".dropdown").hover(function(){
            var dropdownMenu = $(this).children(".dropdown-menu");
            if(dropdownMenu.is(":visible")){
                dropdownMenu.parent().toggleClass("open");
            }
        });
    });

    $(function(){
      var navbar = $('.header-inner');
      $(window).scroll(function(){
        if($(window).scrollTop() <=40){
          navbar.removeClass('navbar-scroll');
        }else{
          navbar.addClass('navbar-scroll');
        }
      });
    });
</script>
    



    </body>


</html>
