
$(document).ready(function(){
  $('.adminselect2').select2();    
});

   
    function readURL(input){
      if (input.files && input.files[0]){
        var reader= new FileReader();
          reader.onload=function (e){
            $('#pro_image')
            .attr('src',e.target.result);
          };
        reader.readAsDataURL(input.files[0]);
      }
    }
    
   
    
CKEDITOR.replace('blo-details');
	
$(document).ready(function() {
  $('#admindatatables').DataTable({
      responsive: true
  });
}); 



    
    


    