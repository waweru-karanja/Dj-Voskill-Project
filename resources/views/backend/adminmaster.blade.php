<!DOCTYPE html>
<html lang="en">

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

  {{-- <link rel="stylesheet" href="{{ asset('dist/backend/css/vendor.bundle.base.css') }}"> --}}
  <link href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
 
  <!--     Fonts and icons     -->
   {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> --}}
   <link href="{{ asset('dist/backend/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" />

  <!-- CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="{{ asset('dist/backend/assets/css/vendor.bundle.base.css') }}" rel="stylesheet" />
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('dist/backend/css/style.css') }}"/>

  <!--  Datatables  -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  

  <!--  extension responsive  -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

  <!-- endinject -->
  <link rel="icon" type="image/png" href="{{ asset('dist/backend/adminimages/DjVoskillLogo.jpg') }}">


  
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
  {{-- <script src="{{ asset ('dist/backend/js/vendor.bundle.base.js') }}"></script> --}}
  <!-- endinject -->
  
  <!-- inject:js -->
  <script src="{{ asset('dist/backend/js/off-canvas.js') }}"></script>
  <script src="{{ asset('dist/backend/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('dist/backend/js/template.js') }}"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  

  {{-- <script src="{{ asset('dist/backend/js/core/popper.min.js')}}"></script> --}}
  {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="{{ asset('dist/backend/js/core/bootstrap.min.js')}}"></script> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <!-- endinject -->
  
  {{-- ck-editor --}}
  <script src="{{ asset('dist/backend/ckeditor/ckeditor.js') }}"></script>

  <!-- Custom js for this page-->
  <script src="{{ asset('dist/backend/js/dashboard.js') }}"></script>
  <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>
  <script src="{{asset('assets/js/mycustom.js')}}"></script>
  
  {{-- // datatables --}}
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script> 

<!-- extension responsive -->
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
@section('scripts')
<script>
    $(document).ready(function() {
        $('#admindatatables').DataTable({
            responsive: true
        });
    } ); 	

</script>
    
  
</body>
</html>

