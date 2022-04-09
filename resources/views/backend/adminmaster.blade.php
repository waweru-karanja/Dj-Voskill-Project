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

  {{-- Datepicker --}}
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!--  Datatables  -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  

  <!--  extension responsive  -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

  <!--  Switch buttons  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"/>

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
  
  <!-- inject:js -->
  <script src="{{ asset('dist/backend/js/off-canvas.js') }}"></script>
  <script src="{{ asset('dist/backend/js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('dist/backend/js/template.js') }}"></script>
  
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <!-- endinject -->

  {{-- datepicker --}}
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  {{-- ck-editor --}}
  <script src="{{ asset('dist/backend/ckeditor/ckeditor.js') }}"></script>

  <!-- Custom js for this page-->
  <script src="{{ asset('dist/backend/js/dashboard.js') }}"></script>
  <script src="{{ asset('node_modules/select2/dist/js/select2.min.js') }}"></script>
  <script src="{{asset('assets/js/mycustom.js')}}"></script>

  {{-- Switch cdns --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
  
  {{-- // datatables --}}
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script> 

<!-- extension responsive -->
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
@section('scripts')
<script>
    $(document).ready(function() {
        $('#admindatatables').DataTable({
            responsive: true
        });
    } ); 	

    $(document).ready(function(){
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div ><div style="height:10px;"></div><input type="text" name="productattr_size[]" style="width:120px" placeholder="productattr_size"/>&nbsp;<input type="text" name="productattr_price[]" style="width:120px" placeholder="productattr_price"/>&nbsp;<input type="text" name="productattr_stock[]" style="width:120px" placeholder="productattr_stock"/>&nbsp;<input type="text" name="productattr_sku[]" style="width:120px" placeholder="productattr_sku"/>&nbsp;<a href="javascript:void(0);" class="remove_button">Remove</a></div>';
                        //New input field html 

        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });

    $(".updateattributestatus").click(function(){
      var status=$(this).text();
      var attribute_id=$(this).attr("attribute_id");
      $.ajax({
        type:'post',
        url:'admin/updateattributestatus',
        data:{status:status,attribute_id:attribute_id},
        success:function(resp){
          if(resp['productattr_status']==0){
            $("#attribute-"+attribute_id).html("Inactive")
          }else if(resp['productattr_status']==1){
            $("#attribute-"+attribute_id).html("Active")
          }
        } ,error:function(){
          alert("Error");
        }
      });
    });

    // change shipping status to active or inactive
    $(function(){
      $('.toggle-class').change(function(){
          var status=$(this).prop('checked')==true? 1:0;
          var shipping_id=$(this).data('id');
          $.ajax({
              type:"GET",
              dataType:"json",
              url:'{{ route('updateshippingstatus') }}',
              data:{'status':status,'shipping_id':shipping_id},
              success:function(data){
                  $('#notific').fadein();
                  $('#notific').css('background','green');
                  $('#notific').text('status changed Successfully');
                  setTimeout(() => {
                    $('#notific').fadeout();
                  }, 3000);
              }
          });
      });
    });


    $(document).ready(function(){
      $("#manualcoupon").click(function(){
        $("#coupon_field").show();
      });

      $("#automaticcoupon").click(function(){
        $("#coupon_field").hide();
      });
    });


    $(document).ready(function(){
      $('.couponselect2').select2();    
    });

    $(document).ready(function(){
      $('.usersselect2').select2();    
    });

    $(function(){
      $("#expiry_date").datepicker();
    });
</script>
    
  
</body>
</html>

