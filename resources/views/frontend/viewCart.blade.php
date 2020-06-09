@extends('layouts.frontend')
@section('front')

    <section class="py-4 gry-bg" id="cart-summary">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-xl-8">
                    <!-- <form class="form-default bg-white p-4" data-toggle="validator" role="form"> -->
                    <?php
                    $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                    $subtotal = \Gloudemans\Shoppingcart\Facades\Cart::content()->sum('price');
                    $counts = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                    ?>

                    <div class="form-default bg-white p-4">
                        <div class="">
                            <div class="">
                                <table class="table-cart border-bottom">
                                    <thead>
                                    <tr>
                                        <th class="product-image"></th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price d-none d-lg-table-cell">Price</th>
                                        <th class="product-quanity d-none d-md-table-cell">Quantity</th>
                                        <th class="product-total">Total</th>
                                        <th class="product-remove"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($carts as $vcart)
                                    <tr class="cart-item">
                                        <td class="product-image">
                                            <a href="#" class="mr-3">
                                                <img loading="lazy" src="{{asset($vcart->options->image)}}">
                                            </a>
                                        </td>

                                        <td class="product-name">
                                            <span class="pr-4 d-block">{{$vcart->name}}</span>
                                        </td>

                                        <td class="product-price d-none d-lg-table-cell">
                                            <span class="pr-3 d-block">${{$vcart->price}}</span>
                                        </td>
                                        <form action="{{route('card.update.cart.page')}}" method="post">
                                            @csrf
                                        <td class="product-quantity d-none d-md-table-cell">
                                            <div class="input-group input-group--style-2 pr-3" style="width: 130px;">
                                                <input type="number" name="qty" class="form-control text-center" value="{{$vcart->qty}}">
                                                <input type="hidden" name="update_id" class="form-control text-center" value="{{$vcart->rowId}}">
                                            </div>
                                        </td>
                                        <td class="product-total">
                                            <span>${{$vcart->subTotal()}}</span>
                                        </td>
                                        <td class="product-remove">
                                            <button type="submit" class="btn btn-success btn-sm btn-block">Update</button>
                                        </form>
                                        <br>
                                        <form action="{{route('card.delete.cart.page')}}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm btn-block">x Remove</button>
                                            <input type="hidden" name="delete_id" class="form-control text-center" value="{{$vcart->rowId}}">
                                        </form>


                                        </td>

                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row align-items-center pt-4">
                            <div class="col-md-6">
                                <a href="{{route('all.product')}}" class="link link--style-3">
                                    <i class="la la-mail-reply"></i>
                                    Return to shop
                                </a>
                            </div>

                                <div class="col-md-6 text-right">
                                    <a href="{{route('user.checkout')}}">
                                    <button type="submit" class="btn btn-styled btn-base-1">Proceed To Checkout </button>
                                    </a>
                                </div>


                        </div>
                    </div>

                    <!-- </form> -->
                </div>

                <div class="col-xl-4 ml-lg-auto">
                    <div class="card sticky-top">
                        <div class="card-title py-3">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="heading heading-3 strong-400 mb-0">
                                        <span>Summary</span>
                                    </h3>
                                </div>

                                <div class="col-6 text-right">
                                    <span class="badge badge-md badge-success">1 Items</span>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <table class="table-cart table-cart-review">
                                <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total text-right">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $vcart)
                                <tr class="cart_item">
                                    <td class="product-name">
                                        {{$vcart->name}}
                                        <strong class="product-quantity">× {{$vcart->qty}}</strong>
                                    </td>
                                    <td class="product-total text-right">
                                        <span class="pl-4">${{$vcart->subTotal()}}</span>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>


                            <table class="table-cart table-cart-review">

                                <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td class="text-right">
                                        <span class="strong-600">${{$subtotal}}</span>
                                    </td>
                                </tr>

                                <tr class="cart-shipping">
                                    <th>Tax</th>
                                    <td class="text-right">
                                        <span class="text-italic">$0.00</span>
                                    </td>
                                </tr>

                                <tr class="cart-shipping">
                                    <th>Total Shipping</th>
                                    <td class="text-right">
                                        <span class="text-italic">$0.00</span>
                                    </td>
                                </tr>



                                <tr class="cart-total">
                                    <th><span class="strong-600">Total</span></th>
                                    <td class="text-right">
                                        <strong><span>${{$subtotal}}</span></strong>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
