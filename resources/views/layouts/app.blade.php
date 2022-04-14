<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="{!! Str::limit($general->about_content,100) !!}"/>
<meta name="keywords" content=" charity, nonprofit, church, crowdfunding, donate"/>
<meta name="author" content="eben"/>

<!-- Page Title -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title') | {{$site->site_name}} </title>

<!-- Favicon and Touch Icons -->
<link href="{{ asset($site->logo) }}" rel="shortcut icon" type="image/png">
<link href="{{ asset($site->logo) }}" rel="apple-touch-icon">
<link href="{{ asset($site->logo) }}" rel="apple-touch-icon" sizes="72x72">
<link href="{{ asset($site->logo) }}" rel="apple-touch-icon" sizes="114x114">
<link href="{{ asset($site->logo) }}" rel="apple-touch-icon" sizes="144x144">

@include('layouts.css')



<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="container-1340px has-side-panel side-panel-right">

<div class="side-panel-body-overlay"></div>

<div id="wrapper" class="clearfix">
  <!-- Header -->
  @include('layouts.main-nav')

  <!-- Start main-content -->
  <div class="main-content-area">
    <!-- Section: home -->
    @if(Request::is('/'))
    @include('layouts.slider')
    @endif

    @yield('content')


  </div>
  <!-- end main-content -->

  @include('layouts.footer')
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
@include('layouts.js')
<script>
    @if(Session::has('success'))
    new Noty({
        type: 'success',
        layout: 'topRight',
        text: '{{Session::get('success')}}'
    }).show();
    @endif

    @if(Session::has('fail'))
    new Noty({
        type: 'error',
        layout: 'topRight',
        text: '{{Session::get('fail')}}'
    }).show();
    @endif

    @if(Session::has('error'))
    new Noty({
        type: 'error',
        layout: 'topRight',
        text: '{{Session::get('error')}}'
    }).show();
    @endif

</script>

@yield('javascripts')

</body>
</html>
