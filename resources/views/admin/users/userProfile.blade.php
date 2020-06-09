@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                </div>
                <h4 class="page-title">User Name : {{$user->name}}</h4>
            </div>
        </div>
    </div>
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#changepass{{$user->id}}">Change Password</button>
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#accountaction{{$user->id}}">Account Action</button>
    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#deleteUser{{$user->id}}">Delete User</button>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="table-responsive">

                    <table class="table mb-0">

                        <tbody>
                        <tr>
                            <th scope="row">User Name</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone</th>
                            <td>{{$user->phone}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Address</th>
                            <td>{{$user->address}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Country</th>
                            <td>{{$user->country}}</td>
                        </tr>
                        <tr>
                            <th scope="row">City</th>
                            <td>{{$user->city}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Postal Code</th>
                            <td>{{$user->postal_code}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Zip Code</th>
                            <td>{{$user->zip_code}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Profile Image	</th>
                            <td>
                                @if (!empty($user->photo))
                                    <img src="{{asset($user->photo)}}" style="height: 100px;width: 100px">
                                @else
                                    <img src="https://www.sackettwaconia.com/wp-content/uploads/default-profile.png" style="height: 100px;width: 100px">
                                @endif

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Status</th>
                            <td>
                                @if ($user->status == 0)
                                    Pending
                                @elseif($user->status == 1)
                                    Active
                                @elseif($user->status == 2)
                                    Blocked
                                @else
                                    Not Set

                                @endif
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>



    <div class="modal fade" id="deleteUser{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.user.delete')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete {{$user->name}}?
                            <input type="hidden" value="{{$user->id}}" class="form-control" name="user_delete_id">
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


    <div class="modal fade" id="changepass{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.user.pass.change')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Enter Password</label>
                            <input type="password" class="form-control" name="password" required>
                            <input type="hidden" value="{{$user->id}}" class="form-control" name="user_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="accountaction{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Account Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.user.account.action')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Select Action</label>
                            <select class="form-control" name="action">
                                <option value="0" {{$user->status == 0 ? 'selected' : ''}}>Pending</option>
                                <option value="1" {{$user->status == 1 ? 'selected' : ''}}>Active</option>
                                <option value="2" {{$user->status == 2 ? 'selected' : ''}}>Bloack</option>
                            </select>
                            <input type="hidden" value="{{$user->id}}" class="form-control" name="user_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addbalnce" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Add Balance</label>
                            <input type="number" class="form-control" name="balance">
                            <input type="hidden" value="{{$user->id}}" class="form-control" name="user_id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@stop
