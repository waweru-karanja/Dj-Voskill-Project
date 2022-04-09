<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Town;
use App\Models\Events;
use App\Models\Blogtag;
use App\Models\Blogpost;
use App\Models\Merchadise;
use App\Models\Blogcategory;
use App\Models\Commentreply;
use App\Models\Mixxes_Model;
use App\Models\Postcomments;
use Illuminate\Http\Request;
use App\Models\Productimages;
use App\Models\Deliveryaddress;
use App\Models\Order;
use App\Models\shipping_charge;
use App\Models\payment_methods;
use App\Models\Productattribute;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;


class Home_Controller extends Controller
{
    public function homepage () {
        $events=Events::latest()->take(4)->get();
        $blog=Blogpost::latest()->take(4)->get();
        $mixxes=Mixxes_Model::latest()->paginate(5);
        return view('frontend.index',compact('mixxes','events','blog'));
    }

    public function audiomixtapes () {
        $events=Events::latest()->take(4)->get();
        $mixxes=Mixxes_Model::latest()->paginate(5);
        return view('frontend.mixtapes.audiomixtapes',compact('mixxes','events'));
    }

    public function download ($mix_audio)
    {   
        $mix = new Mixxes_Model;
        $filePath = public_path('mixtapes\\'.$mix_audio);
        return response()->file($filePath );
    }

    public function blog (){
        $events=Events::latest()->take(4)->get();
        $cats=Blogcategory::all();
        $recent_posts= Blogpost::latest()->limit(5)->get();
        $posttags=Blogtag::all();
        $posts=Blogpost::orderby('id','desc')->paginate(4);
        return view('frontend.blogs.blogs',['events'=>$events,'cats'=>$cats,'posts'=>$posts,'recent_posts'=>$recent_posts,'posttags'=>$posttags]);
    }
    public function events (){
        
        $events=Events::orderby('id','desc')->paginate(4);
        return view('frontend.events',['events'=>$events]);
    }
   
    public function merchadise (Request $request){
        if($request->ajax()){
            $start=$request->start;

            $end=$request->end;

            $products=Merchadise::where('merch_isactive',1)->
            where('merch_price','>=',$start)->
            where('merch_price','<=',$end)->
            orderby('merch_price','DESC')->get();
            response()->json($products);
            $events=Events::latest()->take(4)->get();
            return view('frontend.product.productsjson',compact('events','products'));
        }else{
            $events=Events::latest()->take(4)->get();
            $products=Merchadise::where('merch_isactive',1)->orderby('merch_price','ASC')->paginate(5);
            return view('frontend.product.product',compact('events','products'));
        }
    }

    public function singleproduct ($product_slug,$id){
        $products=Merchadise::find($id);
        $events=Events::latest()->take(4)->get();
        return view('frontend.product.singleproduct',compact('events','products'));
    }

    public function cart(){
        $events=Events::latest()->take(4)->get();
        $cartitems=Cart::usercartitems();
       
        return view('frontend.product.cart',compact('cartitems','events'));
    }

    public function addtocart(Request $request){
        
        if($request->isMethod('post')){
            $data=$request->all();

            
            // $getproductstock=Productattribute::where(['product_id'=>$data['product_id'],'productattr_size'=>$data['productattr_size']])->first()->toArray();
            // if( $getproductstock['productattr_stock']<$data['quantity']);
            // {
            //     $message="The Quantity isn't available at the moment";
            //     Session::flash('error_message',$message);
            //     return redirect()->back();
            // }

            
            $session_id=Session::get('session_id');
            if(empty($session_id)){
                $session_id=Session::getId();
                Session::put('session_id',$session_id);
            }

            // $countproducts=Cart::where([
            //     'product_id'=>$data['product_id'],
            //     'productattr_size'=>$data['productattr_size'],
            // ])->count();
            
            // if($countproducts>0){
            //     $message="The Product Already exists in the Cart";
            //     Session::flash('error_message',$message);
            //     return redirect()->back();
            // }

            if(Auth::check()){
                $user_id=Auth::user()->id;
            }else{
                $user_id=0;
            }

            $cart = new Cart();
            $cart->session_id = $session_id;
            $cart->product_id =$request->product_id;
            $cart->size = $request->productsize;
            $cart->user_id=$user_id;
            $cart->quantity = $data['quantity'];
            $cart->save();
            
            $message="The Product has been added to Cart";
                Session::flash('success_message',$message);
                return redirect('/mycart')->with('success_message','Product has been Added to cart');
        }
    }
    
    public function updatecartitem(Request $request){
        $shippingcharges=shipping_charge::where('is_shipping',1)->get();
        if($request->ajax()){
            $data=$request->all();

            
                    // get the available stock for the product that has been added for the request
            // $cartdetails=Cart::find($data['cartid']);
            // $availablestock=Productattribute::select('productattr_stock')->where
            //     (['product_id'=>$cartdetails['product_id'],'productattr_size'=>
            //     $cartdetails['productattr_size']])->first();

            // echo"<prev>";print_r($availablestock);die;

                    // check if the stock is available or not
            // if($data['quantity']>$availablestock['productattr_stock']){
            //     $usercartitems=Cart::usercartitems();
            //     return response()->json([
            //         'status'=>false,
            //         'message'=>'product stock is not available',
            //         'view'=>(string)view::make('frontend.product.cartitems')->with(compact('usercartitems'))
            //     ]);
            // }

                    // check if the product size is active or not
            // $availablesize=Productattribute::where(['product_id'=>$cartdetails['product_id'],'productattr_size'=>$cartdetails['productattr_size'],'productattr_status'=>1])->count();
            // if($availablesize==0){
            //     $usercartitems=Cart::usercartitems();
            //     return response()->json([
            //         'status'=>false,
            //         'message'=>'product size is not available',
            //         'view'=>(string)view::make('frontend.product.cartitems')->with(compact('usercartitems'))
            //     ]);
            // }
                    // increment/decrement cart quantity items
            Cart::where('id',$data['cartid'])->update(['quantity'=>$data['quantity']]);
            $cartitems=Cart::usercartitems();
            return response()->json
                (['view'=>(string)view::make('frontend.product.cartitems')->with(compact('cartitems','shippingcharges'))
        ]);
        }
    }

    public function deletecartitem($id)
    {
        Cart::find($id)->delete();
  
        return back();
    }

    public function getproductprice(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();

            $getdiscountedattrprice=Merchadise::getdiscountedattrprice($data['product_id'],$data['productattr_size']);
            // echo"<pre>";print_r($getdiscountedattrprice);die;
            return  $getdiscountedattrprice;
            

        }
    }

    // dynamic dropdown
    public function getshippingprice(Request $request){
        $data=Town::select('town','id')->where('county_id',$request->id)->take(150)->get();
        return response()->json($data);
    }

    // select the price based on the price
    public function displayshippingprice(Request $request){
        $shipprice=Town::select('shipping_charges','pickuppoint')->where('id',$request->id)->first();
        return response()->json($shipprice);
    }

    public function checkout(){
        $events=Events::latest()->take(4)->get();
        $delivaddresses=shipping_charge::all();
        $userid=Auth::user()->id;
        $addresses=Deliveryaddress::where('user_id',$userid)->first();
        $payment_methods=payment_methods::where('status',1)->get();
        $usercartitems=Cart::usercartitems();
        $deliveriesdata=Deliveryaddress::deliveryaddresses();
        
            // foreach($deliveriesdata as $key=>$value)
            // {
            //     $shippingcharges=Town::getshippingcharges($value['town']);
            //     $deliveriesdata[$key]['shipping_charges']=$shippingcharges;
            // }
        $total_price=0;
        foreach($usercartitems as $item)
        {
            $attributprice=Merchadise::getdiscountedattrprice($item['product_id'],$item['productattribute_size']);
           
            $total_price=$total_price+($attributprice['final_price']*$item['quantity']);
            // dd($total_price);die();
        }
        
        return view('frontend.product.checkout')->with(compact('events','payment_methods','userid','deliveriesdata','delivaddresses','addresses','usercartitems'));
    }
    
    public function addtoorder(Request $request){
        $userid=Auth::user()->id;
        $addresses=Deliveryaddress::where('user_id',$userid)->first();

        if($request->isMethod('post')){
            $data=$request->all();

            $order = new Order();
            $order->name = Auth::user()->name;
            $order->phone =$addresses->phone;
            $order->email =Auth::user()->email;
            $order->county =$addresses->shipcharges->county;
            $order->town =$addresses->towns->town;
            $order->coupon_code = 0;
            $order->order_status="New Order";
            $order->payment_method = $request->payment_method;
            $order->user_id =Auth::user()->id;
            // $order->grand_total = $request->productsize;
            // $order->shipping_charges=$user_id;
            // $order->coupon_amount=$user_id;
            $order->save();
            
            // $message="The Product has been added to Cart";
            //     Session::flash('success_message',$message);
            //     return redirect('/mycart')->with('success_message','Product has been Added to cart');
        }
    }

    public function singleevent ($event_slug,$id){
        $events = Events::find($id);
        $events=Events::latest()->take(4)->get();
        return view('frontend.singleevent',compact('events'));
    }

    public function postdetails (Request $request,$slug,$post_id){
        
        $events=Events::latest()->take(4)->get();
        $cats=Blogcategory::all();
        Blogpost::find($post_id)->increment('views');
        $postdetails=Blogpost::find($post_id);
        $recent_posts= Blogpost::latest()->limit(5)->get();
        $posttags=Blogtag::all();
        $relatedposts=Blogpost::where('id',"!=",$post_id)->take(4)->get();
        $postcomments=Postcomments::where('post_id',$post_id)->get();
        return view('frontend.blogs.blogpost',compact('events','recent_posts','posttags','relatedposts','postcomments','cats','postdetails'));
    }

    public function blogcategories (Request $request)
    {
        $posts=Blogpost::all();
        $recent_posts= Blogpost::latest()->limit(5)->get();
        $allcategories=Blogcategory::orderby('id','desc')->paginate(3);
        return view('frontend.blogs.blogcategories',['allcategories'=>$allcategories,'recent_posts'=>$recent_posts]);
    }

    public function blogcategory (Request $request, $cat_slug,$cat_id)
    {
        $events=Events::latest()->take(4)->get();
        $cats=Blogcategory::all();
        $blogcategorys=Blogcategory::find($cat_id); 
        $posttags=Blogtag::all();
        $blogposts=Blogpost::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(5);
        $recent_posts= Blogpost::latest()->limit(5)->get();
        return view('frontend.blogs.blogcategory',
            ['events'=>$events,'cats'=>$cats,'blogcategorys'=>$blogcategorys,'recent_posts'=>$recent_posts,'posttags'=>$posttags,'blogposts'=>$blogposts]);
    }

    public function blogtag (Request $request, $tag_slug,$tag_id)
    {
        $events=Events::latest()->take(4)->get();
        $tags=Blogtag::all();
        $posttags=Blogtag::all();
        $cats=Blogcategory::all();
        $blogtag=Blogtag::find($tag_id);
        $blogposts=Blogpost::orderBy('id','desc')->paginate(3);
        $recent_posts= Blogpost::latest()->limit(5)->get();
        return view('frontend.blogs.posttags',['cats'=>$cats,'posttags'=>$posttags,'blogposts'=>$blogposts,'events'=>$events,'tags'=>$tags,'blogtag'=>$blogtag,'recent_posts'=>$recent_posts,'blogposts'=>$blogposts]);
    }
    
    
}
