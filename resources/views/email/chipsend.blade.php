<!DOCTYPE html>
<html lang="ja">
<body>
<h1>
    バック申請を受け取りました！
</h1>
<p>
{{$user->name}}さんからちっぷを受け取りました．店主さんページから確認できます！
</p>
<p>
    寄付者メールアドレス：{{$user->email}}
</p>
<p>
    バック内容:<br>
    {{$chip->kind_of_back}}
</p>
<p>
    寄付額：{{$request->value}}<br>
    送信元アカウント：（
    @if($request->kind_of_pay == 0)
        {{" PayPayID:".$user->paypay}}
    @elseif($request->kind_of_pay == 1)
        {{" KyashID:".$user->kyash}}
    @elseif($request->kind_of_pay == 2)
        {{" paypal:".$user->paypal}}
    @else
        {{" Bitcoin:".$user->Bitcoin}}
    @endif
    ）
</p>
<p>
    コメント：{{$request->comment}}
</p>
<br>
<a href="{{url('admin/register')}}">ちっぷぺい店主さんページ</a>
</body>
</html>
