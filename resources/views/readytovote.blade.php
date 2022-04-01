@extends('layouts.app')
@section('title')
Ready To Vote Abia
@endsection
@section('content')


			<!-- SAB BANNER START-->
			<div class="sab_banner overlay">
				<div class="container">
					<div class="sab_banner_text">
						<h2>Ready To Vote Abia</h2>
						<ul class="breadcrumb">
						  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
						  <li class="breadcrumb-item active">Ready To Vote Abia</li>
						</ul>
					</div>
				</div>
			</div>
			<!--CITY ABOUT WRAP START-->
			<div class="city_about_wrap">
				<div class="container">
					<div class="row">
                        <br>
                        <br>
						<div class="col-md-6">
							<div class="city_about_fig">
								<figure class="box">
									<div class="box-layer layer-1"></div>
									<div class="box-layer layer-2"></div>
									<div class="box-layer layer-3"></div>
									<img src="images/Blood-Pressure-Check.jpeg" alt="">
								</figure>

							</div>
						</div>
						<div class="col-md-6">
							<div class="city_about_list">
								<!--SECTION HEADING START-->
								<div class="section_heading border">

									<h2>Our Mission</h2>
								</div>
								<!--SECTION HEADING END-->
								<div class="city_about_text">
                                    <p>
                                        Our mission is to encourage voters to use their right to vote for the greater good. We seek to educate them on their right for fair elections and on how informed voting can significantly impact their life and health in positive ways. By combining a convenient opportunity for voters to register and learn about the voting process with health screening and education, we will motivate citizens to elect leaders who will prioritize their communities and their health.
                                     </p>
								</div>
                                <div class="section_heading border">

									<h2> Our Vision</h2>
								</div>
								<!--SECTION HEADING END-->
								<div class="city_about_text">
                                    <p>
                                        Free, fair and safe elections in a healthier Nigeria
                                   </p>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!--CITY ABOUT WRAP END-->
            <div class="section_heading">

                <h2>Our Partners</h2>
            </div>
            <div class="city_client_wrap">
				<div class="container">
					<div class="city_client_row">

						<ul class="bxslider bx-pager">
                            @foreach($clients as $client)
							<li>
								<div class="city_client_fig">
									<figure class="box">
										<div class="box-layer layer-1"></div>
										<div class="box-layer layer-2"></div>
										<div class="box-layer layer-3"></div>
										<img src="{{URL::to($client->image)}}" alt="">
									</figure>
								</div>
							</li>
                            @endforeach

						</ul>
					</div>

				</div>
			</div>

			<!--CITY BLOG WRAP START-->
			<div class="city_blog_wrap">
				<div class="container">
                    <br>
					<!--SECTION HEADING START-->
					<div class="heding_full">
						<div class="section_heading">

							<h2>Our Gallery</h2>
						</div>
						<p>These are some of the pictures taken during the field exercise</p>
					</div>
					<!--SECTION HEADING END-->
					<div class="row">
                        @if(count($galleries) < 1 )
                        <div class="col-md-12">
                            <h3>No photo  Available in Gallery.</h3>
                        </div>
                        @endif
                        @foreach($galleries as $item)

						<div class="col-md-4 col-sm-4">
							<div class="city_blog_fig">
								<figure class="box">
                                    <a href="{{URL::to($item->image)}}">
									<div class="box-layer layer-1"></div>
									<div class="box-layer layer-2"></div>
									<div class="box-layer layer-3"></div>
                                    </a>
									<img src="{{URL::to($item->image)}}" alt="">
								</figure>
								<div class="city_blog_text">

									<h4>
                                        <a  data-rel="prettyPhoto" href="{{URL::to($item->image)}}">
                                        {{ $item->title }}
                                    </a>
                                 </h4>
								</div>
							</div>
							<div class="city_blog_fig position">
								<figure class="box">
									<div class="box-layer layer-1"></div>
									<div class="box-layer layer-2"></div>
									<div class="box-layer layer-3"></div>
									<img src="{{URL::to($item->image)}}" alt="">
								</figure>
								<div class="city_blog_text">

									<h4>
                                        {{-- <a href="{{URL::to($item->image)}}">
                                        {{ $item->title }}
                                        </a> --}}
                                        <a class="paly_btn" data-rel="prettyPhoto" href="{{asset($item->image)}}">view <i class="fa fa-eye"></i></a>
                                    </h4>
								</div>
							</div>
						</div>
                        @endforeach


					</div>
				</div>
			</div>
			<!--CITY BLOG WRAP END-->
			<div class="city_event2_wrap">
				<div class="container">

					<div class="city_event_detail question overlay">
						<h3>Have A Question?</h3>
                        <h6 style="color: white">Should you need any further information, please do not hesitate to contact us.</h6>
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
								<div class="col-md-6 col-sm-6">
									<div class="event_booking_field">
                                        <input id="form_name" name="name" class="form-control" type="text" placeholder="Enter Full Name">
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="event_booking_field">
                                        <input id="form_email" name="email" class="form-control required email" type="email" placeholder="Enter Email">
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
									</div>
								</div>
								<div class="col-md-12">
									<div class="event_booking_field">
                                        <textarea id="form_message" name="message" class="form-control required" rows="5" placeholder="Enter Message"></textarea>
                                        @if ($errors->has('message'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $errors->first('message') }}</strong>
                                        </span>
                                    @endif
									</div>
								</div>
								<div class="col-md-12">
									<div class="event_booking_area">

										<button class="theam_btn btn2" type="submit">Submit</button>
									</div>
								</div>
							</div>
                            </form>
						</div>
					</div>

				</div>
			</div>





@endsection
