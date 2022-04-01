@extends('layouts.app')
@section('title')
{{$eventdetails->title}}
@endsection

@section('content')


			<!-- SAB BANNER START-->
			<div class="sab_banner overlay">
				<div class="container">
					<div class="sab_banner_text">
						<h2> {{$eventdetails->title}}</h2>
						<ul class="breadcrumb">
						  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
						  <li class="breadcrumb-item active"> {{$eventdetails->title}}</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- SAB BANNER END-->

			<!-- CITY EVENT2 WRAP START-->
			<div class="city_event2_wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="city_event_detail">
								<div class="event_detail_text">
									<figure>
										<img src="{{asset($eventdetails->image)}}" alt="">
									</figure>
									<h3 class="event_heading">{{$eventdetails->title}}</h3>
                                    <p>{!! $eventdetails->body !!}</p>
								</div>

								<!--CITY HEALTH2 TEXT WRAP START-->
								<div class="city_health2_text team">
									<h3 class="event_heading">Related Projects </h3>
									<!--SECTION HEADING END-->
									<div class="city-health2-slider2">
                                        @if(count($events) < 1 )
                                        <div class="col-md-12">
                                            <h3>No Event Available.</h3>
                                        </div>
                                        @endif
                                        @foreach($events as $post)
										<div>

											<div class="city_senior_team">
												<figure class="box">
													<div class="box-layer layer-1"></div>
													<div class="box-layer layer-2"></div>
													<div class="box-layer layer-3"></div>
													<img src="{{asset($post->image)}}" alt="">
												</figure>
                                                <h5>
                                                    <a href="{{ route('project.details', [ 'slug' => $post->slug]) }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </h5>
												<div class="city_senior_team_text">
													{{-- <h5>
                                                        <a href="{{ route('project.details', [ 'slug' => $post->slug]) }}">
                                                            {{ $post->title }}
                                                        </a>
                                                    </h5> --}}
                                                    <p>{{ substr($post->body, 0, 150) }}{{ strlen($post->body) > 150 ? '...' : "" }}</p>

												</div>
											</div>

										</div>
                                        @endforeach

									</div>
								</div>
								<!--CITY HEALTH2 TEXT WRAP END-->

							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- CITY EVENT2 WRAP END-->


  @endsection
