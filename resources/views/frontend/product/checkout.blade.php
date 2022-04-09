
@extends('frontend.master')
@section('title','My Checkout')
@section('content')
    <!-- Checkout Page Start -->
    <?php use App\Models\Merchadise; ?>
    <?php use App\Models\Cart; ?>
        <!-- checkout-area start -->
        <section class="checkout-area pb-70">
            <div class="container">
                {{-- <div class="row">
                    <div class="col-md-3">
                        <!-- Tabs nav -->
                        <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <i class="fa fa-user-circle-o mr-2"></i>
                                <span class="font-weight-bold small text-uppercase">Billing and Shipping Details</span></a>
        
                            <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                <i class="fa fa-calendar-minus-o mr-2"></i>
                                <span class="font-weight-bold small text-uppercase">Bookings</span></a>
        
                            <a class="nav-link mb-3 p-3 shadow" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                <i class="fa fa-star mr-2"></i>
                                <span class="font-weight-bold small text-uppercase">Reviews</span></a>
        
                            <a class="nav-link mb-3 p-3 shadow" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                <i class="fa fa-check mr-2"></i>
                                <span class="font-weight-bold small text-uppercase">Confirm booking</span></a>
                            </div>
                    </div>
        
        
                    <div class="col-md-9">
                        <!-- Tabs content -->
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade shadow rounded bg-white show active p-5" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <h4 class="font-italic mb-4">Personal information</h4>
                                <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            
                            <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <h4 class="font-italic mb-4">Bookings</h4>
                                <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            
                            <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <h4 class="font-italic mb-4">Reviews</h4>
                                <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            
                            <div class="tab-pane fade shadow rounded bg-white p-5" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                <h4 class="font-italic mb-4">Confirm booking</h4>
                                <p class="font-italic text-muted mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkbox-form">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            @endif

                            <!-- Success message -->
                            @if(Session::has('success_message'))
                            <div class="alert alert-success">
                                {{Session::get('success_message')}}
                            </div>
                            @endif

                            @empty($addresses)
                             <h4>1.BILLING DETAILS</h4>
                                <form method="post" action="{{ route('address.store') }}" class="form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>First Name <span class="required">*</span></label>
                                                <input type="text" placeholder="First Name" name="first_name" class="form-control input-md {{ $errors->has('first_name') ? 'error' : '' }}" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Last Name <span class="required">*</span></label>
                                                <input type="text" placeholder="Last Name" name="last_name" class="form-control input-md {{ $errors->has('last_name') ? 'error' : '' }}" required/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Company Name</label>
                                            <input type="text" placeholder="Your Company Name" name="company_name" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Phone <span class="required">*</span></label>
                                            <input type="text" placeholder="Your Phone Number" name="phone" class="form-control input-md {{ $errors->has('phone') ? 'error' : '' }}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="country-select">
                                            <label>County <span class="required">*</span></label>
                                            <select id="cty_id" class="county form-control" name="countyname">
                                                <option value="0" disabled="true" selected="true">Choose Your County</option>
                                                    @foreach($delivaddresses as $address)
                                                        <option value="{{ $address->id }}">{{ $address->county }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Town / City <span class="required">*</span></label>
                                            <select class="town form-control" name="cityname">
                                                <option value=" " disabled="true" selected="true">Select Your City</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Pick Up Point <span class="required">*</span></label>
                                            <input type="text" name="street_address" class="pickup_point form-control input-md" value=" " />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>price <span class="required">*</span></label>
                                            <input type="text"name="shipping_amount" class="total_amount form-control input-md" value=" " />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-block">Submit</button>
                                </form>
                            @else
                            <h4 class="checkout_title">1.BILLING DETAILS</h4>
                                <div class="card border-2 shadow p-3 mb-5 bg-white rounded">
                                    <div class="card-header" style="position: relative;">
                                        <p class="card-text text-dark">SHIPPING DETAILS</p>
                                        <a href="#" class="float-right" style="position: absolute; 
                                        right: 25px;
                                        top: 25px;">Change</a>
                                        <hr class="my-0">
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-between">
                                            <div class="col-auto mt-0">
                                                <p><b>
                                                    {{ $addresses->shipcharges->county }}
                                                </b></p>
                                            </div>
                                            <br>
                                            <div class="col-auto">
                                                <p><b>{{ $addresses->towns->town }},{{ $addresses->towns->pickuppoint }}</b></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endempty
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <div class="your-order mb-30 ">
                            <h4>ORDER DETAILS</h4>
                            <div class="card border-0 ">
                                <div class="card-body pt-0">
                                    <?php $total_price=0; ?>
                                    @foreach ($usercartitems as $item )
                                    <?php $attrpric=Merchadise::getdiscountedattrprice($item['product_id'],$item['size']);?>
                                        <div class="row justify-content-between">
                                            <div class="col-auto col-md-7">
                                                <div class="media flex-column flex-sm-row">
                                                    <img class=" img-fluid" src="{{ asset ('merchadise/'.$item->product->merch_image) }}" width="62" height="62">
                                                    <div class="media-body my-auto">
                                                        <div class="row ">
                                                            <div class="col-auto">
                                                                <p class="mb-0"><b>{{ $item->product->merch_name }}</b></p><small class="text-muted">{{ $item->product->merch_code }}</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" pl-0 flex-sm-col col-auto my-auto">
                                                <p class="boxed-1">{{ $item->quantity }}</p>
                                            </div>
                                            <div class=" pl-0 flex-sm-col col-auto my-auto ">
                                                <p><b>{{ $attrpric['final_price']*$item['quantity'] }}</b></p>
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                        <?php $total_price=$total_price+($attrpric['final_price']*$item['quantity']);?>
                                    @endforeach
                                </div>

                                <div class=" pl-0 flex-sm-col col-auto my-auto ">
                                    <p><b>{{ $total_price }}</b></p>
                                </div>
                                <div class=" pl-0 flex-sm-col col-auto my-auto ">
                                    <p>shipping cost<b></b></p>
                                </div>
                            </div>

                            <h4>PAYMENT METHODS</h4>
                            <form method="post" action="{{url('/addtoorder')}}">
                                @csrf
                                @foreach($payment_methods as $payment_method)
                                    <p>
                                        <input type="radio" id="test1" value="{{ $payment_method->payment_name}}" name="payment_method" class="{{ $errors->has('payment_name') ? 'error' : '' }}" required >
                                        <label for="test1">{{ $payment_method->payment_name}}</label>
                                    </p>
                                @endforeach
                                <div class="row mb-5 mt-4 ">
                                    <div class="col-md-7 col-lg-6 mx-auto">
                                        <button type="submit" class="btn btn-block btn-outline-primary btn-lg">Proceed</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </ol>
                    </div>
                    
                </div>
            </div>
        </section>
@endsection
