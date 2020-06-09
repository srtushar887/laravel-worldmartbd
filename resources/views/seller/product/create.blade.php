@extends('layouts.seller')
@section('seller')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Create Product</h4>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('seller.save.product')}}" method="post" enctype="multipart/form-data" novalidate="">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="userName">Product Name<span class="text-danger">*</span></label>
                            <input type="text" name="product_name" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Top Category<span class="text-danger">*</span></label>
                            <select class="form-control" name="top_cat_id">
                                <option value="0">select any</option>
                                @foreach($top_cats as $tcat)
                                    <option value="{{$tcat->id}}">{{$tcat->top_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Middle Category<span class="text-danger">*</span></label>
                            <select class="form-control" name="mid_cat_id">
                                <option value="0">select any</option>
                                @foreach($mid_cats as $mcat)
                                    <option value="{{$mcat->id}}">{{$mcat->mid_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">End Category<span class="text-danger">*</span></label>
                            <select class="form-control" name="end_cat_id">
                                <option value="0">select any</option>
                                @foreach($end_cats as $ecat)
                                    <option value="{{$ecat->id}}">{{$ecat->end_cat_name}}</option>
                                @endforeach
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
                            <input type="text" name="old_price" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Current price<span class="text-danger">*</span></label>
                            <input type="text" name="new_price" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Main Image<span class="text-danger">*</span></label>
                            <input type="file" name="main_image" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 1<span class="text-danger">*</span></label>
                            <input type="file" name="image_one" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 2<span class="text-danger">*</span></label>
                            <input type="file" name="image_two" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 3<span class="text-danger">*</span></label>
                            <input type="file" name="image_three" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 4<span class="text-danger">*</span></label>
                            <input type="file" name="image_four" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 5<span class="text-danger">*</span></label>
                            <input type="file" name="image_five" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="userName">Product Description<span class="text-danger">*</span></label>
                            <textarea type="text" name="description" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName"></textarea>
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
