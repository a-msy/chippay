<!DOCTYPE html>
<html lang="ja">
<body>
<h1>
    バック申請を送信しました
</h1>
<p>
{{$admin->name}}さんへバック申請を贈りました．送信した申請はマイページから確認できます！
</p>
<h2>----- 送信先情報 -----</h2>
<p>
    お店の名前：{{$admin->name}}
</p>
<p>
    お店メールアドレス：{{$admin->email}}
</p>
<p>
    バック内容:<br>
    {{$chip->kind_of_back}}
</p>
<p>
    寄付額：{{$request->value}}<br>送信先アカウント（
    @if($request->kind_of_pay == 0)
        {{" PayPayID:".$admin->paypay}}
    @elseif($request->kind_of_pay == 1)
        {{" KyashID:".$admin->kyash}}
    @elseif($request->kind_of_pay == 2)
        {{" paypal:".$admin->paypal}}
    @else
        {{" Bitcoin:".$admin->Bitcoin}}
    @endif
    ）
</p>
<p>
    コメント：{{$request->comment}}
</p>
<br>
<a href="{{url('user/register')}}">ちっぷぺいマイページ</a>
</body>
</html>
