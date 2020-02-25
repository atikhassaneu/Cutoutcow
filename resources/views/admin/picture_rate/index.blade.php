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
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-chart-area"></i>
                        Picture Rate</div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Picture Current Rate</td>
                                    <td><span>&#36;</span> {{$rate->rate}}</td>
                                </tr>
                            </tbody>
                        </table>
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
                        Update Picture Rate
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="{{ route('admin.picture-rate.update') }}">
                            @csrf
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><span>&#36;</span></div>
                                </div>
                                <input type="text" name="rate" class="form-control @error('rate') is-invalid @enderror" value="{{ $rate->rate }}" placeholder="Picture current rate * ">
                                @error('rate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <input type="submit" name="update-picture-rate-submit" value="submit" class="text-uppercase btn btn-primary">

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