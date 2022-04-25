  <!-- Footer -->
  <footer id="footer" class="footer bg-no-repeat" data-tm-bg-img="images/footer-bg.png">
    <div class="footer-widget-area">
      <div class="container pt-100 pb-70">
        <div class="row">
          <div class="col-md-6 col-lg-6 col-xl-4">
            <div id="tm_widget_contact_info-1" class="split-nav-menu clearfix widget widget-contact-info clearfix mb-20 pr-30">
              <div class="tm-widget tm-widget-contact-info contact-info contact-info-style1  contact-icon-theme-colored1">
                <img class="mb-20" src="{{ asset($site->logo) }}" alt="images">
                <ul>
                    <li><a href="tel:{{$site->hotline}}">{{$site->hotline}}</a></li>
                    <li><a href="mailto:{{$site->site_email}}"> {{$site->site_email}}</a></li>
                    <li><a href="javasctipt:void(0);">{{$site->site_address}}</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-2">
            <div class="widget widget_nav_menu">
              <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Links</h4>
              <div class="menu-footer-page-list">
                <ul class="menu">
                    <li @if(active('/'))  class="active" @endif><a href="#home">Home</a> </li>
                    <li @if(active('aboutus')) class="active" @endif><a href="#about">About</a></li>
                    <li><a href="#causes">Donate</a></li>
                    <li><a href="#volunteer">Volunteer</a></li>
                    <li><a href="#partner">Partner</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-2">
            <div class="widget widget_nav_menu">
              <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Quick Links</h4>
              <div class="menu-footer-page-list">
                <ul class="menu">
                    <li class="active"><a href="#home">Home</a> </li>
                    <li><a href="#endorsers">Endorsers</a> </li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#causes">Donate</a></li>
                    <li><a href="#volunteer">Volunteer</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-6 col-xl-2">
            <div class="widget widget_nav_menu">
              <h4 class="widget-title widget-title-line-bottom line-bottom-theme-colored1">Quick Links</h4>
              <div class="menu-footer-page-list">
                <ul class="menu">
                    <li><a href="#partner">Partner</a></li>
                    <li><a href="#event">Ready To Vote Abia</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="container">
          <div class="row pt-30 pb-30">
            <div class="col-sm-12 col-lg-6">
              <div class="footer-paragraph text-center text-xl-left text-lg-left text-md-left mb-sm-15">
                Copyright. All Rights Reserved {{$site->site_name}} {{date('Y')}}
              </div>
            </div>
            <div class="col-sm-12 col-lg-6">
              <ul class="styled-icons icon-dark icon-md icon-circled text-center text-xl-right text-lg-right text-md-right">
                <li><a href="{{ $site->facebook ? $site->facebook : ''}}" data-tm-bg-color="#3B5998"><i class="fab fa-facebook"></i></a></li>
                <li><a href="{{ $site->twitter ? $site->twitter : ''}}" data-tm-bg-color="#02B0E8"><i class="fab fa-twitter"></i></a></li>
                <li><a href="{{ $site->youtube ? $site->youtube : ''}}" data-tm-bg-color="#D71619"><i class="fab fa-youtube"></i></a></li>
                <li><a href="{{ $site->instagram ? $site->instagram : ''}}" data-tm-bg-color="#bd3f44"><i class="fab fa-instagram"></i></a></li>
                <li><a href="{{ $site->linkedin ? $site->linkedin : ''}}" data-tm-bg-color="#3B5998"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
