
@extends('frontend.master')
@section('title','Enter Mpesa Details')
@section('content')
<div class="container">
    
    <section class="panel panel-default">
        <div class="panel-heading mt-5" style="text-align: center;"> 
            <h3 class="mb-2 panel-title">Pay With Mpesa</h3> 
        </div>
        
        <div class="panel-body">
            <form action="#" class="form-horizontal" role="form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <!-- form-group // -->
                        <div class="form-group">
                            <label for="product_discount" class=" control-label">Amount To Pay</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control text-white bg-dark" name="product_discount" id="product_discount" value="total amount">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="merch_code" class=" control-label">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control text-white bg-dark" required name="merch_code" id="merch_code" placeholder="Phone Number To Charge Amount">
                            </div>
                        </div>

                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-sm-offset-9 col-sm-10">
                        <button type="submit" class="btn btn-primary">Upload Product Information</button>
                    </div>
                </div> 
            </form>
        </div>    
    </section>
</div>
@endsection
