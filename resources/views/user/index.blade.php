@extends('layouts.frontend')
@section('front')
    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                @include('user.include.menu')
                <div class="col-lg-9">
                    <!-- Page title -->
                    <div class="page-title">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12">
                                <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                    Dashboard
                                </h2>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="float-md-right">
                                    <ul class="breadcrumb">
                                        <li><a href="http://shop.activeitzone.com">Home</a></li>
                                        <li class="active"><a href="{{route('home')}}">Dashboard</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- dashboard content -->
                    <div class="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center green-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="d-block title">0 Product</span>
                                        <span class="d-block sub-title">in your cart</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center red-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-heart"></i>
                                        <span class="d-block title">7 Product(s)</span>
                                        <span class="d-block sub-title">in your wishlist</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="dashboard-widget text-center yellow-widget mt-4 c-pointer">
                                    <a href="javascript:;" class="d-block">
                                        <i class="fa fa-building"></i>
                                        <span class="d-block title">14 Product(s)</span>
                                        <span class="d-block sub-title">you ordered</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6 col-12">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        Recently Order History
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="card no-border col-md-12 mt-4">
                                <div>
                                    <table class="table table-sm table-hover table-responsive-md">
                                        <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Delivery Status</th>
                                            <th>Payment Status</th>
                                            <th>Options</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a href="#20190615-075229" onclick="show_purchase_history_details(37)">20190615-075229</a>
                                            </td>
                                            <td>15-06-2019</td>
                                            <td>
                                                $121.59
                                            </td>
                                            <td>
                                                Pending
                                            </td>
                                            <td>
                                                        <span class="badge badge--2 mr-4">
                                                                                                                            <i class="bg-red"></i> Unpaid
                                                                                                                                                                                </span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>

                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="">
                                                        <button onclick="show_purchase_history_details(37)" class="dropdown-item">Order Details</button>
                                                        <a href="http://shop.activeitzone.com/invoice/customer/37" class="dropdown-item">Download Invoice</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
