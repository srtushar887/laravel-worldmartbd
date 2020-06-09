@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Top Category</h4>
            </div>
        </div>
    </div>



    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createtopcat">Create new Top Category</button>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Top Category List</h4>
                <div class="table-responsive">

                    <table class="table mb-0" id="topcat">
                        <thead>
                        <tr>
                            <th>Top Category Name</th>
                            <th>Top Category Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($top_cats as $tcat)
                        <tr>
                            <th scope="row">{{$tcat->top_cat_name}}</th>
                            <td>
                                @if (!empty($tcat->top_cat_image))
                                    <img src="{{asset($tcat->top_cat_image)}}" style="height: 50px;width: 50px;">
                                @else
                                    <img src="https://www.chanchao.com.tw/images/default.jpg" style="height: 50px;width: 50px;">

                                @endif

                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatetopcat{{$tcat->id}}"><i class="fas fa-edit"></i> </button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletetopcat{{$tcat->id}}"><i class="fas fa-trash"></i> </button>
                            </td>
                        </tr>



                        <div class="modal fade" id="deletetopcat{{$tcat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Top Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('admin.delete.topcat')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                are you sure to delete this top category ?
                                                <input type="hidden" class="form-control" name="top_cat_delete_id" value="{{$tcat->id}}">
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




                        <div class="modal fade" id="updatetopcat{{$tcat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Update Top Category</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('admin.update.topcat')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Top Category Name</label>
                                                <input type="text" class="form-control" name="top_cat_name" value="{{$tcat->top_cat_name}}">
                                                <input type="hidden" class="form-control" name="top_cat_edit_id" value="{{$tcat->id}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Top Category Image</label>
                                                <br>
                                                <img src="{{asset($tcat->top_cat_image)}}" style="height: 100px;width: 100px;">
                                                <input type="file" class="form-control" name="top_cat_image">
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



    <div class="modal fade" id="createtopcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Top Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.create.topcat')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Top Category Name</label>
                        <input type="text" class="form-control" name="top_cat_name">
                    </div>
                    <div class="form-group">
                        <label>Top Category Image</label>
                        <input type="file" class="form-control" name="top_cat_image">
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
