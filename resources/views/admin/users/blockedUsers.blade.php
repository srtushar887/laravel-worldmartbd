@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Blocked Users</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Users List</h4>
                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>User name</th>
                            <th>User Email</th>
                            <th>User Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->name}}</th>
                                <td>{{$user->email}}</td>
                                <td>{{$user->email}}</td>
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
                                <td>
                                    <a href="{{route('user.profile.view',$user->id)}}">
                                        <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> </button>
                                    </a>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-edit"></i> </button>
                                </td>
                            </tr>


                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">User Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
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

@stop
