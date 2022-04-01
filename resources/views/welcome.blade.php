@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')			<!--CITY ABOUT WRAP START-->
			<div class="city_about_wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="city_about_fig">
								<figure class="box">
									<img src="{{URL::to($general->about_image)}}" alt="">
                                </figure>
							</div>
						</div>
						<div class="col-md-6">
							<div class="city_about_list">
								<!--SECTION HEADING START-->
								<div class="section_heading border">
									<span>Welcome to</span>
									<h2>{{$site->site_name}}</h2>
								</div>
								<!--SECTION HEADING END-->
								<div class="city_about_text">
                                    <p>{!! $general->home_intro !!}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="city_blog_wrap">
				<div class="container">
					<!--SECTION HEADING START-->
					<div class="heding_full">
						<div class="section_heading">
							<h2>Our Projects </h2>
						</div>
					</div>
					<!--SECTION HEADING END-->
					<div class="row">

                        @if(count($projects) < 1 )
                        <div class="col-md-12">
                            <h3>No Poject Available.</h3>
                        </div>
                        @endif
                        @foreach($projects as $post)
						<div class="col-md-4 col-sm-4">
							<div class="city_blog_fig">
								<figure class="box">
									<div class="box-layer layer-1"></div>
									<div class="box-layer layer-2"></div>
									<div class="box-layer layer-3"></div>
									<img src="{{asset($post->image)}}" alt="">
								</figure>
								<div class="city_blog_text">

									<h4> {{ $post->title }}</h4>
                                    <p>{!! Str::limit($post->body,100) !!}</p>
									<div class="city_blog_social">
										<a class="theam_btn border-color color" href="{{ route('project.details', [ 'slug' => $post->slug]) }}" tabindex="0">Read More</a>
									</div>
								</div>
							</div>
							<div class="city_blog_fig position">
								<figure class="box">
									<div class="box-layer layer-1"></div>
									<div class="box-layer layer-2"></div>
									<div class="box-layer layer-3"></div>
									<img src="{{asset($post->image)}}" alt="">
								</figure>
								<div class="city_blog_text">
									<h4> {{ $post->title }}</h4>
									<p>{!! Str::limit($post->body,100) !!}</p>
									<div class="city_blog_social">
										<a class="theam_btn border-color color" href="{{ route('project.details', [ 'slug' => $post->slug]) }}" tabindex="0">Read More</a>

									</div>
								</div>
							</div>
						</div>
                        @endforeach
					</div>
				</div>
			</div>


            <div class="city_blog2_wrap team">
				<div class="container">
					<div class="city_contact_row">
						<div class="city_event_detail contact">
							<div class="section_heading center">

								<h2>Become A Volunteer</h2>
							</div>
							<div class="event_booking_form">
                                <form action="{{route('become.volunteer.post')}}" method="POST" enctype="multipart/form-data">
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
                                                <input type="text" placeholder="Full Name" name="name">
                                                @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="event_booking_field">
                                                <input type="email" placeholder="Email" name="email">
                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="event_booking_field">
                                                <input type="text" placeholder="Phone" name="phone">
                                                @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="event_booking_field">
                                                <label for="form_email" style="color: white">Profile Photo</label>
                                                <input type="file"  name="image">
                                                @if ($errors->has('image'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                                </span>
                                                @endif
                                        </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="event_booking_field">
                                                <select class="small" name="sex">
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                @if ($errors->has('sex'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('sex') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
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
                                        <div class="col-md-4 col-sm-6">
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
                                                <input type="text" placeholder="Enter Home Address"  name="address">
                                                @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="event_booking_area">
                                                <textarea name="purpose" placeholder="Why do you want to become a Volunteer"></textarea>
                                                @if ($errors->has('purpose'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('purpose') }}</strong>
                                                </span>
                                                @endif

                                            </div>
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




@endsection
