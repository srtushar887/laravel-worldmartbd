@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Create Product</h4>
            </div>
        </div>
    </div>


    @include('layouts.error')
    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('admin.save.product')}}" method="post" enctype="multipart/form-data" novalidate="">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="userName">Product Name<span class="text-danger">*</span></label>
                            <input type="text" name="product_name" value="{{ old('product_name') }}"   class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Top Category<span class="text-danger">*</span></label>
                            <select class="form-control topcatid" name="top_cat_id">
                                <option value="0">select any</option>
                                @foreach($top_cats as $tcat)
                                <option value="{{$tcat->id}}">{{$tcat->top_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Middle Category<span class="text-danger">*</span></label>
                            <select class="form-control midcatid" name="mid_cat_id" disabled>
                                <option value="0">select any</option>
                                <div class="midctdata">
                                </div>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">End Category<span class="text-danger">*</span></label>
                            <select class="form-control endcatid" name="end_cat_id" disabled>
                                <option value="0">select any</option>
                                <div class="endcatdata"></div>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Brand (if have)<span class="text-danger"></span></label>
                            <select class="form-control"  name="brand_id">
                                <option value="0">select any</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Today Hot Deal<span class="text-danger"></span></label>
                            <select class="form-control"  name="hot_deal">
                                <option value="0">select any</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="userName">Old Price (if have)<span class="text-danger"></span></label>
                            <input type="text" name="old_price" value="{{ old('old_price') }}" class="form-control" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Current price<span class="text-danger">*</span></label>
                            <input type="text" name="new_price" value="{{ old('new_price') }}"  class="form-control" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Main Image<span class="text-danger">*</span></label>
                            <input type="file" name="main_image"  class="form-control" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 1<span class="text-danger">*</span></label>
                            <input type="file" name="image_one" class="form-control" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 2<span class="text-danger">*</span></label>
                            <input type="file" name="image_two"  class="form-control" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 3<span class="text-danger">*</span></label>
                            <input type="file" name="image_three" class="form-control" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 4<span class="text-danger">*</span></label>
                            <input type="file" name="image_four" class="form-control" >
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 5<span class="text-danger">*</span></label>
                            <input type="file" name="image_five" class="form-control" >
                        </div>
                        <div class="form-group col-md-12">
                            <label for="userName">Product Description<span class="text-danger">*</span></label>
                            <textarea type="text" name="description" value="{{ old('description') }}"  class="form-control" ></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="userName">Product Status<span class="text-danger">*</span></label>
                            <select class="form-control" name="status">
                                <option value="0">select any</option>
                                <option value="1">Publish</option>
                                <option value="2">Un-Publish</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="userName">Size (if have)<span class="text-danger"></span></label>

                            <select class="form-control" multiple name="size_id[]">
                                @foreach($sizes as $size)
                                    <option value="{{$size->id}}">{{$size->size_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Color (if have)<span class="text-danger"></span></label>
                            <select class="form-control" multiple name="color_id[]">
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->color_name}}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>

                    <div class="form-group text-left mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Save product
                        </button>
                    </div>

                </form>
            </div> <!-- end card-box -->
        </div>
        <!-- end col -->

    </div>

@stop
@section('js')
    <script>
        $(document).ready(function () {
            $('.topcatid').change(function () {
                var id = $(this).val();
                $.ajax({
                    type : "POST",
                    url: "{{route('get_mid_cat_data_ajax')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'id' : id,
                    },
                    success:function(data){
                        $('.midcatid').empty();
                        if (data.length > 0){
                            $(".midcatid").prop("disabled", false);
                            $.each(data,function (index,value) {
                                $('.midcatid').append(
                                    `<option class="disalldata" value="${value.id}">${value.mid_cat_name}</option>`
                                )
                            });


                            var mid =  $('.midcatid').val();
                            $.ajax({
                                type : "POST",
                                url: "{{route('get_end_cat_data_ajax')}}",
                                data : {
                                    '_token' : "{{csrf_token()}}",
                                    'mid' : mid,
                                },
                                success:function(data){

                                    console.log(data)
                                    $('.endcatid').empty();
                                    if (data.length > 0){
                                        $(".endcatid").prop("disabled", false);
                                        $.each(data,function (index,value) {
                                            $('.endcatid').append(
                                                `<option class="disalldata" value="${value.id}">${value.end_cat_name}</option>`
                                            )
                                        });
                                    }else {
                                        $(".endcatid").prop("disabled", true);
                                        $('.endcatid').val(0)
                                        $('.endcatid').append(
                                            `<option class="disalldata" value="0">Sorry! No End Category Found</option>`
                                        )
                                    }

                                }
                            });


                        }else {
                            $(".midcatid").prop("disabled", true);
                            $('.midcatid').val(0)
                            $('.midcatid').append(
                                `<option class="disalldata" value="0">Sorry! No Middle Category Found</option>`
                            )
                        }

                    }
                });
            });



            $('.midcatid').change(function () {
                var mid = $('.midcatid').val();
                $.ajax({
                    type : "POST",
                    url: "{{route('get_end_cat_data_ajax')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'mid' : mid,
                    },
                    success:function(data){

                        console.log(data)
                        $('.endcatid').empty();
                        if (data.length > 0){
                            $(".endcatid").prop("disabled", false);
                            $.each(data,function (index,value) {
                                $('.endcatid').append(
                                    `<option class="disalldata" value="${value.id}">${value.end_cat_name}</option>`
                                )
                            });
                        }else {
                            $(".endcatid").prop("disabled", true);
                            $('.endcatid').val(0)
                            $('.endcatid').append(
                                `<option class="disalldata" value="0">Sorry! No End Category Found</option>`
                            )
                        }

                    }
                });
            })


        })
    </script>
@stop
