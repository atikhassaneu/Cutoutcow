@extends('layouts.user')

@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-10 mx-md-auto col-lg-8 mx-lg-auto">
            <div class="invoice">
                <div class="card">
                    <div class="card-header">
                        <p class="text-uppercase d-inline font-weight-bold text-primary">Password </p><span class="small"> Change your login password!</span>
                    </div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Warning! </strong> {{session('error')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                            <form  method="POST" action="{{ route('user.change-password.update') }}">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" value="{{ old('old_password') }}" placeholder="Old Password * ">
                                    @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="New Password * ">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control @error('confirm-password') is-invalid @enderror" value="{{ old('confirm-password') }}" placeholder="Retype Your Password * ">
                                    @error('confirm-password')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <input type="submit" name="change-admin-password-submit" value="submit" class="text-uppercase btn btn-primary">

                            </form>
                    </div>
                </div>
            </div>

        </div>

    </div>


@endsection