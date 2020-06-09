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
                                <div class="col-md-6 col-12">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                       Change Password
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <form class="" action="{{route('user.password.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                    Change Password
                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>New Password</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" placeholder="New Password" name="npass" >
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Confirm Password</label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" placeholder="Confirm Password" name="cpass" >
                                        </div>
                                    </div>



                                </div>
                            </div>

                            <div class="text-right mt-4">
                                <button type="submit" class="btn btn-styled btn-base-1">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
