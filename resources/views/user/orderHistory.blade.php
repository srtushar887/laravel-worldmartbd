@extends('layouts.frontend')
@section('front')
    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                @include('user.include.menu')

                <div class="col-lg-9">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0 d-inline-block">
                                        Order History
                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="http://shop.activeitzone.com">Home</a></li>
                                            <li><a href="http://shop.activeitzone.com/dashboard">Dashboard</a></li>
                                            <li><a href="http://shop.activeitzone.com/customer_products">Products</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Order history table -->
                        <div class="card no-border mt-4">
                            <div>
                                <table class="table table-sm table-hover table-responsive-md">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Price</th>
                                        <th>Admin Status</th>
                                        <th>Options</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($user_orders as $userorder)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$userorder->user_order_id}}</td>
                                        <td>{{$gn->site_currency}} {{$userorder->total_amount}}</td>
                                        <td>
                                            @if ($userorder->status == 0)
                                                <span class="ml-2" style="color:green"><strong>PENDING</strong></span>
                                                @elseif ($userorder->status == 1)
                                                <span class="ml-2" style="color:green"><strong>DELIVERED</strong></span>
                                            @elseif ($userorder->status == 2)
                                                <span class="ml-2" style="color:green"><strong>REJECTED</strong></span>
                                            @elseif ($userorder->status == 3)
                                                <span class="ml-2" style="color:green"><strong>CANCELED</strong></span>
                                            @endif

                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </button>

                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
{{--                                                    <a href="" class="dropdown-item">Edit</a>--}}
                                                    <button class="dropdown-item">Delete</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="pagination-wrapper py-4">
                            {{$user_orders->links()}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
