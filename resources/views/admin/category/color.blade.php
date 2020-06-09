@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Color</h4>
            </div>
        </div>
    </div>



    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createproductcolor">Create new Product Color</button>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Color List</h4>
                <div class="table-responsive">

                    <table class="table mb-0" id="topcat">
                        <thead>
                        <tr>
                            <th>Brand Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($colors as $color)
                            <tr>
                                <td>{{$color->color_name}}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatecolor{{$color->id}}"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletecolor{{$color->id}}"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>



                            <div class="modal fade" id="deletecolor{{$color->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Color</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.delete.color')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    are you sure to delete this color ?
                                                    <input type="hidden" class="form-control" name="color_delete_id" value="{{$color->id}}">
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




                            <div class="modal fade" id="updatecolor{{$color->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Color</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.update.color')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label>Color Name</label>
                                                    <input type="text" class="form-control" name="color_name" value="{{$color->color_name}}">
                                                    <input type="hidden" class="form-control" name="color_edit_id" value="{{$color->id}}">
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



    <div class="modal fade" id="createproductcolor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Color</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.create.color')}}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Color Name</label>
                            <input type="text" class="form-control" name="color_name">
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
