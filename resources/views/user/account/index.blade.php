@extends('layouts.user')

@section('content')
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="account">
                <div class="card">
                    @if(session('acc_status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>success! </strong> {{session('acc_status')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-header">
                        <p class="text-uppercase d-inline font-weight-bold text-primary">ACCOUNT </p><span class="small"> Change your account settings</span>
                    </div>
                    <div class="card-body">
                        <form class="" method="post"  action="{{route('user.account.update')}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="name" name="acc_name" id="name" value="{{isset($user->full_name)?$user->full_name :''}}" readonly class="form-control @error('acc_name') is-invalid @enderror">
                                @error('acc_name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="company">Company Name</label>
                                <input type="text" name="acc_company" id="company" class="form-control @error('acc_company') is-invalid @enderror" value="{{isset($user->company)?$user->company :''}}" placeholder="Company Name">
                            </div>
                            @error('acc_company')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="acc_phone" id="phone" value="{{isset($user->phone)?$user->phone :''}}" class="form-control @error('acc_phone') is-invalid @enderror" placeholder="Phone">
                            </div>
                            @error('acc_phone')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror

                            <div class="form-group">
                                <input type="submit" name="account-uptdate" class="btn btn-primary" value="Account Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="invoice">
                <div class="card">
                    @if(session('invoice_status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>success! </strong> {{session('invoice_status')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card-header">
                        <p class="text-uppercase d-inline font-weight-bold text-primary">Invoice </p><span class="small"> Change your billing information</span>
                    </div>
                    <div class="card-body">
                        <form class="" method="post" action="{{route('user.invoice.update')}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-12 col-lg-3">
                                        <label for="company">Company</label>
                                    </div>
                                    <div class="col-sm-9 col-md-12 col-lg-9">
                                        <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" value="{{ isset($invoice->company)?$invoice->company :'' }}" placeholder="Company">
                                        @error('company')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-12 col-lg-3">
                                        <label for="phone">Phone</label>
                                    </div>
                                    <div class="col-sm-9 col-md-12 col-lg-9">
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ isset($invoice->phone)?$invoice->phone :'' }}"  placeholder="Phone">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-12 col-lg-3">
                                        <label for="adrress1">Address 1</label>
                                    </div>
                                    <div class="col-sm-9 col-md-12 col-lg-9">
                                        <input type="text" name="address1" class="form-control @error('address1') is-invalid @enderror" value="{{ isset($invoice->address1)?$invoice->address1 :'' }}" placeholder="Address 1">
                                        @error('address1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-12 col-lg-3">
                                        <label for="address2">Address 2</label>
                                    </div>
                                    <div class="col-sm-9 col-md-12 col-lg-9">
                                        <input type="text" name="address2" class="form-control" placeholder="Address 2"  value="{{isset($invoice->address2)?$invoice->address2 :''}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-12 col-lg-3">
                                        <label for="zip">Zip code</label>
                                    </div>
                                    <div class="col-sm-9 col-md-12 col-lg-9">
                                        <input type="text" name="zip" class="form-control @error('zip') is-invalid @enderror" value="{{ isset($invoice->zip)?$invoice->zip :'' }}" placeholder="Zip code">
                                        @error('zip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-12 col-lg-3">
                                        <label for="city">City</label>
                                    </div>
                                    <div class="col-sm-9 col-md-12 col-lg-9">
                                        <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ isset($invoice->city)?$invoice->city :'' }}"   placeholder="City">
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-3 col-md-12 col-lg-3">
                                        <label for="country">Country</label>
                                    </div>
                                    <div class="col-sm-9 col-md-12 col-lg-9">
                                        <input type="text" name="country" class="form-control" value="{{isset($user->country)?$user->country :''}}" readonly placeholder="Country">

                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <input type="submit" name="account-uptdate" class="btn btn-primary" value="Invoice Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection