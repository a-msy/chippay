@extends('layouts.common')
@include('layouts.header')
@section('content')
    <section>
        <div class="container p-0">
            <div class="bg-grey bg-title">
                <h1>検索</h1>
            </div>
        </div>
        <div class="container">
            <div class="search-box">
                <a href="{{route('shop.chinese')}}">中華</a>
                <a href="{{route('shop.japanese')}}">和食</a>
                <a href="{{route('shop.italian')}}">イタリアン</a>
                <a href="{{route('shop.french')}}">フレンチ</a>
                <a href="{{route('shop.etc')}}">その他</a>
            </div>
        </div>
        <div class="container p-0">
            <div class="bg-grey bg-title">
                <h1>@if($various){{$various}}@endifお店一覧</h1>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                @foreach($shops as $s)
                    <div class="col-md-4 mb-3">
                        <div class="carousel-cell carousel-cell-search">
                            <a href="{{route('shop.detail',['id'=>$s->id])}}">
                                <img src="{{asset('shop/'.$s->avatar)}}">
                                <h2 class="ellipsis">{{$s->shopname}}</h2>
                                <p class="ellipsis" style="color: var(--themecolor);">
                                    <i class="material-icons">restaurant</i>
                                    @if($s->genre == 0)その他,
                                    @elseif($s->genre == 1)中華,
                                    @elseif($s->genre == 2)和食,
                                    @elseif($s->genre == 3)イタリアン,
                                    @elseif($s->genre == 4)フレンチ,
                                    @endif
                                    {{$s->maindish}}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@include('layouts.footer')
