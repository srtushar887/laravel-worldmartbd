@extends('layouts.admin')
@section('admin')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Payment Gateway</h4>
            </div>
        </div>
    </div>

    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createspgatewayimage">Create New Payment Gateway</button>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Slider List</h4>
                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Gateway Name</th>
                            <th>Gateway Address</th>
                            <th>Gateway Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                                                @foreach($payment as $slid)
                                                    <tr>
                                                        <td>{{$slid->name}}</td>
                                                        <td>{{$slid->address}}</td>
                                                        <td><img src="{{asset($slid->image)}}" style="height: 50px;width: 50px;"></td>
                                                        <td>
                                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editgateway{{$slid->id}}"><i class="fas fa-edit"></i> </button>
                                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deletegateway{{$slid->id}}"><i class="fas fa-trash"></i> </button>
                                                        </td>
                                                    </tr>


                                                    <div class="modal fade" id="deletegateway{{$slid->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <form action="{{route('admin.payment.gateway.delete')}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Payment Gateway</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            are you sure to delete this payment gateway ?
                                                                            <input type="hidden" class="form-control" name="gateway_delete_id" value="{{$slid->id}}">
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




                                                    <div class="modal fade" id="editgateway{{$slid->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <form action="{{route('admin.payment.gateway.update')}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Update Payment Gateway</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Payment Gateway Name</label>
                                                                            <input type="text" class="form-control" name="name" value="{{$slid->name}}">
                                                                            <input type="hidden" class="form-control" name="gateway_edit_id" value="{{$slid->id}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Payment Gateway Address</label>
                                                                            <input type="text" class="form-control" name="address" value="{{$slid->address}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Image</label>
                                                                            <br>
                                                                            <img src="{{asset($slid->image)}}" style="height: 100px;width: 100px;">
                                                                            <input type="file" class="form-control" name="image">
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


    <div class="modal fade" id="createspgatewayimage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('admin.payment.gateway.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Create Payment Gateway</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Payment Gateway Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label>Payment Gateway Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="image">
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
