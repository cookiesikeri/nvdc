<div id="side-panel-container" class="dark" data-tm-bg-img="images/side-push-bg.jpg">
    <div class="side-panel-wrap">
      <div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="fa fa-times side-panel-trigger-icon"></i></a></div>
      <img class="logo mb-50" src="{{ asset($site->logo) }}" alt="Logo">
      <p>{!! $general->about_content !!}</p>
      <div class="widget">
        <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1"> Interested in discussing?</h4>

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
                <input name="name" class="form-control" type="text" placeholder="Enter Name">
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
                <input name="email" class="form-control required email" type="email" placeholder="Enter Email">
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
                <input name="subject" class="form-control required" type="text" placeholder="Enter Subject">
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
                <input name="phone" class="form-control" type="text" placeholder="Enter Phone">
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
          </div>
        </form>
      </div>

      <div class="widget">
        <h5 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Contact Info</h5>
        <div class="tm-widget-contact-info contact-info-style1 contact-icon-theme-colored1">
          <ul>
            <li class="contact-name">
              <div class="icon"><i class="flaticon-contact-037-address"></i></div>
              <div class="text">{{$site->site_name}} </div>
            </li>
            <li class="contact-phone">
              <div class="icon"><i class="flaticon-contact-042-phone-1"></i></div>
              <div class="text"><a href="tel:{{$site->hotline}}">{{$site->hotline}}</a></div>
            </li>
            <li class="contact-email">
              <div class="icon"><i class="flaticon-contact-043-email-1"></i></div>
              <div class="text"><a href="mailto:{{$site->site_email}}">{{$site->site_email}}</a></div>
            </li>
            <li class="contact-address">
              <div class="icon"><i class="flaticon-contact-047-location"></i></div>
              <div class="text">{{$site->site_address}}</div>
            </li>
          </ul>
        </div>
      </div>

    </div>
  </div>
