@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">General Setting</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('admin.general.setting.update')}}" method="post" novalidate="" enctype="multipart/form-data">
                    @csrf
                   <div class="row">
                       <div class="form-group col-md-6">
                           <label for="userName">Site Name<span class="text-danger">*</span></label>
                           <input type="text" name="site_name" value="{{$gen->site_name}}" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                       </div>
                       <div class="form-group col-md-6">
                           <label for="userName">Site Email<span class="text-danger">*</span></label>
                           <input type="text" name="site_email" value="{{$gen->site_email}}" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                       </div>
                       <div class="form-group col-md-8">
                           <label for="userName">Site Phone<span class="text-danger">*</span></label>
                           <input type="text" name="site_phone" value="{{$gen->site_phone}}" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                       </div>
                       <div class="form-group col-md-4">
                           <label for="userName">Site Currency<span class="text-danger">*</span></label>
                           <input type="text" name="site_currency" value="{{$gen->site_currency}}" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                       </div>
                       <div class="form-group col-md-12">
                           <label for="userName">Site Address<span class="text-danger">*</span></label>
                           <textarea type="text" name="site_address"  parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">{!! $gen->site_address !!}</textarea>
                       </div>
                       <div class="form-group col-md-6">
                           <label for="userName">Logo<span class="text-danger">*</span></label>
                           <br>
                           <img src="{{asset($gen->logo)}}" style="height: 100px;width: 100px;">
                           <input type="file" name="logo" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                       </div>
                       <div class="form-group col-md-6">
                           <label for="userName">Icon<span class="text-danger">*</span></label>
                           <br>
                           <img src="{{asset($gen->icon)}}" style="height: 100px;width: 100px;">
                           <input type="file" name="icon" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
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
