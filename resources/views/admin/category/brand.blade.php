@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Brand</h4>
            </div>
        </div>
    </div>



    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createproductbrand">Create new Product Brand</button>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Brand List</h4>
                <div class="table-responsive">

                    <table class="table mb-0" id="topcat">
                        <thead>
                        <tr>
{{--                            <th>End Category Name</th>--}}
                            <th>Brand Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
{{--                                <th scope="row">{{$brand->end_cat->end_cat_name}}</th>--}}
                                <td>{{$brand->brand_name}}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatebrand{{$brand->id}}"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletebrand{{$brand->id}}"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>



                            <div class="modal fade" id="deletebrand{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Brand</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.delete.brand')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    are you sure to delete this brand ?
                                                    <input type="hidden" class="form-control" name="brand_delete_id" value="{{$brand->id}}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>




                            <div class="modal fade" id="updatebrand{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Brand</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.update.brand')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
{{--                                                <div class="form-group">--}}
{{--                                                    <label>Select End Category</label>--}}
{{--                                                    <select class="form-control" name="end_cat_id">--}}
{{--                                                        <option value="0">select any</option>--}}
{{--                                                        @foreach($end_cats as $endcat)--}}
{{--                                                            <option value="{{$endcat->id}}" {{$brand->end_cat_id == $endcat->id ? 'selected' : ''}}>{{$endcat->end_cat_name}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
                                                <div class="form-group">
                                                    <label>Brand Name</label>
                                                    <input type="text" class="form-control" name="brand_name" value="{{$brand->brand_name}}">
                                                    <input type="hidden" class="form-control" name="brand_edit_id" value="{{$brand->id}}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>



    <div class="modal fade" id="createproductbrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Brand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.create.brand')}}" method="post">
                    @csrf
                    <div class="modal-body">
{{--                        <div class="form-group">--}}
{{--                            <label>Select End Category</label>--}}
{{--                            <select class="form-control" name="end_cat_id">--}}
{{--                                <option value="0">select any</option>--}}
{{--                                @foreach($end_cats as $endcat)--}}
{{--                                    <option value="{{$endcat->id}}">{{$endcat->end_cat_name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="text" class="form-control" name="brand_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@stop
@section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {


            $(document).ready(function () {
                $('#topcat').DataTable();

            })
        });
    </script>
@stop
