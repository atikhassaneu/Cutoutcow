@extends('layouts.auth')
@section('title','Login-Catoutcaw')
@section('content')
    <section class="forget-password">
        <header class="logo">
            <img class="img-fluid" src="{{asset('images/logo-white.png')}}">
        </header>
        <div class="forget-password-form">
            <div class="forget-password-container">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="post" action="{{ route('password.email') }}">
                    @csrf
                    <h1 class="text-primary">forget password?</h1>
                    <p>Enter your e-mail address below to reset your password. </p>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email ">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="btn-container">
                        <a href="{{route('login')}}" class="text-uppercase btn-back">back</a>
                        <input type="submit" name="forget-password-submit" value="submit" class="text-uppercase btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
