@extends('layouts.app')
@section('title')
Contact Us
@endsection

@section('content')
			<!-- SAB BANNER START-->
			<div class="sab_banner overlay">
				<div class="container">
					<div class="sab_banner_text">
						<h2>Contact Us</h2>
						<ul class="breadcrumb">
						  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
						  <li class="breadcrumb-item active">Contact Us</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- SAB BANNER END-->

			<!-- CITY EVENT2 WRAP START-->
			<div class="city_blog2_wrap team">
				<div class="container">
					<div class="city_contact_map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.4673578149163!2d7.419674764307159!3d9.112189590190551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0bfbb98bd6e3%3A0x6ec5e2aec1157abf!2sLILYSOLUTIONS%20LIMITED!5e0!3m2!1sen!2sng!4v1634124332699!5m2!1sen!2sng" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>
					<div class="city_contact_row">
						<div class="city_contact_list">
							<div class="row">
								<div class="col-md-6">
									<div class="city_contact_text">
										<h3>Contact with <br>us About our<br>Services</h3>
										<span><i class="fa icon-agenda"></i></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="city_contact_text text2">
										<h3>Fellow Us on Social Media </h3>
										<div class="city_top_social">
											<ul>
                                                <li><a href="{{$site->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="{{$site->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="{{$site->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="{{$site->youtube}}"><i class="fa fa-youtube"></i></a></li>
                                                <li><a href="{{$site->instagram}}"><i class="fa fa-instagram"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="city_event_detail contact">
							<div class="section_heading center">

								<h2>Contact With Us</h2>
							</div>
							<div class="event_booking_form">
                                <form action="{{route('site.contact.post')}}" method="post">
                                    {{csrf_field()}}
                                    @if(Session::has('success'))
                                    <div class="col-md-12">
                                        <div class="alert alert-success no-b">
                                            <span class="text-semibold">Thank you!</span> {{ Session::get('success')}}
                                            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                                        </div>
                                    </div>
                                    @endif
								<div class="row">
									<div class="col-md-6">
										<div class="event_booking_field">
											<input type="text" placeholder="Name"  name="name">
                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="event_booking_field">
											<input type="email" placeholder="Email" name="email">
                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="event_booking_field">
											<input type="text" placeholder="Phone Number" name="phone">
                                            @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
										</div>
									</div>
									<div class="col-md-6">
										<div class="event_booking_field">
											<input type="text" placeholder="Subject" name="subject">
                                            @if ($errors->has('subject'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                                            </span>
                                        @endif
										</div>
									</div>
									<div class="col-md-12">
										<div class="event_booking_area">
											<textarea name="message">Enter Your Message Here</textarea>
                                            @if ($errors->has('message'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('message') }}</strong>
                                            </span>
                                        @endif
										</div>
										<button class="theam_btn btn2" type="submit">Submit</button>
									</div>
								</div>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- CITY EVENT2 WRAP END-->

@endsection
