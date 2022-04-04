@extends('layouts.app')
@section('title')
Feedbacks
@endsection

@section('content')

<!-- SAB BANNER START-->
<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h2>Feedbacks</h2>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                <li class="breadcrumb-item active">Feedbacks</li>
            </ul>
        </div>
    </div>
</div>

<div class="city_department_wrap overlay">
    <div class="bg_white">
        <div class="container-fluid">
            <!--SECTION HEADING START-->
            <div class="section_heading margin-bottom">
                {{-- <span>Explore</span>
                <h2>Govt Departments</h2> --}}
            </div>
            <!--SECTION HEADING END-->
            <div class="city-department-slider">
                <div>
                    @foreach($feedbacks as $state)
                    <div class="width_control">
                        <div class="city_department_fig">
                            <figure class="box">
                                <div class="box-layer layer-1"></div>
                                <div class="box-layer layer-2"></div>
                                <div class="box-layer layer-3"></div>
                                {{-- <img src="extra-images/department-fig.jpg" alt=""> --}}
                                <span class="info-box-icon push-bottom bg-blue"><i class="fa fa-user"></i></span>
                            </figure>
                            <div class="city_department_text">
                                <h5>{{$state->name}}</h5>
                                <p>{{$state->name}} - {!! $state->body !!} - {{$state->created_at->diffForHumans()}} </p>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
