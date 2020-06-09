@extends('layouts.frontend')
@section('front')
    <section class="gry-bg py-4 profile">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-9 mx-auto">
                    <div class="main-content">
                        <!-- Page title -->
                        <div class="page-title">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2 class="heading heading-6 text-capitalize strong-600 mb-0">
                                        Contact Us
                                    </h2>
                                </div>
                                <div class="col-md-6">
                                    <div class="float-md-right">
                                        <ul class="breadcrumb">
                                            <li><a href="{{route('front')}}">Home</a></li>
                                            <li class="active"><a href="{{route('contactus')}}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form class="" action="http://shop.activeitzone.com/affiliate/store" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="gpSCLycQbKm67EjiRxuKYmIohvnlI1aJyezopzPh">                                                        <div class="form-box bg-white mt-4">
                                <div class="form-box-title px-3 py-2">
                                   Send Message
                                </div>
                                <div class="form-box-content p-3">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Your name <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" placeholder="Your name" name="element_0" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Email <span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" placeholder="Email" name="element_1" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Subject<span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control mb-3" placeholder="Subject" name="element_2" required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>Message<span class="required-star">*</span></label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea type="text" cols="5" rows="5" class="form-control mb-3" placeholder="Message" name="element_3" required=""></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="text-right mt-4">
                                <button type="submit" class="btn btn-styled btn-base-1">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
