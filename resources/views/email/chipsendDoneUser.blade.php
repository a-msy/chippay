<!DOCTYPE html>
<html lang="ja">
<body>
<h1>
    バック申請が以下の内容で受諾されました．
</h1>
<p>
{{$admin->name}}さんからバック申請が受諾されました．送信した申請はマイページから確認できます！
</p>
<h2>----- 内容 -----</h2>
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
    寄付額：{{$chip->value}}<br>送信先アカウント（
    @if($chip->kind_of_pay == 0)
        {{" PayPayID:".$admin->paypay}}
    @elseif($chip->kind_of_pay == 1)
        {{" KyashID:".$admin->kyash}}
    @elseif($chip->kind_of_pay == 2)
        {{" paypal:".$admin->paypal}}
    @else
        {{" Bitcoin:".$admin->Bitcoin}}
    @endif
    ）
</p>
<p>
    お店からの感謝コメント：{{$request->kansya}}
</p>
<br>
<a href="{{url('user/register')}}">ちっぷぺいマイページ</a>
</body>
</html>
