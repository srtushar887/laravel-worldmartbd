@extends('layouts.dealer')
@section('dealer')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Pedning Order</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Order List</h4>
                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{$order->user_order_id}}</th>
                                <td>{{$order->dealer->name}}</td>
                                <td>{{$order->total_amount}}</td>
                                <td>
                                    @if ($order->status == 0)
                                        Pending
                                    @elseif($order->status == 1)
                                        Deliver
                                    @elseif($order->status == 2)
                                        Rejected
                                    @else
                                        Cancel
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('my.order.view',$order->id)}}">
                                        <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i> </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>

@stop
