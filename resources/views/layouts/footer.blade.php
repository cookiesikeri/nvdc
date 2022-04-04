<footer>
    <div class="widget_wrap overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="widget_list">
                        <h4 class="widget_title">Reach Us</h4>
                        <div class="widget_text">
                            <ul>
                                <li><a href="tel:{{$site->hotline}}">{{$site->hotline}}</a></li>
                                <li><a href="mailto:{{$site->site_email}}"> {{$site->site_email}}</a></li>
                                <li><a href="javasctipt:void(0);">{{$site->site_address}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="widget_list">
                                <h4 class="widget_title">Quick Links</h4>
                                 <div class="widget_service">
                                    <ul>
                                        <li><a href="{{url('/')}}">Home</a></li>
                                        <li><a href="{{route('aboutus')}}">About Us</a></li>
                                        <li><a href="{{route('galleries')}}">Gallery</a></li>
                                        <li><a href="{{route('volunteers')}}"> Volunteer</a></li>
                                        <li><a href="{{route('projects')}}">Projects</a></li>
                                        <li><a href="{{route('donate')}}">Donate</a></li>
                                    </ul>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget_list">
                                <h4 class="widget_title">Features</h4>
                                 <div class="widget_service">
                                    <ul>
                                        <li><a href="{{route('readytovote')}}">Ready To Vote Abia</a></li>
                                        <li><a href="{{route('partners')}}">Partner</a></li>
                                        <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                                        <li><a href="{{route('terms')}}">Terms of Use</a></li>
                                        <li><a href="{{route('faqs')}}">FAQs</a></li>
                                        <li><a href="{{route('contact')}}">Contact</a></li>
                                    </ul>
                                 </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="widget_list">
                                <h4 class="widget_title">For Appointment</h4>
                                <div class="widget_text text2">
                                    <div class="city_news_feild">

                                        <h4>Newsletter</h4>
                                        <p>Subscribe to get the latest news, events updates and more..</p>
                                        <div class="city_news_search">
                                            <form {{route('news.letter.post')}} method="POST">
                                                @csrf
                                            {{-- <input type="text" name="text" placeholder="Enter Your Email Adress Here" required> --}}
                                            <input type="email" required  id="email" name="email" placeholder="Enter Your Email Address Here">
                                            <button class="theam_btn border-color color" type="submit">Subcribe Now</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget_copyright">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget_logo">
                            <a href="{{url('/')}}"><img src="{{ asset($site->logo) }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="copyright_text">
                            <p><span>Copyright. All Rights Reserved {{$site->site_name}} {{date('Y')}}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="city_top_social">
                            <ul>
                                <li><a href="{{ $site->facebook ? $site->facebook : ''}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $site->twitter ? $site->twitter : ''}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $site->instagram ? $site->instagram : ''}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="{{ $site->linkedin ? $site->linkedin : ''}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="{{ $site->youtube ? $site->youtube : ''}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>


