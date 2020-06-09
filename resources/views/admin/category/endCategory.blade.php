@extends('layouts.admin')
@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
@endsection
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">End Category</h4>
            </div>
        </div>
    </div>



    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createmiddlecat">Create new End Category</button>
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">End Category List</h4>
                <div class="table-responsive">

                    <table class="table mb-0" id="topcat">
                        <thead>
                        <tr>
                            <th>Top Category Name</th>
                            <th>Middle Category Name</th>
                            <th>End Category Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($end_cats as $ecat)
                            <tr>
                                <th scope="row">
                                    @if ($ecat->top_cat)
                                        {{$ecat->top_cat->top_cat_name}}
                                    @else
                                        Not Set
                                    @endif

                                </th>
                                <th scope="row">
                                    @if ($ecat->mid_cat)
                                        {{$ecat->mid_cat->mid_cat_name}}
                                    @else
                                        Not Set
                                    @endif

                                </th>
                                <td>{{$ecat->end_cat_name}}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateendcat{{$ecat->id}}"><i class="fas fa-edit"></i> </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteendcat{{$ecat->id}}"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>



                            <div class="modal fade" id="deleteendcat{{$ecat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete End Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.delete.endcat')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    are you sure to delete this end category ?
                                                    <input type="hidden" class="form-control" name="end_cat_delete_id" value="{{$ecat->id}}">
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




                            <div class="modal fade" id="updateendcat{{$ecat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update End Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.update.endcat')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Select Top Category</label>
                                                    <select class="form-control" name="top_cat_id">
                                                        <option value="0">select any</option>
                                                        @foreach($top_cats as $topcat)
                                                            <option value="{{$topcat->id}}" {{$ecat->top_cat_id == $topcat->id ? 'selected' : ''}}>{{$topcat->top_cat_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Select Middle Category</label>
                                                    <select class="form-control" name="mid_cat_id">
                                                        <option value="0">select any</option>
                                                        @foreach($middle_cats as $midcat)
                                                            <option value="{{$midcat->id}}" {{$ecat->mid_cat_id == $midcat->id ? 'selected' : ''}}>{{$midcat->mid_cat_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>End Category Name</label>
                                                    <input type="text" class="form-control" name="end_cat_name" value="{{$ecat->end_cat_name}}">
                                                    <input type="hidden" class="form-control" name="end_cat_edit_id" value="{{$ecat->id}}">
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Create End Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.create.endcat')}}" method="post" id="endcatfrom">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Select Top Category</label>
                            <select class="form-control topcatid" name="top_cat_id" required>
                                <option value="0">select any</option>
                                @foreach($top_cats as $topcat)
                                    <option value="{{$topcat->id}}">{{$topcat->top_cat_name}}</option>
                                @endforeach
                            </select>
                            <p class="text-danger topcaterror">Please Select Top Category</p>
                        </div>
                        <div class="form-group">
                            <label>Select Middle Category</label>
                            <select class="form-control midcatid" name="mid_cat_id" required disabled>
                                <option value="0">select any</option>
                                <div class="midctdata"></div>
                            </select>
                            <p class="text-danger midcaterror">Please Select Mid Category</p>
                        </div>
                        <div class="form-group">
                            <label>End Category Name</label>
                            <input type="text" class="form-control endcatname" name="end_cat_name" disabled  required>
                            <p class="text-danger endcaterror">Please Enter Middle Category Name</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="endcatsubmit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@stop
@section('js')
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $('.topcaterror').hide();
        $('.midcaterror').hide();
        $('.endcaterror').hide();
        $(document).ready(function () {
                $('#topcat').DataTable();


                $('#endcatsubmit').click(function (e) {
                    e.preventDefault();

                    var topcat = $('.topcatid').val();
                    var midcat = $('.midcatid').val();
                    var endcat = $('.endcatname').val();

                    if (topcat === 0 && midcat === 0 && endcat === "")
                    {
                        $('.topcaterror').show();
                        $('.midcaterror').show();
                        $('.endcaterror').show();
                    }else if (topcat == 0){
                        $('.topcaterror').show();
                        $('.midcaterror').hide();
                        $('.endcaterror').hide();
                    }else if (midcat == 0){
                        $('.topcaterror').hide();
                        $('.midcaterror').show();
                        $('.endcaterror').hide();
                    }else if (endcat == ""){
                        $('.topcaterror').hide();
                        $('.midcaterror').hide();
                        $('.endcaterror').show();
                    }else{
                        $('#endcatfrom').submit();
                    }


                });

                $('.topcatid').change(function () {
                    var id = $(this).val();
                    $.ajax({
                        type : "POST",
                        url: "{{route('get_mid_cat_data_ajax')}}",
                        data : {
                            '_token' : "{{csrf_token()}}",
                            'id' : id,
                        },
                        success:function(data){
                            $('.midcatid').empty();
                            if (data.length > 0){
                                $(".midcatid").prop("disabled", false);
                                $.each(data,function (index,value) {
                                    $('.midcatid').append(
                                        `<option class="disalldata" value="${value.id}">${value.mid_cat_name}</option>`
                                    )
                                });

                                var mid =  $('.midcatid').val();
                                if (mid != 0){
                                    $(".endcatname").prop("disabled", false);
                                }else{
                                    $(".endcatname").prop("disabled", true);
                                }


                            }else {
                                $(".midcatid").prop("disabled", true);
                                $(".endcatname").prop("disabled", true);
                                $('.midcatid').val("0")
                                $('.endcatname').val("")
                                $('.midcatid').append(
                                    `<option class="disalldata" value="0">Sorry! No Middle Category Found</option>`
                                )
                            }

                        }
                    });
                });


                $('.midcatid').change(function () {
                    var mid = $(this).val();
                    console.log(mid)
                    if (mid === 0)
                    {
                        $(".endcatname").prop("disabled", true);
                    }else {
                        $(".endcatname").prop("disabled", false);
                    }


                })




        });
    </script>
@stop
