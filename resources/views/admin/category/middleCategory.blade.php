@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Middle Category</h4>
            </div>
        </div>
    </div>



    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createmiddlecat">Create new Middle Category</button>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Middle Category List</h4>
                <div class="table-responsive">

                    <table class="table mb-0" id="topcat">
                        <thead>
                        <tr>
                            <th>Top Category Name</th>
                            <th>Middle Category Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mid_cats as $mcat)
                            <tr>
                                <th scope="row">
                                    @if ($mcat->top_cat)
                                        {{$mcat->top_cat->top_cat_name}}
                                    @else
                                        Not Set
                                    @endif

                                </th>
                                <td>{{$mcat->mid_cat_name}}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updatemiddlecat{{$mcat->id}}"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletemiddlecat{{$mcat->id}}"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>



                            <div class="modal fade" id="deletemiddlecat{{$mcat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Middle Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.delete.midcat')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    are you sure to delete this middle category ?
                                                    <input type="hidden" class="form-control" name="mid_cat_delete_id" value="{{$mcat->id}}">
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




                            <div class="modal fade" id="updatemiddlecat{{$mcat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Middle Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.update.midcat')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Select Top Category</label>
                                                    <select class="form-control" name="top_cat_id">
                                                        <option value="0">select any</option>
                                                        @foreach($top_cats as $topcat)
                                                            <option value="{{$topcat->id}}" {{$mcat->top_cat_id == $topcat->id ? 'selected' : ''}}>{{$topcat->top_cat_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Middel Category Image</label>
                                                    <input type="text" class="form-control" name="mid_cat_name" value="{{$mcat->mid_cat_name}}">
                                                    <input type="hidden" class="form-control" name="mid_cat_edit_id" value="{{$mcat->id}}">
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



    <div class="modal fade" id="createmiddlecat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Middle Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.create.midcat')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Select Top Category</label>
                            <select class="form-control " name="top_cat_id">
                                <option value="0">select any</option>
                                @foreach($top_cats as $topcat)
                                <option value="{{$topcat->id}}">{{$topcat->top_cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Middel Category Image</label>
                            <input type="text" class="form-control" name="mid_cat_name">
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
