@extends('layouts.admin')
@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Social Icon</h4>
            </div>
        </div>
    </div>

    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createsocialicon">Create New Social Icon</button>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Slider List</h4>
                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Social Icon Name</th>
                            <th>Social Icon</th>
                            <th>Social Icon Link</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sicoals as $slid)
                            <tr>
                                <td>{{$slid->name}} </td>
                                <td>{{$slid->icon}} </td>
                                <td>{!! $slid->link !!}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editicon{{$slid->id}}"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteicon{{$slid->id}}"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>


                            <div class="modal fade" id="deleteicon{{$slid->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{route('admin.social.icon.delete')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete Social Icon</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    are you sure to delete this socail icon ?
                                                    <input type="hidden" class="form-control" name="icon_delete_id" value="{{$slid->id}}">
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




                            <div class="modal fade" id="editicon{{$slid->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <form action="{{route('admin.social.icon.update')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Social Icon</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Social Icon Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{$slid->name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Social Icon</label>
                                                    <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank"> ICON LINK</a>
                                                    <input type="text" class="form-control" name="icon" value="{{$slid->icon}}">
                                                    <input type="hidden" class="form-control" name="icon_edit_id" value="{{$slid->id}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Social Icon Link</label>
                                                    <input type="text" class="form-control" name="link" value="{{$slid->link}}">
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


    <div class="modal fade" id="createsocialicon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('admin.social.icon.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Create Social Icon</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Social Icon Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Social Icon</label>
                            <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank"> ICON LINK</a>
                            <input type="text" class="form-control" name="icon">
                        </div>
                        <div class="form-group">
                            <label>Social Icon Link</label>
                            <input type="text" class="form-control" name="link">
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
