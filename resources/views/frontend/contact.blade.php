@extends('frontend.master')
@section('title','Contact-Us')
@section('content')
	<!-- START SCHEDULE -->
    <section id="schedule" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h3>For Enquiries and Bookings</h3>
                        <span></span>
                        <p>Contact us for any enquiries and booking for an event and shows</p>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-lg-12 schedule-tab">
                    <ul id="tabsJustified" class="nav nav-tabs justify-content-center text-center">
                        <li class="nav-item">
                            <a href="#" data-target="#one" data-toggle="tab" class="nav-link">
                                <p>For Any Equiry</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" data-target="#two" data-toggle="tab" class="nav-link active">
                                <p>For Bookings</p>
                            </a>
                        </li>
                    </ul>
                    <div id="tabsJustifiedContent" class="tab-content">
                        <div id="one" class="tab-pane fade">
                            {{-- enquiries --}}
							<div class="container">
								<div class="row">
									<div class="col-md-6">
										<div class="well-box">
											<h2>Contact us directly</h2>
											@if(Session::has('success'))
												<div class="alert alert-success">
													{{Session::get('success')}}
												</div>
											@endif
											<form action="{{ url('/contact') }}" method="POST" id="contactFormSendMail" class="form" >
												{{csrf_field()}}
												<!-- Text input-->
												<div class="form-group">
													<label class="control-label" for="name">Your Full Name
														<span class="required">*</span>
													</label>
													<input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control input-md {{ $errors->has('name') ? 'error' : '' }}" required>
													<!-- Error -->
													@if ($errors->has('name'))
													<div class="error">
														{{ $errors->first('name') }}
													</div>
													@endif
												</div>
												
												<!-- Text input-->
												<div class="form-group">
													<label class=" control-label" for="email">E-Mail <span class="required">*</span></label>
													<input name="email" type="email" value="{{ old('email') }}" class="form-control input-md {{ $errors->has('email') ? 'error' : '' }}" required>
													<!-- Error -->
													@if ($errors->has('email'))
													<div class="error">
														{{ $errors->first('email') }}
													</div>
													@endif
												</div>
						
												<!-- Text input-->
												{{-- <div class="form-group">
													<label class="control-label" for="phone">Your Phone Number
														<span class="required">*</span>
													</label>
													<input name="phone" type="number" placeholder="Your Phone Number" class="form-control input-md {{ $errors->has('phone') ? 'error' : '' }}" required>
													<!-- Error -->
													@if ($errors->has('phone'))
													<div class="error">
														{{ $errors->first('phone') }}
													</div>
													@endif
												</div> --}}
												
												<!-- Textarea -->
												<div class="form-group">
													<label class="  control-label" for="message">Message</label>
													<textarea class="form-control {{ $errors->has('message') ? 'error' : '' }}" rows="6" id="message" name="message">{{ old('messae') }}"</textarea>
													<!-- Error -->
													@if ($errors->has('message'))
													<div class="error">
														{{ $errors->first('message') }}
													</div>
													@endif
												</div>
												
												<!-- Button -->
												<div class="form-group">
													<button type="submit" class="btn btn-primary btn-lg">Submit</button>
												</div>
											</form>
										</div>
									</div>
									<div class="col-md-6 contact-info">
										<div class="well-box">
											<ul class="listnone">
												<li class="address">
													<h2><i class="fa fa-map-marker"></i>Location</h2>
													<p>Ruiru Town,along Thika Road</p>
												</li>
												<li class="email">
													<h2><i class="fa fa-envelope"></i>E-Mail</h2>
													<p>Info@voskill.com</p>
												</li>
												<li class="call">
													<h2><i class="fa fa-phone"></i>Contact</h2>
													<p>+254702521351</p>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
                        </div>
                        <div id="two" class="tab-pane active show fade">
                            {{-- Bookings --}}
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<div class="well-box">
											<h2 class="text-center">For booking on events and shows</h2>
											@if(Session::has('success'))
												<div class="alert alert-success">
													{{Session::get('success')}}
												</div>
											@endif
											<form action="{{ url('/contact') }}" method="POST" id="contactFormSendMail" class="form" >
												{{csrf_field()}}
												<!-- Text input-->
												<div class="form-group">
													<label class="control-label" for="name">Your Full Name
														<span class="required">*</span>
													</label>
													<input id="name" name="name" type="text" value="{{ old('name') }}" class="form-control input-md {{ $errors->has('name') ? 'error' : '' }}" required>
													<!-- Error -->
													@if ($errors->has('name'))
													<div class="error">
														{{ $errors->first('name') }}
													</div>
													@endif
												</div>

												<!-- Text input-->
												<div class="form-group">
													<label class="control-label" for="name">Location
													</label>
													<input id="location" name="location" type="text" value="{{ old('location') }}" class="form-control input-md {{ $errors->has('location') ? 'error' : '' }}" required>
													<!-- Error -->
													@if ($errors->has('location'))
													<div class="error">
														{{ $errors->first('location') }}
													</div>
													@endif
												</div>

												<!-- Text input-->
												<div class="form-group">
													<label class=" control-label" for="phone">Phone Number <span class="required">*</span></label>
													<input name="phone" type="number" value="{{ old('phone') }}" class="form-control input-md {{ $errors->has('phone') ? 'error' : '' }}" required>
													<!-- Error -->
													@if ($errors->has('phone'))
													<div class="error">
														{{ $errors->first('phone') }}
													</div>
													@endif
												</div>
												
												<!-- Text input-->
												<div class="form-group">
													<label class=" control-label" for="email">E-Mail <span class="required">*</span></label>
													<input name="email" type="email" value="{{ old('email') }}" class="form-control input-md {{ $errors->has('email') ? 'error' : '' }}" required>
													<!-- Error -->
													@if ($errors->has('email'))
													<div class="error">
														{{ $errors->first('email') }}
													</div>
													@endif
												</div>
												
												<div class="form-group">
													<div class='input-group date' id='datetimepicker'>
													<input type='text' class="form-control" />
													<span class="input-group-addon">
													  <span class="glyphicon glyphicon-calendar"></span>
													</span>
													</div>
												</div>

												<!-- Text input-->
												<div class="form-group">
													<label for="eventtype">Event Types and Shows:</label>
													<select class="form-control" id="sel1">
														<option>Wedding</option>
														<option>Ruracio</option>
														<option>Club Show</option>
														<option>Concert</option>
														<option>Corporate Event</option>
													</select>
													<!-- Error -->
													@if ($errors->has('eventtype'))
													<div class="error">
														{{ $errors->first('eventtype') }}
													</div>
													@endif
												</div>
												
												<!-- Button -->
												<div class="form-group">
													<button type="submit" class="btn btn-primary btn-lg">Submit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!--- END ROW -->
        </div>
        <!--- END CONTAINER -->
    </section>
    <!-- END SCHEDULE -->
@endsection