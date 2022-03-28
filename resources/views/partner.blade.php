@extends('layouts.app')
@section('title')
Partners
@endsection

@section('content')
			<!-- SAB BANNER START-->
			<div class="sab_banner overlay">
				<div class="container">
					<div class="sab_banner_text">
						<h2>Partners</h2>
						<ul class="breadcrumb">
						  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
						  <li class="breadcrumb-item active">Partners</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- SAB BANNER END-->

			<!-- CITY EVENT2 WRAP START-->
			<div class="city_event2_wrap">
				<div class="container">

					<div class="city_event_detail question overlay">
						<h3>Become Our Partner</h3>
                        <form action="{{route('become.partner.post')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @if(Session::has('success'))
                            <div class="col-md-12">
                               <div class="alert alert-success no-b">
                                  <span class="text-semibold">Thank you!</span> {{ Session::get('success')}}
                                  <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                               </div>
                            </div>
                            @endif
						<div class="event_booking_form">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="event_booking_field">
										<input type="text" placeholder="Company Name" name="name">
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="event_booking_field">
										<input type="email" placeholder="Company Email" name="email">
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="event_booking_field">
										<input type="text" placeholder="Company Phone" name="phone">
                                        @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
									</div>
								</div>
                                <div class="col-md-6 col-sm-6">
									<div class="event_booking_field">
                                        <label for="form_email" style="color: white">Company LOGO</label>
										<input type="file"  name="image">
                                        @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif
								</div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="event_booking_field">
                                        <select class="small" name="nationality">
                                            <option value="">Select Nationality</option>
                                            @foreach($countries as $country)
                                            <option value="{{$country->title}}">{{ ucfirst($country->title) }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('nationality'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('nationality') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="event_booking_field">
                                        <select class="small" name="publish">
                                            <option value="">Publish( profile to be displayed on our website)</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                        @if ($errors->has('publish'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('publish') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-6">
									<div class="event_booking_field">
										<input type="text" placeholder="Company Address"  name="address">
                                        @if ($errors->has('address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif
									</div>
								</div>
								<div class="col-md-12">
									<div class="event_booking_area">
										<textarea name="purpose" placeholder="Why do you want to become a partner"></textarea>
                                        @if ($errors->has('purpose'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('purpose') }}</strong>
                                        </span>
                                        @endif

										<button class="theam_btn btn2" type="submit">Submit</button>
									</div>
								</div>
							</div>
						</div>
                        </form>
					</div>
					{{-- <div class="mayor_team">
						<div class="section_heading center">
							<span>Goverment</span>
							<h2>Related Memeber</h2>
						</div>
                        @if(count($volunteers) < 1 )
                        <div class="col-md-12">
                            <h3>No Volunteer Available.</h3>
                        </div>
                        @endif
                        @foreach($volunteers as $post)
						<div class="col-md-4 col-sm-4">
							<div class="city_team_fig">
								<figure class="overlay">
									<img src="{{asset($post->image)}}" alt="">
									<div class="city_top_social">
										<ul>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											<li><a href="#"><i class="fa fa-youtube"></i></a></li>
										</ul>
									</div>
								</figure>
								<div class="city_team_text">
									<h4><a href="#">{{ $post->name }}</a></h4>
									<p>Date Joined: {{ date('M j, Y', strtotime($post->updated_at)) }}</p>
								</div>
							</div>
						</div>
                        @endforeach

					</div> --}}
				</div>
			</div>
			<!-- CITY EVENT2 WRAP END-->


            @endsection
