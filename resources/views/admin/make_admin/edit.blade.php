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
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-user-plus"></i>
                        Edit Existing Admin
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{ route('admin.make-admin.update',$admin->id) }}">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $admin->full_name }}" placeholder="Full Name * ">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $admin->email }}" placeholder="Email * ">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <input type="submit" name="update-admin-submit" value="submit" class="text-uppercase btn btn-primary">

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