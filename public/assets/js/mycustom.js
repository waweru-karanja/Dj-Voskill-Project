$(document).ready(function(){
  $('.blogtags').select2();
  data=[];
  data=<?php echo json_encode($tags_ids);
        ?>;
  $('.blogtags').val(data);
  $('.blogtags').trigger('change');
});

// $(document).ready(function(){
//   $('#selected-tags').change(function(){
//     var value=$(this) .val();
//     $('#selected-tags').val(value);
//     $('#selected-tags').select2().trigger('change');
//   });
// });


// @php
//    $tag_ids=[];
// @endphp

// @foreach($data->blogtags as $blogtag);
//     @php
//         array_push($tag_ids,$blogtag->id);
//     @endphp
// @endforeach


    
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
    
   
    $(document).ready( function () {
    $('#admindatatables').DataTable()
} );
    
    
    


    