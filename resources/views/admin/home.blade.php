@extends('layouts.common')
@include('layouts.admin.header')
@section('content')
    <section>
        <div class="shop-img">
            @if($admin->avatar != "default.jpg")
                <img src="{{asset('shop/'.$admin->avatar.'?'.now())}}">
            @else
                <img src="{{asset('shop/default.jpg')}}">
            @endif
        </div>
        <div class="container">
            <form action="{{route('admin.photo')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" name="avatar" required>
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </section>
    <section>
        <div class="menu">
            <div class="container p-0">
                <div class="bg-grey bg-title">
                    <h1>メニュー Menu</h1>
                </div>
            </div>
            <div class="container">
                <p class="font-weight-bold">
                    テイクアウト・デリバリーメニューの追加は
                    <a href="{{ route('admin.shopmenu.index') }}">
                        <button class="btn btn-chip">コチラ</button>
                    </a>
                </p>
            </div>
        </div>
    </section>
    <section>
        <div class="container p-0">
            <div class="bg-grey bg-title">
                <h1>店舗詳細</h1>
            </div>
        </div>
        <div class="container">
            @if($admin->public === 0)
                <div class="alert alert-warning text-center">
                    現在の状態は非公開です
                    <form action="{{ route('admin.home.change', ['id'=>Auth::id()]) }}" method="POST"
                          class="text-center">
                        @csrf
                        <button type="submit" class="btn btn-primary">公開する</button>
                    </form>
                </div>
            @else
                <div class="alert alert-success text-center">
                    現在の状態は公開中です
                    <form action="{{ route('admin.home.dechange', ['id'=>Auth::id()]) }}" method="POST"
                          class="text-center">
                        @csrf
                        <button type="submit" class="btn btn-danger">非公開にする</button>
                    </form>
                </div>
            @endif
        </div>
    </section>
    <section>
        <form action="{{ route('admin.home.update', ['id'=>Auth::id()]) }}" method="POST">
            @csrf
            <div class="form-group container">
                <label for="name">管理者名</label>
                <input class="form-control" name="name" type="text" value="{{$admin->name}}">
            </div>
            <div class="form-group mb-5 container">
                <label for="email">メールアドレス</label>
                <input class="form-control" name="email" type="email" value="{{$admin->email}}">
            </div>
            <div class="shop">
                <div class="container">
                    <div class="form-group">
                        <label for="shopname">店舗名</label>
                        <input class="form-control" name="shopname" type="text" value="{{$admin->shopname}}">
                    </div>
                    <div class="form-group">
                        <label for="genre" style="color: var(--themecolor);"><i class="material-icons">restaurant</i>ジャンル</label>
                        <select class="form-control" name="genre">
                            <option value="0" @if($admin->genre == 0) selected @endif>その他</option>
                            <option value="1" @if($admin->genre == 1) selected @endif>中華</option>
                            <option value="2" @if($admin->genre == 2) selected @endif>和食</option>
                            <option value="3" @if($admin->genre == 3) selected @endif>イタリアン</option>
                            <option value="4" @if($admin->genre == 4) selected @endif>フレンチ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="maindish">メインディッシュ</label>
                        <input class="form-control" type="text" name="maindish" value="{{$admin->maindish}}"
                               placeholder="例：ピザ，パスタ">
                    </div>
                </div>
            </div>
            <div class="container shop-info">
                <div class="form-group">
                    <label for="about">店舗情報</label>
                    <textarea class="form-control" name="about">{{$admin->about}}</textarea>
                </div>
                <div class="form-group">
                    <label for="addr"><i class="material-icons">room</i>住所</label>
                    <input class="form-control" name="addr" type="text" value="{{$admin->addr}}">
                </div>
                <div class="form-group">
                    <label for="time"><i class="material-icons">access_time</i>営業時間</label>
                    <input class="form-control" name="time" type="text" value="{{$admin->time}}">
                </div>
                <div class="form-group">
                    <label for="yasumi"><i class="material-icons">today</i>店休日</label>
                    <input class="form-control" name="yasumi" type="text" value="{{$admin->yasumi}}">
                </div>
            </div>
            {{--            <div class="form-group">--}}
            {{--                <label for="park">駐車場</label>--}}
            {{--                <input type="radio" name="park" value="0" @if($admin->park == 0) checked @endif>無--}}
            {{--                <input type="radio" name="park" value="1" @if($admin->park == 1) checked @endif>有--}}
            {{--            </div>--}}
            {{--            <div class="form-group">--}}
            {{--                <label for="takeout">提供可能サービス</label>--}}
            {{--                <select class="form-control" name="takeout">--}}
            {{--                    <option value="0" @if($admin->takeout == 0) selected @endif>非対応</option>--}}
            {{--                    <option value="1" @if($admin->takeout == 1) selected @endif>テイクアウトOK</option>--}}
            {{--                    <option value="2" @if($admin->takeout == 2) selected @endif>デリバリーOK</option>--}}
            {{--                    <option value="3" @if($admin->takeout == 3) selected @endif>テイクアウト・デリバリーOK</option>--}}
            {{--                </select>--}}
            {{--            </div>--}}
            {{--            <div class="form-group">--}}
            {{--                <label for="area">提供可能エリア</label>--}}
            {{--                <textarea class="form-control" name="area" type="text">{{$admin->area}}</textarea>--}}
            {{--            </div>--}}
            {{--            <div class="form-group">--}}
            {{--                <label for="pay">実店舗での対応支払い方法</label>--}}
            {{--                @foreach($list as $key=>$value)--}}
            {{--                    <input type="checkbox" name="pay[]"--}}
            {{--                           value="{{$value}}" {{$checked[$key]}}>{{$value}}--}}
            {{--                @endforeach--}}
            {{--            </div>--}}
            {{--            <div class="form-group text-center mt-5">--}}
            {{--                <button type="submit" class="btn btn-chip">更新する</button>--}}
            {{--            </div>--}}
            {{--            <div class="form-group mb-5 mt-5">--}}
            {{--                <label for="back">寄付に対するリターン内容</label>--}}
            {{--                <textarea class="form-control" name="back" type="text"--}}
            {{--                          placeholder="寄付に対するリターンの内容を書いてください">{{$admin->back}}</textarea>--}}
            {{--            </div>--}}
            {{--            <div class="form-group mt-5">--}}
            {{--                <h2 class="">寄付口座</h2>--}}
            {{--            </div>--}}
            {{--            <div class="form-group">--}}
            {{--                <label for="paypay">PayPayのID</label>--}}
            {{--                <input class="form-control" name="paypay" type="text" value="{{$admin->paypay}}">--}}
            {{--            </div>--}}
            {{--            <div class="form-group">--}}
            {{--                <label for="paypal">PaypalのID</label>--}}
            {{--                <input class="form-control" name="paypal" type="text" value="{{$admin->paypal}}">--}}
            {{--            </div>--}}
            {{--            <div class="form-group">--}}
            {{--                <label for="kyash">kyashのID</label>--}}
            {{--                <input class="form-control" name="kyash" type="text" value="{{$admin->kyash}}">--}}
            {{--            </div>--}}
            {{--            <div class="form-group">--}}
            {{--                <label for="bitcoin">bitcoinウォレット</label>--}}
            {{--                <input class="form-control" name="bitcoin" type="text" value="{{$admin->bitcoin}}">--}}
            {{--            </div>--}}
            {{--            <div class="form-group text-center mt-5">--}}
            {{--                <button type="submit" class="btn btn-chip">更新する</button>--}}
            {{--            </div>--}}
            <div class="form-group text-center mt-5">
                <button type="submit" class="btn btn-chip">更新する</button>
            </div>
        </form>
        {{--        <div class="col-12 mt-5 mb-5 text-center">--}}
        {{--            @if($admin->auth != 1)--}}
        {{--                <div class="alert alert-warning text-center">--}}
        {{--                    認証を受けるためには、以下のボタンを押し偽物でないことを確認するためにお店の情報をはっきりと確認できる書類や，データ，お店のURL，各種リンクを貼り送信してください。--}}
        {{--                </div>--}}
        {{--                <a class="btn btn-outline-primary"--}}
        {{--                   href="mailto:chippay@alterrucks.com?subject=【ちっぷぺい】お店の認証確認について【ID:{{Auth::id()}} | {{$admin->name}}】">--}}
        {{--                    認証申請を出す--}}
        {{--                </a>--}}
        {{--            @endif--}}
        {{--        </div>--}}
    </section>
    {{--    <section>--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <h2>届いたリターン申請</h2>--}}
    {{--                </div>--}}
    {{--                <div class="col-md-12 table-responsive">--}}
    {{--                    <table class="table">--}}
    {{--                        <thead>--}}
    {{--                        <tr>--}}
    {{--                            <th scope="col">ユーザネーム</th>--}}
    {{--                            <th scope="col">受け取り額</th>--}}
    {{--                            <th scope="col">コメント</th>--}}
    {{--                            <th scope="col">お礼</th>--}}
    {{--                        </tr>--}}
    {{--                        </thead>--}}
    {{--                        <tbody>--}}
    {{--                        @foreach($getchipdata as $d)--}}
    {{--                            <tr>--}}
    {{--                                <th scope="row">{{$d->user->name}} | {{$d->user->email}}</th>--}}
    {{--                                <td>--}}
    {{--                                    {{$d->value}}--}}
    {{--                                    @if($d->kind_of_pay == 0)--}}
    {{--                                        {{" PayPayID:".$d->user->paypay}}--}}
    {{--                                    @elseif($d->kind_of_pay == 1)--}}
    {{--                                        {{" KyashID:".$d->user->kyash}}--}}
    {{--                                    @elseif($d->kind_of_pay == 2)--}}
    {{--                                        {{" paypal:".$d->user->paypal}}--}}
    {{--                                    @else--}}
    {{--                                        {{" Bitcoin:".$d->user->Bitcoin}}--}}
    {{--                                    @endif--}}
    {{--                                </td>--}}
    {{--                                <td>{{$d->comment}}</td>--}}
    {{--                                @if($d->done != 0)--}}
    {{--                                    <td>{{$d->kansya}}</td>--}}
    {{--                                @else--}}
    {{--                                    <td>--}}
    {{--                                        <form action="{{ route('admin.home.done',['id'=>$d->id]) }}" method="POST">--}}
    {{--                                            @csrf--}}
    {{--                                            <input type="hidden" name="userid" value="{{$d->user_id}}">--}}
    {{--                                            <div class="form-group">--}}
    {{--                                                <textarea type="text" placeholder="感謝を伝えましょう"--}}
    {{--                                                          name="kansya">{{$d->kansya}}</textarea>--}}
    {{--                                            </div>--}}
    {{--                                            <button type="submit" class="btn btn-chip">通知する</button>--}}
    {{--                                        </form>--}}
    {{--                                    </td>--}}
    {{--                                @endif--}}
    {{--                            </tr>--}}
    {{--                        @endforeach--}}
    {{--                        </tbody>--}}
    {{--                    </table>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}
@endsection
@include('layouts.footer')
