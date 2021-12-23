
$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
    // change price based on the attribute
    $('#getprice').change(function(){
        var productattr_size=$(this).val();
        if(productattr_size==""){
            alert("Please Select Size");
            return false;
        }
        var product_id=$(this).attr("product-id");
        
        $.ajax({
            url:'/getproductprice',
            data:{productattr_size:productattr_size,product_id:product_id},
            type:'POST',
            success: function(resp){
                console.log(resp);
 

                if( resp['final_price'] !=null){
                
                    $(".getattrCalculatedPrice").html(`sh:${  resp['final_price']}`);
                }
                if( resp['merch_price']!=null){
                
                    $(".merch_price").html(`sh:${  resp['merch_price']}`);
                }
                
            }
                ,error: function(error){
                    console.error(error)
                }
            
        });
    });

});

$('.show_confirm').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Are you sure you want to delete this item?`,
        text: "This will delete the cart from the basket.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
        form.submit();
    }
    });
});


// update items in the cart page
$(document).on('click','.itemupdate',function(){
    if($(this).hasClass('qtyminus')){
        var quantity=$(this).next().val();
        // console.log("the quantity is ",quantity);
        new_qty=parseInt(quantity)-1;
        if(quantity<=1){
            alert("item must be greater or equal to 1");
            return false;
        }else{
            new_qty=parseInt(quantity)-1;
        }
    }

    if($(this).hasClass('qtyplus')){
        // console.log($(this).prev());
        var quantity=$(this).prev().val();
        new_qty=parseInt(quantity)+1;
    }

    var cartid=$(this).data('cartid');
    $.ajax({
        data:{"cartid":cartid,"quantity":new_qty},
        url:'/updatecartitemquantity',
        type:'post',
        success:function(resp){
            $("#appendcartitems").html(resp.view);
        },error:function(){
            alert("error");
        }
    })
})

// select Dynamic dropdown for the shipping counties
$(document).on('change','.county',function(){
    var cnty_id=$(this).val();
    var div=$(this).parent();
    $.ajax({
        type:'get',
        url:'getshippingprice',
        data:{'id':cnty_id},
        success:function(data){

            console.log(data);
            $('.town').html('<option disabled selected value=" ">Select Your City</option>');
            
            console.log("the data is ",data);
            data.forEach((town)=>{
                console.log(town);
                $('.town').append('<option value="'+town.id+'">'+town.town+'</option>');
            });
            
        },error:function(){

        }
    });
});


// show the price based on the town
$(document).on('change','.town',function(){
    var tow_id=$(this).val();
    // var a=$(this).parent();
    
    
    $.ajax({
        type:'get',
        url:'displayshippingprice',
        data:{'id':tow_id},
        dataType:'json',
        success:function(data){
            console.log(data);
            console.log(data.pickuppoint); 
            $('.total_amount').val(data.shipping_charges);
            $('.pickup_point').val(data.pickuppoint);
            $('.shipping_amount').html(data.shipping_charges);
        },
        error:function(){

        }
    });
});

