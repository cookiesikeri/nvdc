<header>
    <!--CITY TOP WRAP START-->
    <div class="city_top_wrap">
        <div class="container-fluid">
            <div class="city_top_logo">
                <figure>
                    <h1><a href="{{url('/')}}"><img src="{{ asset($site->logo) }}" alt="logo"></a></h1>
                </figure>
            </div>
            <div class="city_top_news">
                <a href="{{route('feedbacks')}}">
                <span> Feedback</span></a>
                <div class="city-news-slider">
                    <div>
                        <p>Welcome To {{$site->site_name}} <i class="fa fa-star"></i></p>
                    </div>
                    @foreach($feedbacks as $state)
                    <div>
                        <p>{{$state->name}} - {!! $state->body !!} - {{$state->created_at->diffForHumans()}} <i class="fa fa-star"></i></p>
                    </div>
                    @endforeach
                </div>
            </div>
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
    <!--CITY TOP WRAP END-->

    <!--CITY TOP NAVIGATION START-->
    <div class="city_top_navigation">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="navigation">
                        <ul>
                            <li><a class="active" href="{{url('/')}}">Home</a></li>
                            <li><a href="{{route('aboutus')}}">About Us</a></li>
                            <li><a href="#">Get Involved</a>
                                <ul class="child">
                                    <li><a href="{{route('volunteers')}}">Volunteer</a></li>
                                    <li><a href="{{route('partners')}}">Partner</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Initiatives</a>
                                <ul class="child">
                                    <li><a href="{{route('readytovote')}}">Ready To Vote Abia</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('galleries')}}">Gallery</a></li>
                            <li><a href="{{route('donate')}}">Donate</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <!--DL Menu Start-->
                    <div id="kode-responsive-navigation" class="dl-menuwrapper">
                        <button class="dl-trigger">Open Menu</button>
                        <ul class="dl-menu">
                            <li><a class="active" href="{{url('/')}}">Home</a></li>
                            <li><a href="{{route('aboutus')}}">About Us</a></li>
                            <li><a href="#">Get Involved</a>
                                <ul class="child">
                                    <li><a href="{{route('volunteers')}}">Volunteer</a></li>
                                    <li><a href="{{route('partners')}}">Partner</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Initiatives</a>
                                <ul class="child">
                                    <li><a href="{{route('readytovote')}}">Ready To Vote Abia</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('galleries')}}">Gallery</a></li>
                            <li><a href="{{route('donate')}}">Donate</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <!--DL Menu END-->
                </div>
            </div>
        </div>
    </div>
    <!--CITY TOP NAVIGATION END-->

    <!--CITY TOP NAVIGATION START-->
    <div class="city_top_navigation hide">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="navigation">
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{route('aboutus')}}">About Us</a></li>
                            <li><a href="#">Get Involved</a>
                                <ul class="child">
                                    <li><a href="{{route('volunteers')}}">Volunteer</a></li>
                                    <li><a href="{{route('partners')}}">Partner</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Initiatives</a>
                                <ul class="child">
                                    <li><a href="{{route('readytovote')}}">Ready To Vote Abia</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('galleries')}}">Gallery</a></li>
                            <li><a href="{{route('donate')}}">Donate</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <!--DL Menu Start-->
                    <div id="kode-responsive-navigation1" class="dl-menuwrapper">
                        <button class="dl-trigger">Open Menu</button>
                        <ul class="dl-menu">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{route('aboutus')}}">About Us</a></li>
                            <li><a href="#">Get Involved</a>
                                <ul class="child">
                                    <li><a href="{{route('volunteers')}}">Volunteer</a></li>
                                    <li><a href="{{route('partners')}}">Partner</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Initiatives</a>
                                <ul class="child">
                                    <li><a href="{{route('readytovote')}}">Ready To Vote Abia</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('galleries')}}">Gallery</a></li>
                            <li><a href="{{route('donate')}}">Donate</a></li>
                            <li><a href="{{route('contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    <!--DL Menu END-->
                </div>
            </div>
        </div>
    </div>
    <!--CITY TOP NAVIGATION END-->
</header>
