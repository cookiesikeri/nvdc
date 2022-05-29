@extends('layouts.app')
@section('title')
Payment Successful
@endsection
@section('content')


<div class="container position-relative p-0 mt-90" style="max-width: 700px;">

    <div class="section-content bg-white p-30">
        <div class="row">
            <div class="col-md-12">
            <img src="{{asset('img/check_mark.png')}}" height="150" width="150" style="float: center">
          <h2 class="mt-0 pt-5"> Payment Successful</h2>
          <hr>
          <h5>Thank you for your donation and God bless you.</h5>

        </div>
    </div>
</div>
<button title="Close (Esc)" type="button" class="mfp-close mt-10">×</button>
</div>
</section>
  @endsection
