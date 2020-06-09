@extends('layouts.dealer')
@section('dealer')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Deposit</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('dealer.save.payment')}}" method="post" novalidate="" id="depositfrom">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="userName">Select Payment Method<span class="text-danger">*</span></label>
                            <select class="form-control payment_method" name="payment_type">
                                @foreach($payment as $pymnt)
                                <option value="{{$pymnt->name}}">{{$pymnt->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <?php
                        $subtotal = \Gloudemans\Shoppingcart\Facades\Cart::subtotal();
                        ?>
                        <div class="form-group col-md-6">
                            <label for="userName">Amount<span class="text-danger">*</span></label>
                            <input type="text" name="total_amount" value="{{$subtotal}}" readonly parsley-trigger="change" required="" placeholder="Enter Amount" class="form-control amount" id="userName">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="userName">TRX ID (if have)<span class="text-danger"></span></label>
                            <input type="text" name="trx_id" parsley-trigger="change" required="" placeholder="Enter TRX ID" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="userName"><span class="name">Sender Address</span><span class="text-danger">*</span></label>
                            <input type="text" name="sender_address" parsley-trigger="change" required="" placeholder="Address" class="form-control address" id="userName">
                        </div>
                    </div>

                    <div class="form-group text-left mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" id="depositbtn" type="submit">
                            Submit
                        </button>
                    </div>

                </form>
            </div> <!-- end card-box -->
        </div>
        <!-- end col -->


        <div class="col-lg-4">

            <div class="card card-body">
                <h5 class="card-title">Before deposit make payment with any bellow address:</h5>
                @foreach($payment as $pay)
                <p class="card-text"> <strong>{{$pay->name}} : {{$pay->address}}</strong></p>
                @endforeach
            </div>
        </div>
    </div>


    </div>
@stop
