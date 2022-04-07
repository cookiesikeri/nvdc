@extends('layouts.app')
@section('title')
Donate
@endsection

@section('content')
			<!-- SAB BANNER START-->
			<div class="sab_banner overlay">
				<div class="container">
					<div class="sab_banner_text">
						<h2>Donate </h2>
						<ul class="breadcrumb">
						  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
						  <li class="breadcrumb-item active">Donate </li>
						</ul>
					</div>
				</div>
			</div>
			<!-- SAB BANNER END-->

			<!-- CITY EVENT2 WRAP START-->
			<div class="city_blog2_wrap team">
				<div class="container">
					<div class="city_contact_row">

						<div class="city_event_detail contact">
							<div class="section_heading center">

								<h2>Donate To Us</h2>
                                <h4>Why should you donate or volunteer?</h4>
<p>
    By joining us on this mission, you become part of the solution to ALL of Nigeria’s problems. We watched generations before us complain all the time, we want to be the generation that actually does something about it. Democracy is our only form of government, and any revolution must be through strengthening democracy. Voter apathy and lack of participation many times deprives the citizenry of good leadership and lack of accountability.
<br>
When you join us, you become part of the movement and we will carry you along every step of the way.


</p>
							</div>
							<div class="event_booking_form">
                                <form action="{{ route('stripe.pay') }}" method="post">
                                    {{csrf_field()}}
								<div class="row">
									<div class="col-md-12">
										<div class="event_booking_field">
											<input type="text" placeholder="Name"  name="name" required>
                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
										</div>
									</div>
									<div class="col-md-12">
										<div class="event_booking_field">
											<input type="email" placeholder="Email" name="email">
                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
										</div>
									</div>
									<div class="col-md-12">
										<div class="event_booking_field">
											<input type="text" placeholder="1000" name="amount" required>
                                            @if ($errors->has('amount'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong class="text-danger">{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
										</div>
									</div>
										<button class="theam_btn btn2" type="submit">Donate</button>
									</div>

								</div>

                                </form>

							</div>
                            Do you want to become a  Volunteer? Click <a href="{{route('volunteers')}}"> <strong>HERE</strong></a>
						</div>
					</div>
				</div>
			</div>
			<!-- CITY EVENT2 WRAP END-->



@endsection
