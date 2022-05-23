<header id="header" class="header header-layout-type-header-2rows">
    <div class="header-top">
      <div class="container">
        <div class="row">
          <div class="col-xl-auto header-top-left align-self-center text-center text-xl-left">
            <ul class="element contact-info">
              <li class="contact-phone"><i class="fa fa-phone font-icon sm-display-block"></i> Tel: {{$site->hotline}}</li>
              <li class="contact-email"><i class="fa fa-envelope font-icon sm-display-block"></i> {{$site->site_email}}</li>
              <li class="contact-address"><i class="fa fa-map font-icon sm-display-block"></i> {{$site->site_address}}</li>
            </ul>
          </div>
          <div class="col-xl-auto ml-xl-auto header-top-right align-self-center text-center text-xl-right">
            <div class="element pt-0 pb-0">
              <ul class="styled-icons icon-dark icon-theme-colored1 icon-circled clearfix">
                <li><a class="social-link" href="{{ $site->facebook ? $site->facebook : ''}}" target="_blank"><i class="fab fa-facebook"></i></a></li>
                <li><a class="social-link" href="{{ $site->twitter ? $site->twitter : ''}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a class="social-link" href="{{ $site->instagram ? $site->instagram : ''}}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a class="social-link" href="{{ $site->linkedin ? $site->linkedin : ''}}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                <li><a class="social-link" href="{{ $site->youtube ? $site->youtube : ''}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
              </ul>
            </div>
            <div class="element pt-0 pb-0">
              <a href="{{route('donate')}}" class="btn btn-theme-colored2 btn-sm">Make a Donation</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed">
        <div class="menuzord-container header-nav-container">
          <div class="container position-relative">
            <div class="row header-nav-col-row">
              <div class="col-sm-auto align-self-center">
                <a class="menuzord-brand site-brand" href="{{url('/')}}">
                  <img class="logo-default logo-1x" src="{{ asset($site->logo) }}" alt="Logo">
                  <img class="logo-default logo-2x retina" src="{{ asset($site->logo) }}" alt="Logo">
                </a>
              </div>
              <div class="col-sm-auto ml-auto pr-0 align-self-center">
                <nav id="top-primary-nav" class="menuzord green" data-effect="fade" data-animation="none" data-align="right">
                  <ul id="main-nav" class="menuzord-menu onepage-nav">
                    <li @if(active('/'))  class="active" @endif><a href="#home">Home</a> </li>
                    <li @if(active('aboutus')) class="active" @endif><a href="#about">About</a></li>
                    <li><a href="#causes">Donate</a></li>
                    <li><a href="#volunteer">Volunteer</a></li>
                    <li><a href="#partner">Partner</a></li>
                    <li><a href="#abia">Ready To Vote Abia</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#contact">Contact</a></li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="row d-block d-xl-none">
               <div class="col-12">
                <nav id="top-primary-nav-clone" class="menuzord d-block d-xl-none default menuzord-color-default menuzord-border-boxed menuzord-responsive" data-effect="slide" data-animation="none" data-align="right">
                 <ul id="main-nav-clone" class="menuzord-menu menuzord-right menuzord-indented scrollable">
                 </ul>
                </nav>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
