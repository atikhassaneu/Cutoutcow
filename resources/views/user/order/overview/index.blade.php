@extends('layouts.user')

@section('content')
    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-6">
            <div class="order">
                <div class="upload my-3">
                    <div class="card">
                        <div class="card-header">
                            <p class="text-uppercase d-inline font-weight-bold text-primary">your orders</p><span class="small"> Your most recent orders!</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-responsive-md">
                                @if(count($incompleted_orders))

                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Order Date</th>
                                        <th>Action</th>

                                    </tr>
                                    @foreach($incompleted_orders as $key => $incompleted_order)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><a class="text-primary" href="">{{$incompleted_order['order_id']}}</a></td>
                                            <td>{{$incompleted_order['created_at']}}</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i></a>
                                                <a href="" onclick="event.preventDefault(); document.getElementById('delete-form-{{$incompleted_order->id}}').submit();" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>
                                                <form id="delete-form-{{$incompleted_order->id}}" action="{{route('user.order.delete',$incompleted_order->id)}}" class="d-none" method="post">@csrf @method("DELETE")</form>
                                            </td>

                                        </tr>
                                    @endforeach
                                @else
                                    {{"No data available here "}}
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="completed_order">
                <div class="upload my-3">
                    <div class="card">
                        <div class="card-header">
                            <p class="text-uppercase d-inline font-weight-bold text-primary">your completed orders</p><span class="small"> Your most recent orders!</span>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                @if(count($completed_orders))

                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Order Date</th>
                                    <th>Action</th>

                                </tr>
                                @foreach($completed_orders as $key => $completed_order)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><a class="text-primary" href="">{{$completed_order['order_id']}}</a></td>
                                        <td>{{$completed_order['created_at']}}</td>
                                        <td>
                                            <a href="" class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i></a>
                                            <a href="" onclick="event.preventDefault(); document.getElementById('delete-form-{{$completed_order->id}}').submit();" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i></a>
                                            <form id="delete-form-{{$completed_order->id}}" action="{{route('user.order.delete',$completed_order->id)}}" class="d-none" method="post">@csrf @method("DELETE")</form>
                                        </td>

                                    </tr>
                                @endforeach
                                @else
                                {{"No data available here "}}
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection