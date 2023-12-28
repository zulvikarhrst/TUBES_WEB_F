@extends('layouts.app')

@section('content')
    {{--<div class="container">--}}
    {{--    <div class="row justify-content-center">--}}
    {{--        <div class="col-md-8">--}}
    {{--            <div class="card">--}}
    {{--                <div class="card-header">{{ __('Login') }}</div>--}}

    {{--                <div class="card-body">--}}
    {{--                    <form method="POST" action="{{ route('login') }}">--}}
    {{--                        @csrf--}}

    {{--                        <div class="row mb-3">--}}
    {{--                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

    {{--                            <div class="col-md-6">--}}
    {{--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

    {{--                                @error('email')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="row mb-3">--}}
    {{--                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

    {{--                            <div class="col-md-6">--}}
    {{--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}

    {{--                                @error('password')--}}
    {{--                                    <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--                                @enderror--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="row mb-3">--}}
    {{--                            <div class="col-md-6 offset-md-4">--}}
    {{--                                <div class="form-check">--}}
    {{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

    {{--                                    <label class="form-check-label" for="remember">--}}
    {{--                                        {{ __('Remember Me') }}--}}
    {{--                                    </label>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}

    {{--                        <div class="row mb-0">--}}
    {{--                            <div class="col-md-8 offset-md-4">--}}
    {{--                                <button type="submit" class="btn btn-primary">--}}
    {{--                                    {{ __('Login') }}--}}
    {{--                                </button>--}}

    {{--                                @if (Route::has('password.request'))--}}
    {{--                                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
    {{--                                        {{ __('Forgot Your Password?') }}--}}
    {{--                                    </a>--}}
    {{--                                @endif--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}
    <div class="container-fluid text-center min-vh-100">
        <div class="row min-vh-100">
            <div class="col d-flex align-items-center justify-content-center min-vh-100">
                <h1>Column 1</h1>
            </div>
            <div class="col d-flex align-items-center justify-content-center min-vh-100"
                 style="background-color: #56B9B3; color: #ffffff; border-top-left-radius: 40px;border-bottom-left-radius: 40px;">
                <div style="width: 100%; height: 100%; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 19px; display: inline-flex">
                    <div style="color: white; font-size: 64px; font-family: Inter,sans-serif; font-weight: 800; word-wrap: break-word">Sign In</div>
                    <div style="color: white; font-size: 15px; font-family: Inter,sans-serif; font-weight: 600; word-wrap: break-word">Email</div>
                    <div style="width: 347px; height: 56px; position: relative">
                        <div style="width: 347px; height: 56px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 20px; border: 2px #979090 solid"></div>
                        <div style="left: 13px; top: 19px; position: absolute; color: #979090; font-size: 15px; font-family: Inter,sans-serif; font-weight: 600; word-wrap: break-word">Type your email here</div>
                    </div>
                    <div style="color: white; font-size: 15px; font-family: Inter,sans-serif; font-weight: 600; word-wrap: break-word">Password</div>
                    <div style="width: 347px; height: 56px; position: relative">
                        <div style="width: 347px; height: 56px; left: 0px; top: 0px; position: absolute; background: white; border-radius: 20px; border: 2px #979090 solid"></div>
                        <div style="left: 13px; top: 19px; position: absolute; color: #979090; font-size: 15px; font-family: Inter,sans-serif; font-weight: 600; word-wrap: break-word">Type your password here</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
