@extends('layouts.dealer')
@section('dealer')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Total Product</h5>
                <h3 class="mb-3" data-plugin="counterup"></h3>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Published Product</h5>
                <h3 class="mb-3" data-plugin="counterup"></h3>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">UnPublished Product</h5>
                <h3 class="mb-3" data-plugin="counterup"></h3>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Users</h5>
                <h3 class="mb-3" data-plugin="counterup"></h3>
            </div>
        </div>
    </div>

@stop
