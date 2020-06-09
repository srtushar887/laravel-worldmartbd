@extends('layouts.dealer')
@section('dealer')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Change Password</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('dealer.my.password.update')}}" method="post" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="userName">New Password<span class="text-danger">*</span></label>
                            <input type="text" name="npass"  parsley-trigger="change" required=""  class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Confirm Password<span class="text-danger">*</span></label>
                            <input type="text" name="cpass" parsley-trigger="change" required=""  class="form-control" id="userName">
                        </div>
                    </div>

                    <div class="form-group text-left mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Submit
                        </button>
                    </div>

                </form>
            </div> <!-- end card-box -->
        </div>
        <!-- end col -->

    </div>


@stop
