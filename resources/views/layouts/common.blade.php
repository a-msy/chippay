<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @hasSection('title')
        <title>@yield('title') | Fujita Eats</title>
        <meta property="og:title" content="@yield('title') | FujitaEats">
    @else
        <title>Fujita Eats</title>
        <meta property="og:title" content="Fujita Eats">
    @endif

    <meta property="og:description" content="岡山のフードデリバリーならFujita Eats">
    <meta property="og:type" content="website">
    @hasSection('ogimage')
        @yield('ogimage')
    @else
        <meta property="og:image" content="{{ asset('img/fujita_eats_og.jpg') }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    {{--    <link href="{{ mix('css/app.css')}}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/my-norun.css').'?'.now()}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/Flickity.css')}}"/>
    @yield('addcss')
</head>
<body>
@yield('header')
<div id="app">
    @yield('content')
</div>
@yield('footer')
<script src="{{asset('js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="{{asset('js/flickity.pkgd.min.js')}}"></script>
@yield('addjs')
</body>
</html>
