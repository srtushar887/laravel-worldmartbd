@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Static Data</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('admin.static.update')}}" method="post" novalidate="">
                    @csrf
                   <div class="row">
                       <div class="form-group col-md-12">
                           <label for="userName">About Us<span class="text-danger">*</span></label>
                           <textarea type="text" name="about_us" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="summary-ckeditor-about">{!! $static_data->about_us !!}</textarea>
                       </div>
                       <div class="form-group col-md-12">
                           <label for="userName">Deller Policy<span class="text-danger">*</span></label>
                           <textarea type="text" name="deller" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="summary-ckeditor-deller">{!! $static_data->deller !!}</textarea>
                       </div>
                       <div class="form-group col-md-12">
                           <label for="userName">Return Policy<span class="text-danger">*</span></label>
                           <textarea type="text" name="return" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="summary-ckeditor-return">{!! $static_data->return !!}</textarea>
                       </div>
                       <div class="form-group col-md-12">
                           <label for="userName">Support Policy<span class="text-danger">*</span></label>
                           <textarea type="text" name="support" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="summary-ckeditor-support">{!! $static_data->support !!}</textarea>
                       </div>
                       <div class="form-group col-md-12">
                           <label for="userName">Privacy & Policy<span class="text-danger">*</span></label>
                           <textarea type="text" name="privacy" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="summary-ckeditor-privacy">{!! $static_data->privacy !!}</textarea>
                       </div>
                       <div class="form-group col-md-12">
                           <label for="userName">Trems & Conditions<span class="text-danger">*</span></label>
                           <textarea type="text" name="team" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="summary-ckeditor-trems">{!! $static_data->team !!}</textarea>
                       </div>
                       <div class="form-group col-md-12">
                           <label for="userName">Home Footer<span class="text-danger">*</span></label>
                           <textarea type="text" name="home_footer" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="summary-ckeditor-homefooter">{!! $static_data->home_footer !!}</textarea>
                       </div>
                   </div>

                    <div class="form-group text-left mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Update
                        </button>
                    </div>

                </form>
            </div> <!-- end card-box -->
        </div>
        <!-- end col -->

    </div>


@stop

@section('js')
    <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor-about' );
        CKEDITOR.replace( 'summary-ckeditor-deller' );
        CKEDITOR.replace( 'summary-ckeditor-return' );
        CKEDITOR.replace( 'summary-ckeditor-support' );
        CKEDITOR.replace( 'summary-ckeditor-privacy' );
        CKEDITOR.replace( 'summary-ckeditor-trems' );
        CKEDITOR.replace( 'summary-ckeditor-homefooter' );
    </script>
@stop
