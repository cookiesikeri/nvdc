
@extends('layouts.app')
@section('title')
Gallery
@endsection

@section('content')

<div class="sab_banner overlay">
    <div class="container">
        <div class="sab_banner_text">
            <h2>Gallery </h2>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">Gallery </li>
            </ul>
        </div>
    </div>
</div>
<!-- SAB BANNER END-->

<!-- CITY EVENT2 WRAP START-->
<div class="city_blog2_wrap team">
    <div class="container">
        <div class="row">
            @if(count($galleries) < 1 )
            <div class="col-md-12">
                <h3>No photo  Available in Gallery.</h3>
            </div>
            @endif
            @foreach($galleries as $post)
            <div class="col-md-4 col-sm-6">
                <div class="city_team_fig">
                    <figure class="overlay">
                        <img src="{{asset($post->image)}}" alt="">
                        <div class="city_top_social">
                            <ul>
                                <li>
                                    <a class="paly_btn" data-rel="prettyPhoto" href="{{asset($post->image)}}"><i class="fa fa-plus"></i></a>
                                    {{-- <a data-lightbox="image" href="{{asset($post->image)}}" target=”_”><i class="fa fa-eye"></i></a></li> --}}
                            </ul>
                            {{-- <h4><a href="#">{{$post->title}}</a></h4> --}}
                        </div>
                    </figure>
                    <div class="city_team_text">
                        <h4><a href="#">{{$post->title}}</a></h4>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-md-12">
                <div class="pagination">
                    <ul>

                        <li>{{$galleries->links()}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
