@extends('layouts.admin')
@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Home Slider</h4>
            </div>
        </div>
    </div>

    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createslider">Create New Slider</button>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Slider List</h4>
                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Slider Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sliders as $slid)
                        <tr>
                            <td><img src="{{asset($slid->slider_image)}}" style="height: 100px;width: 100px;"></td>
                            <td>
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editslider{{$slid->id}}"><i class="fas fa-edit"></i> </button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteslider{{$slid->id}}"><i class="fas fa-trash"></i> </button>
                            </td>
                        </tr>


                        <div class="modal fade" id="deleteslider{{$slid->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="{{route('admin.slider.delete')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Slider</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                are you sure to delete this slider image ?
                                                <input type="hidden" class="form-control" name="slider_delete_id" value="{{$slid->id}}">
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




                        <div class="modal fade" id="editslider{{$slid->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="{{route('admin.slider.update')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Slider</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Slider Image</label>
                                                <br>
                                                <img src="{{asset($slid->slider_image)}}" style="height: 100px;width: 100px;">
                                                <input type="file" class="form-control" name="slider_image">
                                                <input type="hidden" class="form-control" name="slider_edit_id" value="{{$slid->id}}">
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


    <div class="modal fade" id="createslider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('admin.slider.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Slider Image</label>
                        <input type="file" class="form-control" name="slider_image">
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
