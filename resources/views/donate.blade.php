@extends('layouts.app')
@section('title')
Donate
@endsection
@section('content')


<section class="" >
    <div class="container position-relative p-0 mt-90" style="max-width: 700px;">
        <h3 class="bg-theme-colored1 p-15 mb-0 text-white">Donation Form</h3>
        <div class="section-content bg-white p-30">
            <div class="row">
                <div class="col-md-12">
                    <!-- Reservation Form Start-->
                    <input type="hidden" name="paystack_ref" value="{{ Paystack::genTranxRef() }}">
                    <input type="hidden" name="_auth" id="_auth" value="{{csrf_token()}}">
                    <form class="p-30 pb-15"  method="POST" action="{{ route('pay') }}">
                        <input type="hidden" name="amount" id="amount"  value="amount" class="form-control">
                        <input type="hidden" name="type"  value="card" class="form-control">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p class="">Why should you donate or volunteer?</p>
                        <p>
                            By joining us on this mission, you become part of the solution to ALL of Nigeria’s problems. We watched generations before us complain all the time, we want to be the generation that actually does something about it. Democracy is our only form of government,
                            and any revolution must be through strengthening democracy. Voter apathy and lack of participation many times deprives the citizenry of good leadership and lack of accountability.
                            <br> When you join us, you become part of the movement and we will carry you along every step of the way.


                        </p>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group mb-30">
                                    <input type="text" placeholder="NameName" name="name" required class="form-control required">
                                     @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                    </span> @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-30">
                                    <input type="email" placeholder="Email" name="email" class="form-control required">
                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                    </span> @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-30">
                                    <input type="text" placeholder="Phone" name="phone" id="phone" class="form-control required">
                                    @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                    </span> @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-30">
                                    <input type="text" placeholder="Enter Amount" name="amount" required class="form-control required">
                                     @if ($errors->has('amount'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-danger">{{ $errors->first('amount') }}</strong>
                                    </span> @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group mb-0 mt-0">
                                    <input name="form_botcheck" class="form-control" type="hidden" value="">
                                    <button type="submit" class="btn btn-theme-colored1 btn-round" data-loading-text="Please wait...">Submit Now</button>
                                    <button type="button" class="btn btn-theme-colored btn-round"  style="color: black"><a href="https://aph-foundation.org/" target="_blank"> Donate USD</a></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Reservation Form End-->
                </div>
            </div>
        </div>
        <button title="Close (Esc)" type="button" class="mfp-close mt-10">×</button>
    </div>
</section>

<!-- Footer Scripts -->

@endsection
