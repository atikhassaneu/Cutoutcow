@extends('layouts.admin')

@section('title', 'Order list ')
@push('css')
    <!-- Page level plugin CSS-->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                @if(session('adminStatus'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>success</strong> {{session('adminStatus')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-chart-area"></i>
                        List of Admin</div>
                    <div class="card-body">
                       @if(count($admins))
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->full_name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>
                                            <a href="{{route('admin.make-admin.edit',$admin->id)}}" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>

                                            <a onclick="event.preventDefault(); document.getElementById('delete-admin-{{$admin->id}}').submit();" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>

                                            <form style="display: none" id="delete-admin-{{$admin->id}}" action="{{route('admin.make-admin.destroy',$admin->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>success</strong> {{session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-user-plus"></i>
                        Create A New Admin
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{ route('admin.make-admin.store') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Full Name * ">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email * ">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password * ">
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

                            <input type="submit" name="sign-up-submit" value="submit" class="text-uppercase btn btn-primary">

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