@extends('layouts.common')
@include('layouts.header')
@section('content')
    @if(isset($message))
        <div class="alert alert-info">
            {{$message}}
        </div>
    @endif
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{$user->name}}さんのマイページ</h1>
                </div>
                <div class="col-md-12 mt-5">
                    <form action="{{ route('user.home.update', ['id'=>Auth::id()]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
                        </div>
                        <div class="form-group">
                            <label for="addr">配送先</label>
                            <input type="text" name="addr" class="form-control" value="{{$user->addr}}">
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="paypay">PayPayID</label>--}}
{{--                            <input class="form-control" name="paypay" type="text" value="{{$user->paypay}}">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="paypal">PaypalID</label>--}}
{{--                            <input class="form-control" name="paypal" type="text" value="{{$user->paypal}}">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="kyash">kyashID</label>--}}
{{--                            <input class="form-control" name="kyash" type="text" value="{{$user->kyash}}">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="bitcoin">bitcoin送金者を特定できるもの</label>--}}
{{--                            <input class="form-control" name="bitcoin" type="text" value="{{$user->bitcoin}}">--}}
{{--                        </div>--}}
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-chip">更新する</button>
                        </div>
                    </form>
                </div>
            </div>
{{--            <div class="row mt-5">--}}
{{--                <div class="col-md-12 mt-5">--}}
{{--                    <h1>送ったバック申請</h1>--}}
{{--                </div>--}}
{{--                <div class="col-md-12 table-responsive">--}}
{{--                    <table class="table">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th scope="col">提出先</th>--}}
{{--                            <th scope="col">バック内容</th>--}}
{{--                            <th scope="col">寄付額</th>--}}
{{--                            <th scope="col">応援コメント</th>--}}
{{--                            <th scope="col">状態</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($data as $d)--}}
{{--                            <tr>--}}
{{--                                <th scope="row">{{$d->admin->name}} | {{$d->admin->email}}</th>--}}
{{--                                <td>--}}
{{--                                    {{$d->kind_of_back}}--}}
{{--                                </td>--}}
{{--                                <td>{{$d->value}}--}}
{{--                                    @if($d->kind_of_pay == 0)--}}
{{--                                        {{" PayPay"}}--}}
{{--                                    @elseif($d->kind_of_pay == 1)--}}
{{--                                        {{" Kyash"}}--}}
{{--                                    @elseif($d->kind_of_pay == 2)--}}
{{--                                        {{" paypal"}}--}}
{{--                                    @else--}}
{{--                                        {{" Bitcoin"}}--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td>{{$d->comment}}</td>--}}
{{--                                @if($d->done != 0)--}}
{{--                                    <td>お店からのコメント:{{$d->kansya}}</td>--}}
{{--                                @else--}}
{{--                                    <td>未受諾</td>--}}
{{--                                @endif--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <section class="text-right">
        <a href="{{route('shop.index')}}">
            <button class="btn btn-chip-border">トップページへ</button>
        </a>
    </section>
@endsection
@include('layouts.footer')
