@extends('layouts.app')
@section('title')
Home
@endsection
@section('content')

    <!-- Section: Features -->
    <section class="z-index-1 bg-silver-light">
        <div class="container pt-0 pb-0">
          <div class="section-content">
            <div class="row no-gutters">
              <div class="col-md-6 col-lg-4 col-xl-4 mt-sm-0 mt--100">
                <div class="tm-sc-icon-box icon-box animate-icon-on-hover animate-icon-rotate-y mb-sm-30 bg-theme-colored1 p-60 section-typo-light">
                  <div class="icon-box-wrapper">
                    <div class="icon-wrapper"> <a class="icon icon-default"> <i data-tm-font-size="4rem" class="flaticon-charity-awareness-ribbon-inside-a-heart" ></i> </a></div>
                    <div class="icon-text">
                      <h6 class="icon-box-sub-title mb-0">Rules of Business</h6>
                      <h4 class="icon-box-title mt-0">Medical Cases</h4>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 col-xl-4 mt-sm-0 mt--100">
                <div class="tm-sc-icon-box icon-box animate-icon-on-hover animate-icon-rotate-y mb-sm-30 bg-theme-colored2 p-60 section-typo-light">
                  <div class="icon-box-wrapper">
                    <div class="icon-wrapper"> <a class="icon icon-default"> <i data-tm-font-size="4rem" class="flaticon-charity-donation-box" ></i> </a></div>
                    <div class="icon-text">
                      <h6 class="icon-box-sub-title mb-0">Rules of Business</h6>
                      <h4 class="icon-box-title mt-0">Donate Us</h4>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 col-xl-4 mt-md-1 mt-sm-0 mt--100">
                <div class="tm-sc-icon-box icon-box animate-icon-on-hover animate-icon-rotate-y mb-sm-30 bg-theme-colored1 p-60 section-typo-light">
                  <div class="icon-box-wrapper">
                    <div class="icon-wrapper"> <a class="icon icon-default"> <i data-tm-font-size="4rem" class="flaticon-charity-shaking-hands-inside-a-heart" ></i> </a></div>
                    <div class="icon-text">
                      <h6 class="icon-box-sub-title mb-0">Rules of Business</h6>
                      <h4 class="icon-box-title mt-0">Become a Volunteer</h4>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: Service -->
      <section id="about" class="bg-silver-light">
        <div class="container">
          <div class="tm-sc-section-title section-title text-center" data-tm-margin-bottom="100px">
            <div class="row justify-content-md-center">

              <div class="col"></div>
            </div>
          </div>
        </div>
        <div class="tm-floating-objects">
          <span class="floating-object-1 tm-animation-floating" data-tm-bg-img="images/photos/1.png" data-tm-opacity="0.1" data-tm-width="161" data-tm-height="189" data-tm-top="10%"></span>
        </div>
      </section>

      <!-- Section: Service -->
      <section class="">
        <div class="container">
          <div class="section-content" data-tm-margin-top="-250px">
            <div class="row">
              <div class="col-md-6 col-lg-6 col-xl-12">
                <div class="service-item-current-style1 mb-lg-30 text-center">
                  <div class="service-icon mb-20">
                    <img class="icon1" src="images/icons/service-icon1.png" alt="">
                    <img class="icon2" src="images/icons/service-white-icon1.png" alt="">
                  </div>
                  <h4 class="service-title">About <strong>{{$site->site_name}}</strong></h4>
                  <p class="service-details mb-0">{!! $general->about_content !!}</p>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="service-item-current-style1 mb-lg-30">
                  <div class="service-icon mb-20">
                    <img class="icon1" src="images/icons/service-icon2.png" alt="">
                    <img class="icon2" src="images/icons/service-white-icon2.png" alt="">
                  </div>
                  <h4 class="service-title">Who We Are</h4>
                  <p class="service-details mb-0">{!! $general->who_we_are !!}</p>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="service-item-current-style1 mb-lg-30">
                  <div class="service-icon mb-20">
                    <img class="icon1" src="images/icons/service-icon3.png" alt="">
                    <img class="icon2" src="images/icons/service-white-icon3.png" alt="">
                  </div>
                  <h4 class="service-title">What we Do</h4>
                  <p class="service-details mb-0">{!! $general->what_we_do !!}</p>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="service-item-current-style1 mb-lg-30">
                  <div class="service-icon mb-20">
                    <img class="icon1" src="images/icons/service-icon4.png" alt="">
                    <img class="icon2" src="images/icons/service-white-icon4.png" alt="">
                  </div>
                  <h4 class="service-title">Targeted <br>States</h4>
                  <p class="service-details mb-0">{!! $general->targeted_states !!}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <section  id="causes" class="bg-white-f6">
        <div class="container">
          <div class="section-content">
            <div class="row">
              <div class="col-lg-6">
                <h5 class="mb-0 text-gray">Donate To Us</h5>
                <p>
                    By joining us on this mission, you become part of the solution to ALL of Nigeria’s problems. We watched generations before us complain all the time, we want to be the generation that actually does something about it. Democracy is our only form of government, and any revolution must be through strengthening democracy. Voter apathy and lack of participation many times deprives the citizenry of good leadership and lack of accountability.
                <br>
                When you join us, you become part of the movement and we will carry you along every step of the way.


                </p>
              </div>
              <div class="col-lg-6">
                <h2 class="mt-0 mb-0">Donation Form</h2>

                <!-- Contact Form -->
                <form name="contact_form" class="appointment-form" method="post" action="{{ route('stripe.pay') }}">
                    {{csrf_field()}}
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
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Contact Form Validation-->

              </div>
            </div>
          </div>
        </div>
      </section>

      <section  id="volunteer" class="bg-white-f6">
        <div class="container">
          <div class="section-content">
            <div class="row">
              <div class="col-lg-12">
                <h5 class="mb-0 text-gray">Volunteer Form </h5>
                {{-- <h2 class="mt-0 mb-0">Volunteer Form</h2> --}}
                <form action="{{route('become.volunteer.post')}}" class="appointment-form" method="POST" enctype="multipart/form-data">
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
                        <div class="col-sm-6">
                            <div class="form-group mb-30">
                                <input type="text" placeholder="Enter Your Full Name" name="name" required class="form-control required">
                                 @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                </span> @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-30">
                                <input type="email" placeholder="Email" name="email" class="form-control required">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                </span> @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-30">
                                <input type="text" placeholder="Phone" name="phone" class="form-control required" required>
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-30">
                                <label>Profile Photo</label>
                                <input type="file"  name="image" class="form-control">
                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group mb-30">
                            <select name="nationality" class="form-control required">

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
                        <div class="col-sm-4">
                            <select name="sex" class="form-control required">
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
                        <div class="col-sm-4">
                            <select name="publish" class="form-control required">
                                <option value="">Publish(profile to be displayed on our website)</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-30">
                                <textarea type="text" placeholder="Enter Home Address"  name="address" class="form-control"></textarea>
                                @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-30">
                                <textarea placeholder="Why do you want to become a Volunteer" type="text" name="purpose" class="form-control required"></textarea>
                                @if ($errors->has('purpose'))
                                <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('purpose') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-0 mt-0">

                                <button type="submit" class="btn btn-theme-colored1 btn-round" data-loading-text="Please wait...">Submit Now</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Contact Form Validation-->

              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: Video Popup -->
      <section class="layer-overlay overlay-dark-5 bg-no-repeat" data-tm-bg-img="images/job-bg.png">
        <div class="container">
          <div class="section-content">
            <div class="row">
              <div class="col"></div>
              <div class="col-lg-10 col-xl-10">
                <div class="video-block text-center mb-0">
                  {{-- <h6 class="text-uppercase letter-spacing-4px font-weight-500 text-white">Watch our few minutes video</h6> --}}
                  <h2 class="text-white popup-video-title mb-40">READY TO VOTE ABIA </h2>
                  <div class="box-hover-effect tm-sc-video-popup tm-sc-video-popup-css-button">
                    <div class="effect-wrapper d-flex align-items-center">
                      <div class="animated-css-play-button"><span class="play-icon"><i class="fa fa-play"></i></span></div>
                      <iframe title="YouTube video player" src="https://www.youtube.com/embed/5HPiEQOfi7g" width="700" height="400" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                      {{-- <a class="hover-link" data-lightbox-gallery="youtube-video" href="https://www.youtube.com/embed/5HPiEQOfi7g" title=""></a> --}}
                    </div>
                  </div>
                </div>
              </div>
              <div class="col"></div>
            </div>
          </div>
        </div>
      </section>

      <section  id="partner" class="bg-white-f6">
        <div class="container">
          <div class="section-content">
            <div class="row">
              <div class="col-lg-12">
                <h5 class="mb-0 text-gray">Partnership Form </h5>
                {{-- <h2 class="mt-0 mb-0">Volunteer Form</h2> --}}
                <form action="{{route('become.partner.post')}}" class="appointment-form" method="POST" enctype="multipart/form-data">
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
                        <div class="col-sm-6">
                            <div class="form-group mb-30">
                                <input type="text" placeholder="Company Name" name="name" required class="form-control required">
                                 @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                </span> @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-30">
                                <input type="email" placeholder="Company Email" name="email" class="form-control required">
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                </span> @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-30">
                                <input type="text" placeholder="Company PhoneNumber" name="phone" class="form-control required" required>
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-30">
                                <label>Company Logo</label>
                                <input type="file"  name="image" class="form-control">
                                @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-30">
                            <select name="nationality" class="form-control required">

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
                        <div class="col-sm-6">
                            <select name="publish" class="form-control required">
                                <option value="">Publish(profile to be displayed on our website)</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                </select>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-30">
                                <textarea type="text" placeholder="Enter Company's Address"  name="address" class="form-control"></textarea>
                                @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-30">
                                <textarea placeholder="Why do you want to become a Partner" type="text" name="purpose" class="form-control required"></textarea>
                                @if ($errors->has('purpose'))
                                <span class="invalid-feedback" role="alert">
                                <strong class="text-danger">{{ $errors->first('purpose') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-0 mt-0">

                                <button type="submit" class="btn btn-theme-colored1 btn-round" data-loading-text="Please wait...">Submit Now</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Contact Form Validation-->

              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- Section: Testimonials -->
      <section>
        <div class="container-fluid pl-60 pr-60">
          <div class="tm-sc-section-title section-title text-center">
            <div class="row justify-content-md-center">
              <div class="col"></div>
              <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <h5 class="side-line text-theme-colored1 mt-0">Testimonials</h5>
                <h2 class="mt-0">What People Says</h2>
              </div>
              <div class="col"></div>
            </div>
          </div>
          <div class="section-content">
            <div class="row">
                @foreach($feedbacks as $state)
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="testimonial-current-item mb-lg-30">
                  <div class="testimonial-thumb-holder d-flex align-items-center">
                    <div class="author-thumb">
                        <i class="fa fab-user"></i>
                      <img class="w-100 rounded-circle" src="images/icons/icon2.png" alt="Image">
                    </div>
                    <div class="testimonial-author-info">
                      <h4 class="name m-0">{{$state->name}}</h4>
                      {{-- <p class="job-position text-uppercase font-weight-500 m-0">Consultant in Bank</p> --}}
                    </div>
                  </div>
                  <div class="testimonial-text-holder">
                    <div class="author-text">{!! $state->body !!}</div>
                  </div>
                </div>
              </div>
              @endforeach

            </div>
          </div>
        </div>
      </section>

      <section id="gallery" class="bg-white-f6">
        <div class="container pb-70">
          <div class="section-content">
            <div class="row">
              <div class="col-sm-12">
                <div class="tm-sc-gallery tm-sc-gallery-grid gallery-style1-basic">
                  <!-- Isotope Filter -->

                  <!-- End Isotope Filter -->
                  <!-- Isotope Gallery Grid -->
                  <div id="gallery-holder-743344" class="isotope-layout grid-3 gutter-10 clearfix lightgallery-lightbox">
                    <div class="isotope-layout-inner">
                      <!-- the loop -->
                      @foreach($galleries as $post)
                      <!-- Isotope Item Start -->
                      <div class="isotope-item laboratory surgery">
                        <div class="isotope-item-inner">
                          <div class="tm-gallery">
                            <div class="tm-gallery-inner">
                              <div class="thumb">
                                <a href="#"><img src="{{asset($post->image)}}" class="" alt=""/></a>
                              </div>
                              <div class="tm-gallery-content-wrapper">
                                <div class="tm-gallery-content">
                                  <div class="tm-gallery-content-inner">
                                    <div class="icons-holder-inner">
                                      <div class="styled-icons icon-dark icon-circled icon-theme-colored1">
                                        <a class="lightgallery-trigger styled-icons-item" data-exthumbimage="{{asset($post->image)}}" title="photo" href="{{asset($post->image)}}"><i class="fa fa-plus"></i></a>
                                      </div>
                                    </div>
                                    <div class="title-holder">
                                      <h5 class="title"><a href="#">{{$post->title}}</a></h5>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      <!-- Isotope Item End -->
                      <!-- end of the loop -->
                    </div>
                  </div>
                  <!-- End Isotope Gallery Grid -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- Start Divider -->
      <section class="bg-silver-light pt-0" data-tm-margin-top="-100">
        <div class="container pb-80 pt-150">
          <div class="section-content">
            <div class="row">
              <div class="col-sm-12">
                <div class="tm-sc-clients tm-sc-clients-carousel owl-dots-light-skin owl-dots-center clients-animation-grayscale">
                  <div class="owl-carousel owl-theme tm-owl-carousel-6col" data-autoplay="true" data-loop="true" data-duration="6000" data-smartspeed="300" data-margin="30" data-stagepadding="0" data-laptop="4">

                    @foreach($clients as $client)
                    <div class="item"> <a target="_blank" href="{{$client->link}}"> <img src='{{URL::to($client->image)}}' alt='Image' /> </a></div>
                    @endforeach

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Section: Contact Form -->
      <section  id="contact" class="bg-white-f6">
        <div class="container">
          <div class="section-content">
            <div class="row">
              <div class="col-lg-6">
                {{-- <h5 class="mb-0 text-gray">Happy to help!</h5>
                <h2 class="mb-30">If you need someone to talk to, we listen. We won’t judge or tell you what to do.</h2> --}}
                <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate mb-50">
                  <div class="icon-box-wrapper">
                    <div class="icon-wrapper">
                      <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-045-call"></i> </a>
                    </div>
                    <div class="icon-text">
                      <h5 class="icon-box-title mt-0">Phone</h5>
                      <div class="content"><a href="tel:{{$site->hotline}}">{{$site->hotline}}</a></div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate mb-50">
                  <div class="icon-box-wrapper">
                    <div class="icon-wrapper">
                      <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-043-email-1"></i> </a>
                    </div>
                    <div class="icon-text">
                      <h5 class="icon-box-title mt-0">Email</h5>
                      <div class="content"><a href="mailto:{{$site->site_email}}">{{$site->site_email}}</a></div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <div class="icon-box icon-left iconbox-centered-in-responsive iconbox-theme-colored1 animate-icon-on-hover animate-icon-rotate mb-50">
                  <div class="icon-box-wrapper">
                    <div class="icon-wrapper">
                      <a class="icon icon-type-font-icon icon-dark icon-circled"> <i class="flaticon-contact-025-world"></i> </a>
                    </div>
                    <div class="icon-text">
                      <h5 class="icon-box-title mt-0">Address</h5>
                      <div class="content">{{$site->site_address}}</div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <ul class="styled-icons icon-dark icon-sm icon-circled mt-30">
                    <li><a href="{{ $site->facebook ? $site->facebook : ''}}" data-tm-bg-color="#3B5998"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="{{ $site->twitter ? $site->twitter : ''}}" data-tm-bg-color="#02B0E8"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="{{ $site->youtube ? $site->youtube : ''}}" data-tm-bg-color="#D71619"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="{{ $site->instagram ? $site->instagram : ''}}" data-tm-bg-color="#bd3f44"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="{{ $site->linkedin ? $site->linkedin : ''}}" data-tm-bg-color="#3B5998"><i class="fab fa-linkedin"></i></a></li>

                </ul>
              </div>
              <div class="col-lg-6">
                <h2 class="mt-0 mb-0">Contact Us</h2>
                <p class="font-size-20">Active & Ready to use Contact Form!</p>
                <!-- Contact Form -->
                <form name="contact_form" class="" action="{{route('site.contact.post')}}" method="post">
                    {{csrf_field()}}
                    @if(Session::has('success'))
                    <div class="col-md-12">
                        <div class="alert alert-success no-b">
                            <span class="text-semibold">Thank you!</span> {{ Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                        </div>
                    </div>
                    @endif
                  <div class="form-row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Name <small>*</small></label>
                        <input type="text" placeholder="Name"  name="name" class="form-control">
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Email <small>*</small></label>
                        <input type="email" placeholder="Email" name="email" class="form-control">
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Subject <small>*</small></label>
                        <input type="text" placeholder="Subject" name="subject" class="form-control">
                        @if ($errors->has('subject'))
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $errors->first('subject') }}</strong>
                        </span>
                    @endif
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Phone</label>
                        <input type="text" placeholder="Phone Number" name="phone" class="form-control">
                        @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" class="form-control required" rows="5" placeholder="Enter Message"></textarea>
                    @if ($errors->has('message'))
                    <span class="invalid-feedback" role="alert">
                        <strong class="text-danger">{{ $errors->first('message') }}</strong>
                    </span>
                @endif
                  </div>
                  <div class="form-group">
                    <input name="form_botcheck" class="form-control" type="hidden" value="" />
                    <button type="submit" class="btn btn-flat btn-theme-colored1 text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px" data-loading-text="Please wait...">Send your message</button>
                    <button type="reset" class="btn btn-flat btn-theme-colored3 text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px">Reset</button>
                  </div>
                </form>
                <!-- Contact Form Validation-->

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Divider -->

          <!-- Section: Contact -->
    <section>
        <div class="container-fluid pt-0 pb-0">
          <div class="row">
            <div class="col-md-12">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.4673578149163!2d7.419674764307159!3d9.112189590190551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e0bfbb98bd6e3%3A0x6ec5e2aec1157abf!2sLILYSOLUTIONS%20LIMITED!5e0!3m2!1sen!2sng!4v1634124332699!5m2!1sen!2sng" width="2600" height="600" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </section>


@endsection
