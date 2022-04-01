@extends('layouts.app')
@section('title')
Our Projects
@endsection

@section('content')



			<!-- SAB BANNER START-->
			<div class="sab_banner overlay">
				<div class="container">
					<div class="sab_banner_text">
						<h2> Our Projects</h2>
						<ul class="breadcrumb">
						  <li class="breadcrumb-item"><a href="{{('/')}}">Home</a></li>
						  <li class="breadcrumb-item active">Our Projects </li>
						</ul>
					</div>
				</div>
			</div>
			<!-- SAB BANNER END-->

			<!-- CITY EVENT2 WRAP START-->
			<div class="city_blog2_wrap">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
                            @if(count($projects) < 1 )
                            <div class="col-md-12">
                                <h3>No Poject Available.</h3>
                            </div>
                            @endif
                            @foreach($projects as $post)
							<div class="city_news2_post post2">
								<figure class="box">
									<div class="box-layer layer-1"></div>
									<div class="box-layer layer-2"></div>
									<div class="box-layer layer-3"></div>
									<img src="{{asset($post->image)}}" alt="">
								</figure>
								<div class="city_news2_detail">
									<ul class="city_meta_list">
										<li><a href="{{ route('project.details', [ 'slug' => $post->slug]) }}"><i class="fa fa-calendar"></i>{{ date('M j, Y', strtotime($post->date)) }}</a></li>
									</ul>
									<h4>{{ $post->title }}</h4>
                                    <p>{!! Str::limit($post->body,100) !!}</p>
									<a class="theam_btn bg-color color" href="{{ route('project.details', [ 'slug' => $post->slug]) }}" tabindex="0">Read More</a>
								</div>

							</div>
                            @endforeach

							<div class="pagination">
                                {!! $projects->links() !!}
							</div>
						</div>

					</div>
				</div>
			</div>
			<!-- CITY EVENT2 WRAP END-->


            @endsection
