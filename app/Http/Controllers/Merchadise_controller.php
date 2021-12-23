<?php

namespace App\Http\Controllers;

use App\Models\Merchadise;
use Illuminate\Http\Request;
use App\Models\Productimages;
use App\Models\Productattribute;
use App\Models\Merchadisecategory;
use App\Models\shipping_charge;
use Illuminate\Support\Facades\Session;

class Merchadise_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merchadise=Merchadise::all();
        $merchadisecats=Merchadisecategory::all();
        return view('backend.merchadise.addmerchadise',['merchadise'=>$merchadise,'merchadisecats'=>$merchadisecats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'merch_name'=>'required',
            'merch_code'=>'required|unique:merchadises',
            'merch_details'=>'required',
            'merch_price'=>'required',
            'merch_splprice'=>'required',
            'merch_image'=>'image|mimes:png,jpg,jpeg|max:10000',
        ]);

        if($request->hasfile('merch_image')){
            $merchadiseimage=$request->file('merch_image');
            $merchmerchadiseimage=$request->get('merch_name').'.'.$merchadiseimage->getClientOriginalExtension();
            $dest=public_path('/merchadise');
            $merchadiseimage->move($dest,$merchmerchadiseimage);
        } else {
            $merchmerchadiseimage='na';
        }
       
        $merchadise=new Merchadise;
        $merchadise->merchcat_id=$request->merchadisecategory;
        $merchadise->merch_name=$request->merch_name;
        $merchadise->merch_code=$request->merch_code;
        $merchadise->merch_price=$request->merch_price;
        $merchadise->merch_splprice=$request->merch_splprice;
        $merchadise->merch_details=$request->merch_details;
        $merchadise->merch_image=$merchmerchadiseimage;
        $merchadise->save();

        foreach($request->file('product_images') as $productimg){
            $productimagesname=$request->get('merch_name').'.'.$productimg->getClientOriginalExtension();
            $imgpath=$productimg->store('public/productimages');
            $imgdata=new Productimages;
            $imgdata->product_id=$merchadise->id;
            $imgdata->product_images=$imgpath;
            // $imgdata->move($imgpath,$productimagesname);
            $imgdata->save();


        }

        return redirect('admin/merchadise')->with('success','The Merchaise has been created succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchadise  $Merchadise
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $merchadisedata=Merchadise::find($id);
        // dd($merchadisedata->merchadiseattributes);
        return view('backend.merchadise.productattributes')->with(compact('merchadisedata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchadise  $merchadise
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
        {
            $merchadisecats=Merchadisecategory::all();
            $merchadisedata=Merchadise::find($id);

            return view('backend.merchadise.productattributes')->with(compact('$merchadisedata'));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchadise  $merchadise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'merch_name'=>'required',
            'merch_code'=>'required|unique:merchadises',
            'merch_details'=>'required',
            'merch_price'=>'required',
            'merch_splprice'=>'required',
            'merch_image'=>'image|mimes:png,jpg,jpeg|max:10000',
        ]);

        
        if($request->hasfile('merch_image')){
            $merchimage=$request->file('merch_image');
            $merchmerchadiseimage=$request->get('merch_name').'.'.$merchimage->getClientOriginalExtension();
            $dest=public_path('/merchadise');
            $merchimage->move($dest,$merchmerchadiseimage);
        } else {
            $merchmerchadiseimage=$request->merch_image;
        }
       
        $merchadise=Merchadise::find($id);
        $merchadise->merchcat_id=$request->merchadisecategory;
        $merchadise->merch_name=$request->merch_name;
        $merchadise->merch_code=$request->merch_code;
        $merchadise->merch_price=$request->merch_price;
        $merchadise->merch_splprice=$request->merch_splprice;
        $merchadise->merch_details=$request->merch_details;
        $merchadise->merch_image=$merchmerchadiseimage;
        $merchadise->save();

        return redirect('admin/merchadise')->with('success','The Merchadise has been Updated succesfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchadise  $merchadise
     * @return \Illuminate\Http\Response
     */
    public function addattributes(Request $request,$id)
    {
        $merchadisedata=Merchadise::select('id','merch_name','merch_code','merch_image')->findorfail($id);
        
        if ($request->isMethod('post')){
            $data=$request->all();
            
            foreach($data['productattr_sku'] as $key=>$value){
                if(!empty($value)){
                    $attrcountsku=Productattribute::where('productattr_sku',$value)->count();

                    if($attrcountsku>0){
                        $error_message='The Sku already exists.kindly add another one';
                        Session::flash('error_message',$error_message);
                        return redirect()->back();
                    }

                    $attrcountsize=Productattribute::where(['product_id'=>$id,'productattr_size'=>$data['productattr_size'][$key]])->count();
                    if($attrcountsize>0){
                        $success_message='The Sku already exists.kindly add another one';
                        Session::flash('success_message',$success_message);
                        return redirect()->back();
                    }

                    $attribute=new Productattribute;
                    $attribute->product_id=$id;
                    $attribute->productattr_sku=$value;
                    $attribute->productattr_size=$data['productattr_size'][$key];
                    $attribute->productattr_price=$data['productattr_price'][$key];
                    $attribute->productattr_stock=$data['productattr_stock'][$key];
                    $attribute->productattr_status=0;
                    $attribute->save();
                }
            }
            return view('backend.merchadise.productattributes')->with(compact('merchadisedata'));;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchadise  $merchadise
     * @return \Illuminate\Http\Response
     */
    public function editattributes(Request $request,$id)
    {
        $merchadisedata=Merchadise::select('id','merch_name','merch_code','merch_image')->findorfail($id);
        
        if ($request->isMethod('post')){
            $data=$request->all();
            
            foreach($data['attrid'] as $key=>$attr){
                if(!empty($attr)){
                    Productattribute::where(['id'=>$data['attrid'][$key]])->update
                    (['productattr_price'=>$data['productattr_price'][$key],
                    'productattr_stock'=>$data['productattr_stock'][$key]]);
                }

                $message='Product attributes have been updated successfully';
                Session::flash('success_message',$message);
                return redirect()->back();
            }
            return view('backend.merchadise.productattributes')->with(compact('merchadisedata'));;
        }
    }

    public function updateattributestatus(Request $request)
    {
        if($request->ajax()){
            $data=$request->all();
            if($data['productattr_status']=="Active"){
                $status=0;
            }else{
                $status=1;
            }

            Productattribute::where('id',$data['attribute_id'])->update(['productattr_status'=>$status]);
            return response()->json(['productattr_status'=>$status,'attribute_id'=>$data['attribute_id']]);
        }
    }

    
        
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchadise  $merchadise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchadise $merchadise)
    {
        //
    }

    /**
     * Display all the shipping charges.
     *
     * @return \Illuminate\Http\Response
     */
    public function shippingcharges()
    {
        $shippingcharges=shipping_charge::get();
        return view('backend.merchadise.viewshipping',['shippingcharges'=>$shippingcharges]);
    }

    /**
     * Update the shipping charge for the county.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function  editshippingcharge(Request $request,$id)
    {
        $shippingdetails=shipping_charge::where('id',$id)->first();

        if($request->isMethod('post')){
            $data=$request->all();
            // dd($data);die;
            shipping_charge::where('id',$id)->update(['shipping_charges'=>$data['shipping_charges']]);

            $message="Shipping Charges Updated Successfully!";
            Session::put('success_message',$message);
            return redirect()->back();
        }

        return view('backend.merchadise.editshippingcharge',['shippingdetails'=>$shippingdetails]);   
    }

    public function updateshippingstatus(Request $request)
    {
        $shippingstatus=shipping_charge::find($request->shipping_id);
        $shippingstatus->is_shipping=$request->status;
        $shippingstatus->save();
        // return response()->json(['success'=>'Shipping Status Changed Successfully']);
    }
}
