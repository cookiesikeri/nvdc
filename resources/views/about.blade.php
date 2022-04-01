@extends('layouts.app')
@section('title')
About Us
@endsection

@section('content')

			<!-- SAB BANNER START-->
			<div class="sab_banner overlay">
				<div class="container">
					<div class="sab_banner_text">
						<h2>About Us</h2>
						<ul class="breadcrumb">
						  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
						  <li class="breadcrumb-item active">About Us</li>
						</ul>
					</div>
				</div>
			</div>

            <div class="city_about_wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="city_about_fig">
								<figure class="box">
									<img src="{{URL::to($general->about_image)}}" alt="about us image">
								</figure>

							</div>
						</div>
						<div class="col-md-6">
							<div class="city_about_list">
								<!--SECTION HEADING START-->
								<div class="section_heading border">
									<span>ABOUT</span>
									<h2>{{$site->site_name}}</h2>
								</div>
								<!--SECTION HEADING END-->
								<div class="city_about_text">
                                    <p>{!! $general->about_content !!}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="city_requset_wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<div class="city_request_list">
								<div class="city_request_row">
									<span><i class="fa icon-shout"></i></span>
									<div class="city_request_text">
										<h4>Who we are</h4>
									</div>
								</div>
								<div class="city_request_link">
                                    <p>{!! $general->who_we_are !!}</p>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<div class="city_request_list">
								<div class="city_request_row">
									<span><i class="fa icon-shout"></i></span>
									<div class="city_request_text">
										<h4>What we do</h4>
									</div>
								</div>
								<div class="city_request_link">
                                    <p>{!! $general->what_we_do !!}</p>
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="city_request_list">
                                    <div class="city_request_row">
                                        <span><i class="fa icon-shout"></i></span>
                                        <div class="city_request_text">
                                            <h4>Targeted States</h4>
                                        </div>
                                    </div>
                                    <div class="city_request_link">
                                        <p>{!! $general->targeted_states !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
            <div class="city_special_service">
				<div class="container">
					<div class="col-md-4"></div>
					<div class="col-md-8">
						<div class="special_service_text overlay">
							{{-- <h2 class="custom_size2">Looking for more specific</h2> --}}
							{{-- <h3>services in a city</h3> --}}
							<p><span>Call us at {{$site->hotline}}</span> <span>or E-mail {{$site->site_email}} for more detailed</span> information. </p>
							<a class="theam_btn border-color color" href="{{route('contact')}}">Contact Now</a>
						</div>
					</div>
				</div>

			</div>



@endsection
