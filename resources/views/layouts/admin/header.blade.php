@section('header')
    <header>
        <nav class="navbar navbar-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}"><img alt="Fujita Eatsのロゴ"
                                                                   src="{{asset('img/logo.png')}}"
                                                                   width="auto" height="30px"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                        aria-controls="navbar" aria-expanded="false" aria-label="ナビゲーションの切替">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav text-right">
                        @guest()
                            <li class="nav-item">
                                <a class="nav-link" href="/">
                                    {{ __('お店一覧') }}
                                </a>
                            </li>
                        @endguest
                        @auth('admin')
                            <li class="nav-link">
                                <a style="text-decoration: none; color: var(--themecolor); font-weight: bold;" href="{{route('shop.detail',['id'=>Auth::id()])}}">店舗プレビュー</a>
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
    @if(Session::has('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger text-center" role="alert">
            {{ session('error') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
