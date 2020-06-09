@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Product Update</h4>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('admin.update.seller.product')}}" method="post" enctype="multipart/form-data" novalidate="">
                    @csrf
                    <div class="row">

                        <div class="form-group col-md-12">
                            <label for="userName">Product Name<span class="text-danger">*</span></label>
                            <input type="text" name="product_name" value="{{$product->product_name}}" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                            <input type="hidden" name="product_edit_id" value="{{$product->id}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Top Category<span class="text-danger">*</span></label>
                            <select class="form-control" name="top_cat_id">
                                <option value="0">select any</option>
                                @foreach($top_cats as $tcat)
                                    <option value="{{$tcat->id}}" {{$product->top_cat_id == $tcat->id ? 'selected' : ''}}>{{$tcat->top_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Middle Category<span class="text-danger">*</span></label>
                            <select class="form-control" name="mid_cat_id">
                                <option value="0">select any</option>
                                @foreach($mid_cats as $mcat)
                                    <option value="{{$mcat->id}}" {{$product->mid_cat_id == $mcat->id ? 'selected' : ''}}>{{$mcat->mid_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">End Category<span class="text-danger">*</span></label>
                            <select class="form-control" name="end_cat_id">
                                <option value="0">select any</option>
                                @foreach($end_cats as $ecat)
                                    <option value="{{$ecat->id}}" {{$product->end_cat_id == $ecat->id ? 'selected' : ''}}>{{$ecat->end_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Brand (if have)<span class="text-danger"></span></label>
                            <select class="form-control"  name="brand_id">
                                <option value="0">select any</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ? 'selected' : ''}}>{{$brand->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Today Hot Deal<span class="text-danger"></span></label>
                            <select class="form-control"  name="hot_deal">
                                <option value="0">select any</option>
                                <option value="1" {{$product->hot_deal == 1 ? 'selected' : ''}}>Yes</option>
                                <option value="2" {{$product->hot_deal == 2 ? 'selected' : ''}}>No</option>
                            </select>
                        </div>


                        <div class="form-group col-md-4">
                            <label for="userName">Old Price (if have)<span class="text-danger"></span></label>
                            <input type="text" name="old_price" value="{{$product->old_price}}" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Current price<span class="text-danger">*</span></label>
                            <input type="text" name="new_price" value="{{$product->new_price}}" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Main Image<span class="text-danger">*</span></label>
                            <br>
                            @if (!empty($product->main_image))
                                <img src="{{asset($product->main_image)}}" style="height: 100px;width: 100px;">
                            @else
                                <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;">
                            @endif
                            <input type="file" name="main_image" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 1<span class="text-danger">*</span></label>
                            <br>
                            @if (!empty($product->image_one))
                                <img src="{{asset($product->image_one)}}" style="height: 100px;width: 100px;">
                            @else
                                <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;">
                            @endif
                            <input type="file" name="image_one" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 2<span class="text-danger">*</span></label>
                            <br>
                            @if (!empty($product->image_two))
                                <img src="{{asset($product->image_two)}}" style="height: 100px;width: 100px;">
                            @else
                                <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;">
                            @endif
                            <input type="file" name="image_two" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 3<span class="text-danger">*</span></label>
                            <br>
                            @if (!empty($product->image_three))
                                <img src="{{asset($product->image_three)}}" style="height: 100px;width: 100px;">
                            @else
                                <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;">
                            @endif
                            <input type="file" name="image_three" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 4<span class="text-danger">*</span></label>
                            <br>
                            @if (!empty($product->image_four))
                                <img src="{{asset($product->image_four)}}" style="height: 100px;width: 100px;">
                            @else
                                <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;">
                            @endif
                            <input type="file" name="image_four" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="userName">Product Image 5<span class="text-danger">*</span></label>
                            <br>
                            @if (!empty($product->image_five))
                                <img src="{{asset($product->image_five)}}" style="height: 100px;width: 100px;">
                            @else
                                <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 100px;width: 100px;">
                            @endif
                            <input type="file" name="image_five" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="userName">Product Description<span class="text-danger">*</span></label>
                            <textarea type="text" name="description" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">{!! $product->description !!}</textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="userName">Product Status<span class="text-danger">*</span></label>
                            <select class="form-control" name="status">
                                <option value="3" {{$product->status == 3 ? 'selected' : ''}}>Pending</option>
                                <option value="4" {{$product->status == 4 ? 'selected' : ''}}>Approved</option>
                                <option value="5" {{$product->status == 5 ? 'selected' : ''}}>Reject</option>
                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="userName">Size (if have)<span class="text-danger"></span></label>
                            <br>
                            <?php
                            $size_ids = \App\product_size::where('product_id',$product->id)
                                ->with('size_data')
                                ->get();

                            ?>
                            @if (count($size_ids) > 0)
                                @foreach($size_ids as $sizeid)
                                    <span class="delszdata">{{$sizeid->size_data->size_name}} <i class="fas fa-trash delsizdata" data-id="{{$sizeid->id}}"></i></span> <br>
                                @endforeach
                            @else
                                <p class="text-danger">No Size have for this product</p>
                            @endif

                            <select class="form-control" multiple name="size_id[]">
                                @foreach($sizes as $size)
                                    <option value="{{$size->id}}" >{{$size->size_name}}</option>
                                @endforeach

                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="userName">Color (if have)<span class="text-danger"></span></label>
                            <br>
                            <?php
                            $color_ids = \App\product_color::where('product_id',$product->id)
                                ->with('color_data')
                                ->get();

                            ?>
                            @if (count($color_ids) > 0)
                                @foreach($color_ids as $colorid)
                                    <span class="delcldata">{{$colorid->color_data->color_name}} <i class="fas fa-trash delcoldata" data-id="{{$colorid->id}}"></i></span> <br>
                                @endforeach
                            @else
                                <p class="text-danger">No Size have for this product</p>
                            @endif
                            <select class="form-control" multiple name="color_id[]">
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->color_name}}</option>
                                @endforeach
                            </select>
                        </div>




                    </div>

                    <div class="form-group text-left mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Update product
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
            $('.delsizdata').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $(this).closest('.delszdata').remove();
                $.ajax({
                    type:'post',
                    url:'{{route('admin.delete.size.edit.data')}}',
                    data:{
                        '_token' : "{{csrf_token()}}",
                        id:id
                    },
                    success:function(data){
                    }
                });
            });


            $('.delcoldata').click(function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                $(this).closest('.delcldata').remove();
                $.ajax({
                    type:'post',
                    url:'{{route('admin.delete.color.edit.data')}}',
                    data:{
                        '_token' : "{{csrf_token()}}",
                        id:id
                    },
                    success:function(data){
                    }
                });
            });


        })
    </script>
@stop
