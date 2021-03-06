<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/abstack/layouts/green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 May 2020 17:42:27 GMT -->
<head>
    <meta charset="utf-8" />
    <title>{{$gn->site_name}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset($gn->icon)}}">

    <!-- App css -->
    <link href="{{asset('assets/admin/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/admin/')}}/css/app.min.css" rel="stylesheet" type="text/css" />
    @yield('css')
</head>

<body>

<!-- Begin page -->
<div id="wrapper">


    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    @if (!empty(Auth::user('admin')->photo))

                        <img src="{{asset('assets/admin/')}}/images/users/avatar-1.jpg" alt="user-image" class="rounded-circle">
                    @else
                        <img src="https://www.pngitem.com/pimgs/m/22-223968_default-profile-picture-circle-hd-png-download.png" alt="user-image" class="rounded-circle">
                    @endif
                    <span class="ml-1">{{Auth::user('admin')->name}} <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user"></i>
                        <span>Profile</span>
                    </a>

                    <!-- item-->

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock"></i>
                        <span>Change Password</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
                    <a href="{{route('admin.logout')}}" class="dropdown-item notify-item">
                        <i class="fe-log-out"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>
        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('admin.dashboard')}}" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{asset($gn->logo)}}" alt="" style="width: 100%">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="{{asset('assets/admin/')}}/images/logo-sm.png" alt="" height="28">
                        </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu"></i>
                </button>
            </li>


        </ul>
    </div>
    <!-- end Topbar -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Navigation</li>

                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <i class="fe-airplay"></i>
{{--                            <span class="badge badge-danger badge-pill float-right">3</span>--}}
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.general.settings')}}">
                            <i class="fe-airplay"></i>
                            <span> General Settings </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.payment.gateway')}}">
                            <i class="fe-airplay"></i>
                            <span> Payment Gateway </span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-briefcase"></i>
                            <span> Products Data</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('admin.top.category')}}">Top Category</a></li>
                            <li><a href="{{route('admin.middle.category')}}">Middle Category</a></li>
                            <li><a href="{{route('admin.end.category')}}">End Category</a></li>
                            <li><a href="{{route('admin.product.brand')}}">Product Brand</a></li>
                            <li><a href="{{route('admin.product.size')}}">Product Size</a></li>
                            <li><a href="{{route('admin.product.color')}}">Product Color</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('admin.product')}}">
                            <i class="fe-airplay"></i>
                            <span> Product Management </span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-briefcase"></i>
                            <span> User Order</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('admin.user.new.order')}}">New Order</a></li>
                            <li><a href="{{route('admin.user.delivered.order')}}">Delivered Order</a></li>
                            <li><a href="{{route('admin.user.rejected.order')}}">Rejected Order</a></li>
                            <li><a href="{{route('admin.user.canceled.order')}}">Cancel Order</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-briefcase"></i>
                            <span> Dealer Order</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('admin.dealer.new.order')}}">New Order</a></li>
                            <li><a href="{{route('admin.dealer.delivered.order')}}">Delivered Order</a></li>
                            <li><a href="{{route('admin.dealer.rejected.order')}}">Rejected Order</a></li>
                            <li><a href="{{route('admin.dealer.cancel.order')}}">Cancel Order</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-briefcase"></i>
                            <span> Seller Product</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('admin.seller.pending.product')}}">Pending Product</a></li>
                            <li><a href="{{route('admin.seller.approved.product')}}">Approved Product</a></li>
                            <li><a href="{{route('admin.seller.rejected.product')}}">Rejected Product</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-briefcase"></i>
                            <span> User Account</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('admin.all.users')}}">All Users</a></li>
                            <li><a href="{{route('admin.active.users')}}">Active Users</a></li>
                            <li><a href="{{route('admin.blocked.users')}}">Blocked Users</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-briefcase"></i>
                            <span> Dealer Account</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('admin.create.dealer.account')}}">Create Dealers Account</a></li>
                            <li><a href="{{route('admin.all.dealer')}}">All Dealers</a></li>
                            <li><a href="{{route('admin.active.dealer')}}">Active Dealers</a></li>
                            <li><a href="{{route('admin.blocked.users')}}">Blocked Dealers</a></li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript: void(0);">
                            <i class="fe-briefcase"></i>
                            <span> Frontend Control</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('admin.home.slider')}}">Home Slider</a></li>
                            <li><a href="{{route('admin.static.data')}}">Static Data</a></li>
                            <li><a href="{{route('admin.social.icon')}}">Social Icon</a></li>
                        </ul>
                    </li>


                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                @yield('admin')


            </div> <!-- end container-fluid -->

        </div> <!-- end content -->



        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        2017 - 2019 &copy; Abstack theme by <a href="#">Coderthemes</a>
                    </div>

                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{asset('assets/admin/')}}/js/vendor.min.js"></script>

<!-- Chart JS -->
<script src="{{asset('assets/admin/')}}/libs/chart-js/Chart.bundle.min.js"></script>

<!-- Init js -->


<!-- App js -->
<script src="{{asset('assets/admin/')}}/js/app.min.js"></script>
@yield('js')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')
</body>

<!-- Mirrored from coderthemes.com/abstack/layouts/green/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 02 May 2020 17:43:46 GMT -->
</html>
