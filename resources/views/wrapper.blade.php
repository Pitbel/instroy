<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="{!! Meta::get('description') !!}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{!! Meta::get('title') !!}</title>

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/leaflet-gesture-handling.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/leaflet.markercluster.css') }}">
    <link rel="stylesheet" href="{{ asset('css/leaflet.markercluster.default.css') }}">
    <!-- Slider Revolution CSS Files -->
    <link rel="stylesheet" href="{{ asset('revolution/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('revolution/css/layers.css') }}">
    <link rel="stylesheet" href="{{ asset('revolution/css/navigation.css') }}">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="{{ asset('css/search.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/maps.css') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" id="color" href="{{ asset('css/colors/cyan.css') }}">
</head>

<body class="inner-pages">

@include('common.header')

@yield('content')

@include('common.footer')

<!-- START PRELOADER -->
@if(request()->route()->uri == '/')
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>
@endif
<!-- END PRELOADER -->

<!-- ARCHIVES JS -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script src="{{ asset('js/tether.min.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/transition.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/fitvids.js') }}"></script>
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('js/smooth-scroll.min.js') }}"></script>
<script src="{{ asset('js/lightcase.js') }}"></script>
<script src="{{ asset('js/search.js') }}"></script>
<script src="{{ asset('js/owl.carousel.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/jquery.form.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/forms-2.js') }}"></script>
<script src="{{ asset('js/leaflet.js') }}"></script>
<script src="{{ asset('js/leaflet-gesture-handling.min.js') }}"></script>
<script src="{{ asset('js/leaflet-providers.js') }}"></script>
<script src="{{ asset('js/leaflet.markercluster.js') }}"></script>
<script src="{{ asset('js/color-switcher.js') }}"></script>

@yield('script')

@if(request()->route()->uri == '/')
<!-- MAIN JS -->
<script src="{{ asset('js/script.js') }}"></script>
@endif
</body>

</html>
