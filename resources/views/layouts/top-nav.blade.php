<header class="header">
    <div class="header-top bg-theme-colored sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="widget no-border m-0">
              <ul class="styled-icons icon-dark icon-theme-colored icon-sm sm-text-center">
                <li><a href="{{ $site->facebook ? $site->facebook : ''}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li><a href="{{ $site->twitter ? $site->twitter : ''}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                <li><a href="{{ $site->instagram ? $site->instagram : ''}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="{{ $site->linkedin ? $site->linkedin : ''}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-8">
            <div class="widget no-border m-0">
              <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <a class="text-white" href="tel:{{$site->hotline}}">{{$site->hotline}}</a> </li>
                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="mailto:{{$site->site_email}}">{{$site->site_email}}</a> </li>
              </ul>
            </div>
          </div>
          <div class="col-md-2">
            <div class="widget no-border m-0">
              <ul class="list-inline pull-right flip sm-pull-none sm-text-center mt-5">
                <li class="mt-sm-10 mb-sm-10">
                  <!-- Modal: Appointment Starts -->
                  {{-- <a class="btn btn-colored btn-lg btn-theme-colored pl-10 pr-10" href="{{route('donate')}}">Donate Now</a> --}}
                  <a href="#promoModal8" data-lightbox="inline" class="btn btn-default btn btn-xs bg-light pl-10 pr-10">Donate</a>
                </li>
                <li class="mt-sm-10 mb-sm-10">
                  <a href="#promoModal9" data-lightbox="inline" class="btn btn-default btn btn-xs bg-light pl-10 pr-10">Volunteer</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.main-nav')
  </header>
  <div id="promoModal8" class="modal-promo-box mfp-hide" data-bg-img="img/gallery-lg2.jpg">
    <form action="{{ route('stripe.pay') }}" method="post">
       {{csrf_field()}}
       <div class="billing-details">
          <h3 class="mb-30"> Make A Quick Donation</h3>
          <div class="row">
            <div class="col-md-12">
                <input  type="text" class="form-control" placeholder="Enter Your Name" required  name="name">
             </div>
          </div>
          <div class="row">
             <div class="col-md-6">
                <div class="form-group">
                   <input  type="email" placeholder="example@email.com" class="form-control" required name="email">
                </div>
             </div>
             <div class="col-md-6">
                <div class="form-group">
                   <input type="number" name="amount" placeholder="1000" class="form-control required email" required>
                </div>
             </div>

          </div>
       </div>
       <div class="col-md-12">
          <div class="text-right">
             <button type="submit"  class="btn btn-dark btn-theme-colored btn-flat mr-5">Donate</button>
          </div>
       </div>
    </form>
 </div>

 <div id="promoModal9" class="modal-promo-box mfp-hide" data-bg-img="img/gallery-lg2.jpg">
    <form action="{{route('become.volunteer.post')}}" method="post">
       {{csrf_field()}}
       <div class="billing-details">
          <h3 class="mb-30"> Become A Volunteer</h3>
          <div class="row">
             <div class="form-group col-md-6">
                <input  name="name" id="name"  type="text" class="form-control" placeholder="Full Name" required>
             </div>
             <div class="col-md-6">
                <div class="form-group">
                   <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone Number" required>
                </div>
             </div>
             <div class="col-md-6">
                <div class="form-group">
                   <input name="email" id="email" type="email" placeholder="Email Address" class="form-control" required>
                </div>
             </div>
             <div class="col-md-6">
                <div class="form-group">
                   <input name="image" id="image" class="form-control required" type="file" placeholder="Upload Photo" required>
                </div>
             </div>
             <div class="col-md-4">
                <div class="form-group">
                    <select id="form_branch" name="sex" class="form-control required">
                       <option value="">Select Gender</option>
                       <option value="Yes">Yes</option>
                       <option value="No">No</option>
                       <option value="Other">Other</option>
                    </select>
                </div>
             </div>
             <div class="col-md-8">
                <div class="form-group">
                    <select id="form_branch" name="publish" class="form-control required">
                        <option value="">Publish( profile to be displayed on our website?)</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                     </select>
                </div>
             </div>
             <div class="col-md-5">
                <div class="form-group">
                    <select id="form_branch" name="nationality" class="form-control required">
                        <option value="">Select Nationality</option>

                        @foreach($countries as $country)
                        <option value="{{$country->title}}">{{ ucfirst($country->title) }}</option>
                        @endforeach
                     </select>
                </div>
             </div>
             <div class="col-md-7">
                <div class="form-group">
                   <input name="address" id="address" type="text" placeholder="Home Enter Address" class="form-control">
                </div>
             </div>
             <div class="col-md-12">
                <div class="form-group">
                    <textarea id="form_message" name="purpose" class="form-control required" rows="3" required placeholder="Why do you want to become a volunteer?"></textarea>
                </div>
             </div>
          </div>
       </div>
       <div class="col-md-12">
          <div class="text-right">
             <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5">Submit</button>
          </div>
       </div>
    </form>
 </div>
