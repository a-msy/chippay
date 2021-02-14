@extends('layouts.common')
@include('layouts.header')
@section('ogimage')
    <meta property="og:image" content="{{ asset('shop/'.$s->avatar) }}">
@endsection
@section('title',$s->shopname)
@section('content')
    <section>
        <div class="shop-img">
            <div class="grade">
            </div>
            @if($s->avatar != "default.jpg")
                <img src="{{asset('shop/'.$s->avatar)}}">
            @else
                <img src="{{asset('shop/default.jpg')}}">
            @endif
        </div>
    </section>
    <section>
        <div class="shop">
            <div class="container">
                <h1>
                    {{$s->shopname}}
                </h1>
                <p style="color: var(--themecolor);">
                    <i class="material-icons">restaurant</i>
                    @if($s->genre == 0)その他,
                    @elseif($s->genre == 1)中華,
                    @elseif($s->genre == 2)和食,
                    @elseif($s->genre == 3)イタリアン,
                    @elseif($s->genre == 4)フレンチ,
                    @endif
                    {{$s->maindish}}
                </p>
            </div>
        </div>
        <div class="container p-0">
            <div class="bg-grey bg-title">
                <h1>店舗詳細</h1>
            </div>
        </div>
        <div class="container shop-info">
            <p>{{$s->about}}</p>
            <p><i class="material-icons">room</i><span>住所</span><br>{{$s->addr}}</p>
            <p><i class="material-icons">access_time</i><span>営業時間</span><br>{{$s->time}}</p>
            {{--            <p><i class="material-icons">local_phone</i>{{$s->phone}}</p>--}}
            {{--            <p><i class="material-icons">public</i><a href="{{$s->hp}}">{{$s->hp}}</a></p>--}}
            <p><i class="material-icons">today</i><span>店休日</span><br>{{$s->yasumi}}</p>
        </div>
        <div class="container p-0">
            <div class="bg-grey bg-title">
                <h1>メニュー Menu</h1>
            </div>
        </div>
        <div class="menu">
            <div class="container">
                <div class="row">
                    @foreach($menu as $m)
                        <div class="col-md-6 menu-cell-out">
                            <a href="{{route('menu.detail',['id'=>$m->id])}}">
                                <div class="menu-cell">
                                    <div class="menu-cell-img ">
                                        <img src="{{asset('menu/'.$m->avatar)}}">
                                    </div>
                                    <div class="menu-cell-info menu-name">
                                        <p class="ellipsis font-weight-bold">{{$m->menu}}</p>
                                        <p class="ellipsis">￥{{$m->value}}</p>
                                        <p class="ellipsis">{{$m->detail}}</p>
                                    </div>
{{--                                    <div data-menuid="{{$m->id}}">--}}
{{--                                        <a href="#" class="like">--}}
{{--                                            {{ Auth::user()->likes()->where('menu_id',$m->id)->first() ? Auth::user()->likes()->where('menu_id',$m->id)->first()->like == true ? 'Liked!!!' : 'Like' : 'Like' }}--}}
{{--                                        </a>--}}
{{--                                        <a href="#" class="like">--}}
{{--                                            {{ Auth::user()->likes()->where('menu_id',$m->id)->first() ? Auth::user()->likes()->where('menu_id',$m->id)->first()->like == false ? 'DisLiked!!!' : 'DisLike' : 'DisLike' }}--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="order">
                <a href="https://lin.ee/3QAmxYzjV">
                    <i class="material-icons">touch_app</i>今すぐLINEでオーダー
                </a>
            </div>
        </div>
    </section>
    {{--    <section>--}}
    {{--        <div class="col-md-12">--}}
    {{--            <h2 class="font-weight-bold" style="color:var(--themecolor);">寄付に対するリターン</h2>--}}
    {{--            @if(isset($s->back))--}}
    {{--                <p class="">{{$s->back}}</p>--}}
    {{--            @else--}}
    {{--                <p class="">特になし</p>--}}
    {{--            @endif--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-4">--}}
    {{--                    @if(isset($s->paypay))--}}
    {{--                        <div class="pay-box">--}}
    {{--                            <h3 class="text-center">PayPay</h3>--}}
    {{--                            <p class="text-center">{{$s->paypay}}</p>--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                </div>--}}

    {{--                <div class="col-md-4">--}}
    {{--                    @if(isset($s->kyash))--}}
    {{--                        <div class="pay-box">--}}
    {{--                            <h3 class="text-center">kyash</h3>--}}
    {{--                            <p class="text-center">{{$s->kyash}}</p>--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                </div>--}}

    {{--                <div class="col-md-4">--}}
    {{--                    @if(isset($s->paypal))--}}
    {{--                        <div class="pay-box">--}}
    {{--                            <h3 class="text-center">PayPal</h3>--}}
    {{--                            <p class="text-center">{{$s->paypal}}</p>--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                </div>--}}
    {{--                <div class="col-md-4">--}}
    {{--                    @if(isset($s->bitcoin))--}}
    {{--                        <div class="pay-box">--}}
    {{--                            <h3 class="text-center">Bitcoin</h3>--}}
    {{--                            <p class="text-center">{{$s->bitcoin}}</p>--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="row">--}}
    {{--            @if(Auth::guard('user')->user())--}}
    {{--                <div class="col-md-8 pop">--}}
    {{--                    <h2 class="font-weight-bold" style="color:var(--themecolor);">リターン申請</h2>--}}
    {{--                    <p>寄付をした方はこちらからリターン申請を出しましょう！</p>--}}
    {{--                    <form method="POST" action="{{ url('user/chipsend') }}">--}}
    {{--                        @csrf--}}
    {{--                        <input type="hidden" value="{{Auth::guard('user')->id()}}" name="userid">--}}
    {{--                        <input type="hidden" value="{{$s->id}}" name="adminid">--}}
    {{--                        <div class="form-group">--}}
    {{--                            <label for="comment" class="font-weight-bold">コメント</label>--}}
    {{--                            <textarea name="comment" class="form-control" placeholder="応援コメントを送れます！"></textarea>--}}
    {{--                        </div>--}}
    {{--                        <div class="form-group">--}}
    {{--                            <label for="kindofpay" class="font-weight-bold">寄付した種類</label>--}}
    {{--                            <select name="kindofpay" class="form-control" required>--}}
    {{--                                @if(isset($s->paypay))--}}
    {{--                                    <option value="0" selected>paypay</option>--}}
    {{--                                @endif--}}
    {{--                                @if(isset($s->kyash))--}}
    {{--                                    <option value="1">kyash</option>--}}
    {{--                                @endif--}}
    {{--                                @if(isset($s->paypal))--}}
    {{--                                    <option value="2">paypal</option>--}}
    {{--                                @endif--}}
    {{--                                @if(isset($s->bitcoin))--}}
    {{--                                    <option value="3">Bitcoin</option>--}}
    {{--                                @endif--}}
    {{--                            </select>--}}
    {{--                        </div>--}}
    {{--                        <div class="form-group">--}}
    {{--                            <label for="number" class="font-weight-bold">寄付した額</label>--}}
    {{--                            <input type="number" name="value" class="form-control" required>--}}
    {{--                        </div>--}}
    {{--                        <div class="form-group">--}}
    {{--                            <button type="submit" class="btn btn-chip">提出する</button>--}}
    {{--                        </div>--}}
    {{--                        <div class="form-group">--}}
    {{--                            受諾されない場合運営までお知らせください--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            @else--}}
    {{--                <div class="col-md-5">--}}
    {{--                    <h2 class="font-weight-bold" style="color:var(--themecolor);">リターン申請</h2>--}}
    {{--                    <p>寄付をした方はこちらからリターン申請を出しましょう！</p>--}}
    {{--                    <a href="{{route('user.login')}}">--}}
    {{--                        <button class="btn btn-chip">--}}
    {{--                            リターン申請を送るにはログインが必要です--}}
    {{--                        </button>--}}
    {{--                    </a>--}}
    {{--                </div>--}}
    {{--            @endif--}}
    {{--            <div class="col-md-4 board">--}}
    {{--                <h2 class="font-weight-bold" style="color:var(--themecolor);">届いたコメント</h2>--}}
    {{--                @foreach($c as $com)--}}
    {{--                    <div class="comment">--}}
    {{--                        {{$com->comment}}--}}
    {{--                    </div>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
@endsection
@section('addjs')
    <script src="{{asset('js/like.js')}}"></script>
    <script type="text/javascript">
        var token = '{{Session::token()}}';
        var urlLike = '{{route('like')}}';
    </script>
@endsection
@include('layouts.footer')
