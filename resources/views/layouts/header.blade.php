@section('header')
    <header>
        <nav class="navbar navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img alt="chippayのロゴ"
                                                                   src="{{asset('img/logo.png')}}"
                                                                   width="auto" height="30px"></a>
                <div class="ml-auto mr-2">
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                        aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                    <i class="navbar-toggler-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav text-right">
                        @guest()
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('user.register')}}">
                                    <button class="btn btn-chip">
                                        ユーザ登録
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('user.login')}}">
                                    <button class="btn btn-chip-border">
                                        ログイン
                                    </button>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a data-toggle="modal" data-target="#modal2" href="#modal2" class="nav-link">
                                    <button type="button" class="btn btn-chip-border">
                                        店舗登録
                                    </button>
                                </a>
                            </li>
                        @endguest
                        @auth('user')
                            <li class="nav-item">
                                <a href="{{url('/user/home')}}" class="nav-link">ユーザマイページ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('ユーザログアウト') }}
                                </a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endauth
                        @auth('admin')
                            <li class="nav-item">
                                <a href="{{url('/admin/home')}}" class="nav-link">管理者マイページ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('管理者ログアウト') }}
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="modal fade" id="modal2" tabindex="-1"
         role="dialog" aria-labelledby="label1" aria-hidden="true">
        <div class="container">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label1">店舗登録</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-4 mt-4 text-center">
                                <h2>
                                    公式LINEから登録申請
                                </h2>
                                <p>
                                    <a href="https://lin.ee/2E1uuJvO6">
                                        コチラ
                                    </a>から登録申請を行ってください！
                                </p>
                                <img src="{{asset('img/register.png')}}" alt="新規登録"
                                     class="register-img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Session::has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger text-center" role="alert">
            {{ session('error') }}
        </div>
    @endif
@endsection
