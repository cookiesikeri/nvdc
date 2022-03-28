<section class="clients bg-theme-colored1">
    <div class="container pt-0 pb-0">
    <div class="row">
     <div class="col-md-10 col-md-offset-1">
         <h2 class="text-uppercase line-bottom mt-0 text-center">Our <span class="text-theme-colored font-weight-600">Partners</span></h2>
      </div>
       <div class="col-md-12">
          <!-- Section: Clients -->
          <div class="owl-carousel-6col clients-logo transparent text-center">
             @foreach($clients as $client)
             <div class="item"> <a href="{{$client->link}}"><img src="{{URL::to($client->image)}}" alt=""></a></div>
             @endforeach
          </div>
       </div>
    </div>
 </section>
