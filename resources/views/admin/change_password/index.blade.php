@extends('layouts.admin')

@section('title', 'Admin Edit ')
@push('css')
    <!-- Page level plugin CSS-->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                @if(session('error'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>success! </strong> {{session('error')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-user-plus"></i>
                        Change Admin Password
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{ route('admin.change-password.update') }}">
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

@push('js')

    <script src="{{asset('vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
@endpush