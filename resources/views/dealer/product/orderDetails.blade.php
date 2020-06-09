@extends('layouts.dealer')
@section('dealer')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">My Order Details</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('admin.dealer.order.save')}}" method="post" novalidate="">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="userName">Payment Type<span class="text-danger">*</span></label>
                            <input type="text" name="nick" value="{{$order->payment_type}}" readonly parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Trx Id<span class="text-danger">*</span></label>
                            <input type="text" name="nick" value="{{$order->trx_id}}" readonly parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Sender Address<span class="text-danger">*</span></label>
                            <input type="text" name="nick" value="{{$order->sender_address}}" readonly parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Order Id<span class="text-danger">*</span></label>
                            <input type="text" name="nick" value="{{$order->user_order_id}}" readonly parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                    </div>


                </form>
            </div> <!-- end card-box -->
        </div>
        <!-- end col -->
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Order Details</h4>
                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Qty</th>
                            <th>Product Size</th>
                            <th>Product Color</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $order_details = \App\user_order_detail::where('order_id',$order->id)
                            ->with('product')
                            ->with('size')
                            ->with('color')
                            ->get();
                        ?>
                        @foreach($order_details as $ordetails)
                            <tr>
                                <th scope="row">{{$ordetails->product->product_name}}</th>
                                <td>{{$ordetails->qty}}</td>
                                <td>
                                    @if (!empty($ordetails->size_id))
                                        {{$ordetails->size->size_name}}
                                    @else
                                        Product Not Have Size
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($ordetails->color_id))
                                        {{$ordetails->color->color_name}}
                                    @else
                                        Product Not Have Color
                                    @endif
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
