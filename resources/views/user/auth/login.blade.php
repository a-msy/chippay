@extends('layouts.common')
@include('layouts.header')
@section('content')
    <section>
        <div class="container">
            <h1>ログイン</h1>
            <div class="row justify-content-center mt-5">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('user.login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-12 col-form-label">{{ __('メールアドレス') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label">{{ __('パスワード') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required
                                       autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('ログインしたままにする') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 mb-5 text-center">
                                @if (Route::has('user.password.request'))
                                    <a href="{{ route('user.password.request') }}">
                                        {{ __('パスワードを忘れた方へ') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-chip-border">
                                    {{ __('ログイン') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@include('layouts.footer')
