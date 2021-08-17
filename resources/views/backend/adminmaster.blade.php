<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.bootstrapdash.com/demo/majestic-free/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 11 May 2021 12:14:53 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    @yield('title','Admin Layout')
  </title>
  <!-- plugins:css -->
  {{-- <link rel="stylesheet" href="{{ asset('dist/backend/css/materialdesignicons.min.css') }}"> --}}

  <link rel="stylesheet" href="{{ asset('dist/backend/vendors/mdi/css/materialdesignicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('dist/backend/css/vendor.bundle.base.css') }}">
  <link href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
 
  <!--     Fonts and icons     -->
   <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
   <link href="{{ asset('dist/backend/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="{{ asset('dist/backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('dist/backend/css/style.css') }}">

  {{-- datatables --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css">




  <!-- endinject -->
  <link rel="icon" type="image/png" href="{{ asset('dist/backend/adminimages/DjVoskillLogo.jpg') }}">

   <!--     Trix Editor     -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" rel="stylesheet" />


  
</head>
<body>
  <div class="container-scroller">
    @include('backend.adminnavbar')
    <div class="container-fluid page-body-wrapper">
      @include('backend.adminsidebar')
      <div class="main-panel">
        @yield('content')
        <div class="content-wrapper">
            
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset ('dist/backend/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  
  <!-- inject:js -->
  <script src="{{ asset('dist/backend/js/off-canvas.js') }}"></script>
  <script src="{{ asset('dist/backend/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('dist/backend/js/template.js') }}"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  

  <script src="{{ asset('dist/backend/js/core/popper.min.js')}}"></script>
  <script src="{{ asset('dist/backend/js/core/bootstrap.min.js')}}"></script>
  <!-- endinject -->

  {{-- datatables --}}
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap.min.js"></script>
  
  <!-- Custom js for this page-->
  <script src="{{ asset('dist/backend/js/dashboard.js') }}"></script>
  <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>
  <script src="{{asset('assets/js/mycustom.js')}}"></script>
  <script src="{{asset('assets/js/tinymce.min.js')}}"></script>

  
</body>
</html>
