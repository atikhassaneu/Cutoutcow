@extends('layouts.auth')
@section('title','Login-Catoutcaw')
@section('content')
    <section class="login">
        <header class="logo">
            <img class="img-fluid" src="{{asset('images/logo-white.png')}}">
        </header>
        <div class="login-form">
            <div class="login-container">
                <form method="POST" action="{{ route('login') }}">
                    <h1 class="text-primary">sign in</h1>
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email ">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password ">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="login-flex-container">
                        <div class="login-btn">
                            <input type="submit" name="login-submit" value="login" class="btn btn-primary text-uppercase">
                        </div>
                        <div class="remember pt-2">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember" style="color: #4f4a4ae0">Remember</label>
                        </div>
                        <div class="forget-password-link pt-2">
                            <a href="{{route('password.request')}}" class="text-primary">Forgot Password?</a>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
                <div class="social-login pt-3">
                    <p>Or login with</p>
                    <ul class="icon">
                        <li>
                            <a href="{{url('/login/facebook')}}" class="icon-link facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/login/linkedin')}}" class="icon-link linkedin">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/login/twitter')}}" class="icon-link twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
            <footer class="sign-up text-center text-uppercase">
                <a href="{{route('register')}}">create an account</a>
            </footer>
        </div>
    </section>

@endsection
