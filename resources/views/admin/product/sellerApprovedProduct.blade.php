@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Seller Approved Product</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Product List</h4>
                <div class="table-responsive">

                    <table class="table mb-0" id="topcat">
                        <thead>
                        <tr>
                            <th class="text-center" >Seller Name</th>
                            <th class="text-center" >Product Name</th>
                            <th class="text-center" >Product Current Price</th>
                            <th class="text-center" >Product Main Image</th>
                            <th class="text-center" >Product Status</th>
                            <th class="text-center" >Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $pro)
                            <tr>
                                <th class="text-center" scope="row">{{$pro->seller->name}}</th>
                                <th class="text-center" scope="row">{{$pro->product_name}}</th>
                                <td class="text-center" >TK.{{$pro->new_price}}</td>
                                <td class="text-center" ><img src="{{asset($pro->main_image)}}" style="height: 50px;width: 50px;"></td>
                                <td class="text-center" >
                                    @if ($pro->status == 3)
                                        Pending
                                    @elseif($pro->status == 4)
                                        Approved
                                    @elseif($pro->status == 5)
                                        Rejected
                                    @else
                                        Not Set
                                    @endif
                                </td>
                                <td class="text-center" >
                                    <a href="{{route('admin.seller.product.update',$pro->id)}}">

                                        <button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </button>
                                    </a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteendcat{{$pro->id}}"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>



                            <div class="modal fade" id="deleteendcat{{$pro->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Product</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.delete.product')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    are you sure to delete this product ?
                                                    <input type="hidden" class="form-control" name="product_delete_id" value="{{$pro->id}}">
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


                        @endforeach

                        </tbody>
                    </table>
                </div>
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
