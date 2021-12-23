
@extends('frontend.master')
@section('title','My Checkout')
@section('content')
    <!-- Checkout Page Start -->
        <!-- checkout-area start -->
        <section class="checkout-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
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

                                {{-- @if (Auth::user()->id!==$addresses->user_id)
                                    <div class="card border-2 shadow p-3 mb-5 bg-white rounded">
                                        <div class="card-header" style="position: relative;">
                                            <p class="card-text text-dark">SHIPPING DETAILS</p>
                                            <a href="#" class="float-right" style="position: absolute; 
                                            right: 25px;
                                            top: 25px;">edit</a>
                                            <hr class="my-0">
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-between">
                                                <div class="col-auto mt-0">
                                                    <p><b>
                                                        {{ $deliveriesdata->shipcharges->county }}
                                                    </b></p>
                                                </div>
                                                <br>
                                                <div class="col-auto">
                                                    <p><b>{{ $deliveriesdata->towns->town }},{{ $deliveriesdata->towns->pickuppoint }}</b></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else --}}
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
                                        <button type="submit" class="btn btn-dark btn-block">Submit</button>
                                    </form>
                                {{-- @endif --}}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="your-order mb-30 ">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($usercartitems as $item)
                                            <tr class="cart_item">
                                                <td class="product-name">{{ $item['product'] ['merch_name'] }}<strong class="product-quantity"> × 1</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">$165.00</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount sub_total">$300.00</span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping
                                                <br>
                                            </th>
                                            <td><span class="shipping_amount">$0</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount total_amount">$215.00</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="payment-method">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <button class="btn-link" type="button" data-toggle="collapse"
                                                    data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    Direct Bank Transfer
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                Make your payment directly into our bank account. Please use your Order ID
                                                as the payment
                                                reference. Your order won’t be
                                                shipped until the funds have cleared in our account.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <button class="btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                    Cheque Payment
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                Please send your cheque to Store Name, Store Street, Store Town, Store
                                                State / County, Store
                                                Postcode.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0">
                                                <button class="btn-link collapsed" type="button" data-toggle="collapse"
                                                    data-target="#collapseThree" aria-expanded="false"
                                                    aria-controls="collapseThree">
                                                    PayPal
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <p><span class='fw-medium'>PayPal</span> - the safer, easier way to pay</p>
                                                <form class="row needs-validation" method="post" novalidate>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                        <input class="form-control" type="email" placeholder="E-mail" required>
                                                        <div class="invalid-feedback">Please enter valid email address</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3">
                                                        <input class="form-control" type="password" placeholder="Password" required>
                                                        <div class="invalid-feedback">Please enter your password</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="d-flex flex-wrap justify-content-between align-items-center"><a class="nav-link-style" href="#">Forgot password?</a>
                                                        <button class="btn btn-primary" style="background-color: #fe696a;
                                                        border-color: #fe696a;" type="submit">Log In</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment mt-20">
                                    <button type="submit" class="btn theme-btn" style="background-color: #fe696a;
                                    border-color: #fe696a;">Place order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- checkout-area end -->
    {{-- <div class="page-section section mt-90 mb-30" style="border:2px solid black;">
        
        <div class="container">
            <div class="row">
                <div class="col-12">
                    
                    <!-- Checkout Form s-->
                    <form action="#" class="checkout-form">
                    <div class="row row-40">
                        
                        <div class="col-lg-7 mb-20">
                            
                            <!-- Billing Address -->
                            <div id="billing-form" class="mb-40">
                                <h4 class="checkout-title">Billing Address</h4>

                                <div class="row">

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>First Name*</label>
                                        <input type="text" placeholder="First Name">
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Last Name*</label>
                                        <input type="text" placeholder="Last Name">
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address">
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Phone no*</label>
                                        <input type="text" placeholder="Phone number">
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="Company Name">
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label>Address*</label>
                                        <input type="text" placeholder="Address line 1">
                                        <input type="text" placeholder="Address line 2">
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>County*</label>
                                        <select class="nice-select">
                                            @foreach ($deliveryaddresses as $address)
                                                <option id="address{{ $address['id'] }}" value="{{ $address['id'] }}">{{ $address['county'] }}</option>
                                            @endforeach
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Town/City*</label>
                                        <input type="text" placeholder="Town/City">
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>State*</label>
                                        <input type="text" placeholder="State">
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Zip Code*</label>
                                        <input type="text" placeholder="Zip Code">
                                    </div>

                                    <div class="col-12 mb-20">
                                        <div class="check-box">
                                            <input type="checkbox" id="create_account">
                                            <label for="create_account">Create an Acount?</label>
                                        </div>
                                        <div class="check-box">
                                            <input type="checkbox" id="shiping_address" data-shipping>
                                            <label for="shiping_address">Ship to Different Address</label>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            
                            <!-- Shipping Address -->
                            <div id="shipping-form" class="mb-40">
                                <h4 class="checkout-title">Shipping Address</h4>

                                <div class="row">

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>First Name*</label>
                                        <input type="text" placeholder="First Name">
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Last Name*</label>
                                        <input type="text" placeholder="Last Name">
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Email Address*</label>
                                        <input type="email" placeholder="Email Address">
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Phone no*</label>
                                        <input type="text" placeholder="Phone number">
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="Company Name">
                                    </div>

                                    <div class="col-12 mb-20">
                                        <label>Address*</label>
                                        <input type="text" placeholder="Address line 1">
                                        <input type="text" placeholder="Address line 2">
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Country*</label>
                                        <select class="nice-select">
                                                <option>Bangladesh</option>
                                                <option>China</option>
                                                <option>country</option>
                                                <option>India</option>
                                                <option>Japan</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Town/City*</label>
                                        <input type="text" placeholder="Town/City">
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>State*</label>
                                        <input type="text" placeholder="State">
                                    </div>

                                    <div class="col-md-6 col-12 mb-20">
                                        <label>Zip Code*</label>
                                        <input type="text" placeholder="Zip Code">
                                    </div>

                                </div>

                            </div>
                            
                        </div>
                        
                        <div class="col-lg-5">
                            <div class="row">
                                
                                <!-- Cart Total -->
                                <div class="col-12 mb-60">
                                
                                    <h4 class="checkout-title">Cart Total</h4>
                            
                                    <div class="checkout-cart-total">

                                        <h4>Product <span>Total</span></h4>
                                        
                                        <ul>
                                            @foreach($usercartitems as $item)
                                             <li>{{ $item->product->merch_name }} X {{$item->quantity}} <span>sh.345<</span></li>
                                            @endforeach
                                            {{-- <li>{{ $item->product }} X 01 <span>$295.00</span></li> 
                                            <li>Aquet Drone  D 420 X 02 <span>$550.00</span></li>
                                            <li>Play Station X 22 X 01 <span>$295.00</span></li>
                                            {{-- <li>Roxxe Headphone Z 75 X 01 <span>$110.00</span></li> 
                                        </ul>
                                        
                                        <p>Sub Total <span>$1250.00</span></p>
                                        <p>Shipping Fee <span>$00.00</span></p>
                                        
                                        <h4>Grand Total <span>$1250.00</span></h4>
                                        
                                    </div>
                                    
                                </div>
                                
                                <!-- Payment Method -->
                                <div class="col-12 mb-60">
                                
                                    <h4 class="checkout-title">Payment Method</h4>
                            
                                    <div class="checkout-payment-method">
                                        
                                        <div class="single-method">
                                            <input type="radio" id="payment_check" name="payment-method" value="check">
                                            <label for="payment_check">Check Payment</label>
                                            <p data-method="check">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        
                                        <div class="single-method">
                                            <input type="radio" id="payment_bank" name="payment-method" value="bank">
                                            <label for="payment_bank">Direct Bank Transfer</label>
                                            <p data-method="bank">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        
                                        <div class="single-method">
                                            <input type="radio" id="payment_cash" name="payment-method" value="cash">
                                            <label for="payment_cash">Cash on Delivery</label>
                                            <p data-method="cash">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        
                                        <div class="single-method">
                                            <input type="radio" id="payment_paypal" name="payment-method" value="paypal">
                                            <label for="payment_paypal">Paypal</label>
                                            <p data-method="paypal">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        
                                        <div class="single-method">
                                            <input type="radio" id="payment_payoneer" name="payment-method" value="payoneer">
                                            <label for="payment_payoneer">Payoneer</label>
                                            <p data-method="payoneer">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>
                                        </div>
                                        
                                        <div class="single-method">
                                            <input type="checkbox" id="accept_terms">
                                            <label for="accept_terms">I’ve read and accept the terms & conditions</label>
                                        </div>
                                        
                                    </div>
                                    
                                    <button class="place-order">Place order</button>
                                    
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Checkout Page End --> 
@endsection
