@extends('layouts.dealer')
@section('dealer')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Order Product</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('dealer.product.add.cart')}}" method="post" novalidate="">
                    @csrf
                   <div class="row">
                       <div class="form-group col-md-6">
                           <label for="userName">Select Product<span class="text-danger">*</span></label>
                           <select class="form-control" name="product_id">
                               <option value="0">select any</option>
                               @foreach($products as $pro)
                               <option value="{{$pro->id}}">{{$pro->product_name}}</option>
                               @endforeach
                           </select>
                       </div>
                       <div class="form-group col-md-6">
                           <label for="userName">Quantity<span class="text-danger">*</span></label>
                           <input type="text" name="qty" parsley-trigger="change" required=""  class="form-control" id="userName">
                       </div>
                   </div>

                    <div class="form-group text-left mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Add
                        </button>
                    </div>

                </form>
            </div> <!-- end card-box -->
        </div>
        <!-- end col -->


    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Order Product List</h4>
                <div class="table-responsive">
                    <?php
                    $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                    $subtotal = \Gloudemans\Shoppingcart\Facades\Cart::subtotal();
                    $counts = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                    ?>
                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Qty</th>
                            <th>Product Subtotal</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($carts) > 0)
                            @foreach($carts as $vcart)
                                <tr>
                                    <th scope="row">
                                        {{$vcart->name}}
                                    </th>
                                    <td><img src="{{asset($vcart->options->image)}}" style="height: 50px;width: 50px;"></td>
                                    <td>{{$vcart->qty}}</td>
                                    <td>{{$gn->site_currency}} {{$vcart->subTotal()}}</td>
                                    <td>
                                        <a href="{{route('dealer.remover.cart.product',$vcart->rowId)}}">
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </button>
                                        </a>

                                    </td>

                                </tr>

                            @endforeach

                        @else
                            <td colspan="5" class="text-center">Please Add Product</td>
                        @endif
                        <tr>
                            <td colspan="5" class="text-center">SubTotal :{{$gn->site_currency}} {{$subtotal}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                @if ($counts > 0)
                    <a href="{{route('dealer.payment')}}">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Save And Make Payment
                        </button>
                    </a>
                @endif


            </div>

        </div>


    </div>
@stop
