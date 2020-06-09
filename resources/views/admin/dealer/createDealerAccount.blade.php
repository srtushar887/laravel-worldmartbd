@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Create Dealer Account</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('admin.dealer.account.save')}}" method="post" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="userName">Dealer Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" value="" parsley-trigger="change" required   class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Dealer Email<span class="text-danger">*</span></label>
                            <input type="text" name="email" value="" parsley-trigger="change" required   class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Dealer Phone<span class="text-danger">*</span></label>
                            <input type="text" name="phone" value="" parsley-trigger="change" required   class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Account Password<span class="text-danger">*</span></label>
                            <input type="text" name="password" value="" parsley-trigger="change" required  class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Account Confirm Password<span class="text-danger">*</span></label>
                            <input type="text" name="confirm_password" value="" parsley-trigger="change" required  class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Account Action<span class="text-danger">*</span></label>
                            <select class="form-control" name="action" required>
                                <option value="0"> Pending </option>
                                <option value="1"> Active </option>
                                <option value="2"> Block </option>
                            </select>
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
