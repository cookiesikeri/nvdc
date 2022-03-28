<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') | {{$site->site_name}} </title>

        @include('layouts.css')
    </head>
    <body class="demo-5">
        <!--WRAPPER START-->
        <div class="wrapper">

            @include('layouts.main-nav')

            @if(Request::is('/'))
			<!--CITY MAIN BANNER START-->
            @include('partials.slider')
			<!--CITY MAIN BANNER END-->
            @endif
            @yield('content')


            @include('layouts.footer')
		</div>
		 <!--WRAPPER END-->
        <!--Jquery Library-->
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
