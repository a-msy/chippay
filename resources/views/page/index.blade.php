@extends('layouts.common')
@include('layouts.header')
@section('addcss')
@endsection
@section('content')
    {{--    <div class="maps">--}}
    {{--        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1rHM15_p2iSAZaHaQcnH9iQ7p-dmhxpDM"></iframe>--}}
    {{--    </div>--}}
    <div id="map" style="width: 100%; height: 600px;"></div>
    {{--https://appli-world.jp/posts/44--}}
    <section>
        <div class="container p-0">
            <div class="bg-grey bg-title">
                <h1>岡山のフードデリバリー</h1>
            </div>
        </div>
        <article>
            <div class="container">
                <div class="carousel" data-flickity>
                    @foreach($all as $a)
                        <div class="carousel-cell">
                            <a href="{{route('shop.detail',['id'=>$a->id])}}">
                                <img src="{{asset('shop/'.$a->avatar.'?'.now())}}" alt="{{$a->shopname}}">
                                <h2 class="ellipsis">{{$a->shopname}}</h2>
                                <p class="ellipsis" style="color: var(--themecolor);">
                                    <i class="material-icons">restaurant</i>
                                    @if($a->genre == 0)その他,
                                    @elseif($a->genre == 1)中華,
                                    @elseif($a->genre == 2)和食,
                                    @elseif($a->genre == 3)イタリアン,
                                    @elseif($a->genre == 4)フレンチ,
                                    @endif
                                    {{$a->maindish}}
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>
    </section>
    <section>
        <div class="container p-0">
            <div class="bg-grey bg-title">
                <h1>Fujita Eatsの新着</h1>
            </div>
        </div>
        <article>
            <div class="container">
                <div class="carousel" data-flickity>
                    @foreach($new as $a)
                        <div class="carousel-cell">
                            <a href="{{route('shop.detail',['id'=>$a->id])}}">
                                <img src="{{asset('shop/'.$a->avatar.'?'.now())}}">
                                <h2 class="ellipsis">{{$a->shopname}}</h2>
                                <p class="ellipsis" style="color: var(--themecolor);">
                                    <i class="material-icons">restaurant</i>
                                    @if($a->genre == 0)その他,
                                    @elseif($a->genre == 1)中華,
                                    @elseif($a->genre == 2)和食,
                                    @elseif($a->genre == 3)イタリアン,
                                    @elseif($a->genre == 4)フレンチ,
                                    @endif
                                    {{$a->maindish}}
                                </p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>
    </section>
    <section>
        <div class="container p-0">
            <div class="bg-grey bg-title">
                <h1>ジャンルからフードを探す</h1>
            </div>
        </div>
        <article>
            <div class="container back-syasen">
                <div class="carousel" data-flickity>
                    <div class="carousel-cell genre">
                        <a href="{{route('shop.chinese')}}">
                            <img src="{{asset('img/cyuka.jpg')}}" alt="中華">
                            <p>中華</p>
                        </a>
                    </div>
                    <div class="carousel-cell genre">
                        <a href="{{route('shop.japanese')}}">
                            <img src="{{asset('img/wa.jpg')}}" alt="和食">
                            <p>和食</p>
                        </a>
                    </div>
                    <div class="carousel-cell genre">
                        <a href="{{route('shop.italian')}}">
                            <img src="{{asset('img/italian.jpg')}}" alt="イタリアン">
                            <p>イタリアン</p>
                        </a>
                    </div>
                    <div class="carousel-cell genre">
                        <a href="{{route('shop.french')}}">
                            <img src="{{asset('img/french.jpg')}}" alt="フレンチ">
                            <p>フレンチ</p>
                        </a>
                    </div>
                    <div class="carousel-cell genre">
                        <a href="{{route('shop.etc')}}">
                            <img src="{{asset('img/etc.jpg')}}" alt="その他">
                            <p>その他</p>
                        </a>
                    </div>
                </div>
            </div>
        </article>
    </section>
@endsection
@section('addjs')
    <script type="text/javascript">
        var addr = [
                @foreach($marker as $m)
            {
                addr: '{{str_replace("\r\n", '', $m->addr) }}',
                name: '{{  str_replace("\r\n", '', $m->shopname) }}',
                id: '{{$m->id}}',
                about: '{{  str_replace("\r\n", '', $m->about) }}',
                lat: {{$m->lat}},
                lng: {{$m->lng}}
            },
            @endforeach
        ];
    </script>
    <script src="{{asset('js/GoogleMap.js')}}" type="text/javascript"></script>
    @if ( config('app.debug'))
        {{--        テスト環境, ローカル環境用の記述--}}
        <script src="https://maps.google.com/maps/api/js?key=AIzaSyDQ0dB4UfOFFYkGunwbhhd6osFBe4KGLfQ&callback=initMap"
                async defer></script>
    @else
        {{--        本番環境用の記述--}}
        <script src="https://maps.google.com/maps/api/js?key=AIzaSyDowEqD0rg7pVi8r4TafZcZ9w7pzbT-MFk&callback=initMap"
                async defer></script>
    @endif
    <script>
        jQuery(function ($) {
            $('.carousel').flickity({});
        });
    </script>
@endsection
@include('layouts.footer')
