@extends('layouts.common')
@include('layouts.header')
@section('ogimage')
    <meta property="og:image" content="{{ asset('menu/'.$menu->avatar) }}">
@endsection
@section('title',$menu->menu)
@section('content')
    <section>
        <div class="shop-img">
            <div class="grade">
            </div>
            @if($menu->avatar != "default.jpg")
                <img src="{{asset('menu/'.$menu->avatar)}}">
            @else
                <img src="{{asset('menu/default.jpg')}}">
            @endif
        </div>
    </section>
    <section>
        <div class="shop">
            <div class="container">
                <h1>
                    {{$menu->menu}}
                </h1>
                <p style="color: gray;">
                    {{$menu->detail}}
                </p>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="order">
                <a href="https://lin.ee/3QAmxYzjV" class="text-center">
                    <i class="material-icons">touch_app</i>今すぐLINEでオーダー
                </a>
            </div>
        </div>
    </section>
@endsection
@section('addjs')
{{--    <script>--}}
{{--        var _window = $(window),--}}
{{--            _header = $('.site-header'),--}}
{{--            heroBottom;--}}

{{--        _window.on('scroll',function(){--}}
{{--            heroBottom = $('.hero').height();--}}
{{--            if(_window.scrollTop() > heroBottom){--}}
{{--                _header.addClass('fixed');--}}
{{--            }--}}
{{--            else{--}}
{{--                _header.removeClass('fixed');--}}
{{--            }--}}
{{--        });--}}

{{--        _window.trigger('scroll');--}}
{{--    </script>--}}
@endsection
@include('layouts.footer')
