<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="{{$gn->site_name}}" />
    <meta name="keywords" content="bootstrap,responsive,template,developer" />
    <meta name="author" content="tusher" />
    <meta name="sitemap_link" content="https://worldmartbd.com/" />

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{$gn->site_name}}" />
    <meta itemprop="description" content="{{$gn->site_name}}" />
    <meta itemprop="image" content="{{$gn->logo}}" />

    <!-- Favicon -->
    <link type="image/x-icon" href="{{asset($gn->icon)}}" rel="shortcut icon" />

    <title>{{$gn->site_name}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/')}}/frontend/css/bootstrap.min.css" type="text/css" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('assets/')}}/frontend/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/')}}/frontend/css/line-awesome.min.css" type="text/css" />

    <link type="text/css" href="{{asset('assets/')}}/frontend/css/bootstrap-tagsinput.css" rel="stylesheet" />
    <link type="text/css" href="{{asset('assets/')}}/frontend/css/jodit.min.css" rel="stylesheet" />
    <link type="text/css" href="{{asset('assets/')}}/frontend/css/sweetalert2.min.css" rel="stylesheet" />
    <link type="text/css" href="{{asset('assets/')}}/frontend/css/slick.css" rel="stylesheet" />
    <link type="text/css" href="{{asset('assets/')}}/frontend/css/xzoom.css" rel="stylesheet" />
    <link type="text/css" href="{{asset('assets/')}}/frontend/css/jquery.share.css" rel="stylesheet" />
    <link type="text/css" href="{{asset('assets/')}}/frontend/css/intlTelInput.min.css" rel="stylesheet" />

    <!-- Global style (main) -->
    <link type="text/css" href="{{asset('assets/')}}/frontend/css/active-shop.css" rel="stylesheet" media="screen" />

    <!--Spectrum Stylesheet [ REQUIRED ]-->
{{--    <link href="{{asset('assets/')}}/frontend/css/spectrum.css" rel="stylesheet" />--}}

    <link type="text/css" href="{{asset('assets/')}}/frontend/css/main.css" rel="stylesheet" />

    <!-- Facebook Chat style -->
    <link href="{{asset('assets/')}}/frontend/css/fb-style.css" rel="stylesheet" />

    <!-- color theme -->
    <link href="{{asset('assets/')}}/frontend/css/colors/default.css" rel="stylesheet" />

    <!-- Custom style -->
    <link type="text/css" href="{{asset('assets/')}}/frontend/css/custom-style.css" rel="stylesheet" />

    <!-- jQuery -->
    <script src="{{asset('assets/')}}/frontend/js/vendor/jquery.min.js"></script>
</head>
<body>
<!-- MAIN WRAPPER -->
<div class="body-wrap shop-default shop-cards shop-tech gry-bg">
    <!-- Header -->
    <div class="header bg-white">
        <!-- Top Bar -->
        <div class="top-navbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col">
                        <ul class="inline-links">
                            <li>
                                <a href="{{route('front')}}" class="top-bar-item">Hot Line : {{$gn->site_phone}}</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-5 text-right d-none d-lg-block">
                        <ul class="inline-links">
                            <li>
                                <a href="" class="top-bar-item">Track Order</a>
                            </li>
                            <li>
                                <a href="{{route('dealer.login')}}" class="top-bar-item">Be a Dealer</a>
                            </li>
                            <li>
                                <a href="{{route('seller.login')}}" class="top-bar-item">Be a Seller</a>
                            </li>
                            @guest
                            <li>
                                <a href="{{route('login')}}" class="top-bar-item">Login</a>
                            </li>
                            <li>
                                <a href="{{route('register')}}" class="top-bar-item">Registration</a>
                            </li>
                            @else
                                <li>
                                    <a href="{{route('home')}}" class="top-bar-item">Dashboard</a>
                                </li>
                                <li>
                                    <a class="top-bar-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Top Bar -->

        <!-- mobile menu -->
        <div class="mobile-side-menu d-lg-none">
            <div class="side-menu-overlay opacity-0" onclick="sideMenuClose()"></div>
            <div class="side-menu-wrap opacity-0">
                <div class="side-menu closed">
                    <div class="side-menu-header">
                        <div class="side-menu-close" onclick="sideMenuClose()">
                            <i class="la la-close"></i>
                        </div>

                        <div class="widget-profile-box px-3 py-4 d-flex align-items-center">
                            <div class="image" style="background-image:url('{{asset('assets/')}}/frontend/images/icons/user-placeholder.jpg')"></div>
                        </div>
                        <div class="side-login px-3 pb-3">
                            <a href="http://shop.activeitzone.com/users/login">Sign In</a>
                            <a href="http://shop.activeitzone.com/users/registration">Registration</a>
                        </div>
                    </div>
                    <div class="side-menu-list px-3">
                        <ul class="side-user-menu">
                            <li>
                                <a href="http://shop.activeitzone.com">
                                    <i class="la la-home"></i>
                                    <span>Home</span>
                                </a>
                            </li>

                            <li>
                                <a href="http://shop.activeitzone.com/dashboard">
                                    <i class="la la-dashboard"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="http://shop.activeitzone.com/purchase_history">
                                    <i class="la la-file-text"></i>
                                    <span>Purchase History</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://shop.activeitzone.com/compare">
                                    <i class="la la-refresh"></i>
                                    <span>Compare</span>
                                    <span class="badge" id="compare_items_sidenav">1</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://shop.activeitzone.com/cart">
                                    <i class="la la-shopping-cart"></i>
                                    <span>Cart</span>
                                    <span class="badge" id="cart_items_sidenav">0</span>
                                </a>
                            </li>
                            <li>
                                <a href="http://shop.activeitzone.com/wishlists">
                                    <i class="la la-heart-o"></i>
                                    <span>Wishlist</span>
                                </a>
                            </li>

                            <li>
                                <a href="http://shop.activeitzone.com/wallet">
                                    <i class="la la-dollar"></i>
                                    <span>My Wallet</span>
                                </a>
                            </li>

                            <li>
                                <a href="http://shop.activeitzone.com/profile">
                                    <i class="la la-user"></i>
                                    <span>Manage Profile</span>
                                </a>
                            </li>

                            <li>
                                <a href="http://shop.activeitzone.com/sent-refund-request" class="">
                                    <i class="la la-file-text"></i>
                                    <span class="category-name">
                                                Sent Refund Request
                                            </span>
                                </a>
                            </li>

                            <li>
                                <a href="http://shop.activeitzone.com/earning-points" class="">
                                    <i class="la la-dollar"></i>
                                    <span class="category-name">
                                                Earning Points
                                            </span>
                                </a>
                            </li>

                            <li>
                                <a href="http://shop.activeitzone.com/support_ticket" class="">
                                    <i class="la la-support"></i>
                                    <span class="category-name">
                                                Support Ticket
                                            </span>
                                </a>
                            </li>
                        </ul>
                        <div class="sidebar-widget-title py-0">
                            <span>Categories</span>
                        </div>
                        <ul class="side-seller-menu">
                            <li>
                                <a href="http://shop.activeitzone.com/search?category=Women-Clothing-Fashion" class="text-truncate">
                                    <img
                                        class="cat-image lazyload"
                                        src="{{asset('assets/')}}/frontend/images/placeholder.jpg"
                                        data-src="{{asset('assets/')}}/uploads/categories/icon/WOyVsKr1E4lvBcc1Hksf10IiwpEb53zJVc3B2kmr.png"
                                        width="13"
                                        alt="Women Clothing &amp; Fashion"
                                    />
                                    <span>Women Clothing &amp; Fashion</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end mobile menu -->

        <div class="position-relative logo-bar-area">
            <div class="">
                <div class="container">
                    <div class="row no-gutters align-items-center">
                        <div class="col-lg-3 col-8">
                            <div class="d-flex">
                                <div class="d-block d-lg-none mobile-menu-icon-box">
                                    <!-- Navbar toggler  -->
                                    <a href="" >
                                        <div class="hamburger-icon">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </a>
                                </div>

                                <!-- Brand/Logo -->
                                <a class="navbar-brand w-100" href="{{route('front')}}">
                                    <img src="{{asset($gn->logo)}}" alt="{{$gn->site_name}}" />
                                </a>

                                @yield('hove_cat_icon')

                            </div>
                        </div>
                        <div class="col-lg-9 col-4 position-static">
                            <div class="d-flex w-100">
                                <div class="search-box flex-grow-1 px-4">
                                    <form action="{{route('product.search.header')}}" method="get">
                                        @csrf
                                        <div class="d-flex position-relative">
                                            <div class="d-lg-none search-box-back">
                                                <button class="" type="button"><i class="la la-long-arrow-left"></i></button>
                                            </div>
                                            <div class="w-100">
                                                <input type="text" aria-label="Search" id="search" name="q" class="w-100" placeholder="I am shopping for..." autocomplete="off" />
                                            </div>
                                            <div class="form-group category-select d-none d-xl-block">
                                                <select class="form-control selectpicker" name="category">
                                                    <option value="">All Categories</option>
                                                    <?php
                                                        $all_cats_sr = \App\top_category::all();
                                                    ?>
                                                    @foreach($all_cats_sr as $tcatsr)
                                                    <option value="{{$tcatsr->id}}">{{$tcatsr->top_cat_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button class="d-none d-lg-block" type="submit">
                                                <i class="la la-search la-flip-horizontal"></i>
                                            </button>
                                            <div class="typed-search-box d-none">
                                                <div class="search-preloader">
                                                    <div class="loader">
                                                        <div></div>
                                                        <div></div>
                                                        <div></div>
                                                    </div>
                                                </div>
                                                <div class="search-nothing d-none"></div>
                                                <div id="search-content"></div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="logo-bar-icons d-inline-block ml-auto">
                                    <div class="d-inline-block d-lg-none">
                                        <div class="nav-search-box">
                                            <a href="#" class="nav-box-link">
                                                <i class="la la-search la-flip-horizontal d-inline-block nav-box-icon"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-inline-block" data-hover="dropdown">
                                        <?php
                                        $carts = \Gloudemans\Shoppingcart\Facades\Cart::content();
                                        $counts = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();
                                        ?>
                                        <div class="nav-cart-box dropdown" id="cart_items">
                                            <a href="" class="nav-box-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="la la-shopping-cart d-inline-block nav-box-icon"></i>
                                                <span class="nav-box-text d-none d-xl-inline-block">Cart</span>
                                                <span class="nav-box-number">{{$counts}}</span>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-right px-0">
                                                <li>



                                                    @if (count($carts) > 0)
                                                            <div class="dropdown-cart px-0">
                                                                <div class="dc-header">
                                                                    <h3 class="heading heading-6 strong-700">Cart Items</h3>
                                                                </div>
                                                                <div class="dropdown-cart-items c-scrollbar">
                                                                    <div class="dc-item">
                                                                        @foreach($carts as $cart)
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="dc-image">
                                                                                <a href="{{route('product.details',$cart->id)}}">
                                                                                    <img loading="lazy" src="{{asset($cart->options->image)}}" class="img-fluid" alt="{{$cart->name}}">
                                                                                </a>
                                                                            </div>
                                                                            <div class="dc-content">
                                                                                <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                                                                                    <a href="{{route('product.details',$cart->id)}}">
                                                                                        {{$cart->name}}
                                                                                    </a>
                                                                                </span>
                                                                                <span class="dc-quantity">{{$cart->qty}}x</span>
                                                                                <span class="dc-price">${{$cart->price}}</span>
                                                                            </div>
                                                                            <div class="dc-actions">
                                                                                <a href="{{route('cart.remove.single',$cart->rowId)}}">
                                                                                    <button>
                                                                                        <i class="la la-close"></i>
                                                                                    </button>
                                                                                </a>

                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="dc-item py-3">
                                                                    <span class="subtotal-text">Subtotal</span>
                                                                    <?php
                                                                    $sub = \Gloudemans\Shoppingcart\Facades\Cart::content()->sum('price');
                                                                    ?>
                                                                    <span class="subtotal-amount">${{$sub}}</span>
                                                                </div>
                                                                <div class="py-2 text-center dc-btn">
                                                                    <ul class="inline-links inline-links--style-3">
                                                                        <li class="pr-3">
                                                                            <a href="{{route('view.cart')}}" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1">
                                                                                <i class="la la-shopping-cart"></i> View cart
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="{{route('user.checkout')}}" class="link link--style-1 text-capitalize btn btn-base-1 px-3 py-1 light-text">
                                                                                <i class="la la-mail-forward"></i> Checkout
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="dropdown-cart px-0">
                                                                <div class="dc-header">
                                                                    <h3 class="heading heading-6 strong-700">Your Cart is empty</h3>
                                                                </div>
                                                            </div>
                                                    @endif



                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @yield('hover_cat')
        </div>
        <!-- Navbar -->

{{--        <div class="main-nav-area d-none d-lg-block">--}}
{{--            <nav class="navbar navbar-expand-lg navbar--bold navbar--style-2 navbar-light bg-default">--}}
{{--                <div class="container">--}}
{{--                    <div class="collapse navbar-collapse align-items-center justify-content-center" id="navbar_main">--}}
{{--                        <ul class="navbar-nav">--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link text-left" href="http://shop.activeitzone.com/search?q=iphone%20xs%20max"><h5>Home</h5></a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link text-left" href="http://shop.activeitzone.com/search?q=iphone%20xs%20max"><h5>Home</h5></a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link text-left" href="http://shop.activeitzone.com/search?q=iphone%20xs%20max"><h5>Home</h5></a>--}}
{{--                            </li><li class="nav-item ">--}}
{{--                                <a class="nav-link text-left" href="http://shop.activeitzone.com/search?q=iphone%20xs%20max"><h5>Home</h5></a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item ">--}}
{{--                                <a class="nav-link text-left" href="http://shop.activeitzone.com/search?q=iphone%20xs%20max"><h5>Home</h5></a>--}}
{{--                            </li>--}}


{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </nav>--}}
{{--        </div>--}}
    </div>


    @yield('front')
    <section class="slice-sm footer-top-bar bg-white">
        <div class="container sct-inner">
            <div class="row no-gutters">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-top-box text-center">
                        <a href="{{route('dealer.policy')}}">
                            <i class="la la-file-text"></i>
                            <h4 class="heading-5">Dealer Policy</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-top-box text-center">
                        <a href="{{route('return.policy')}}">
                            <i class="la la-mail-reply"></i>
                            <h4 class="heading-5">Return Policy</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-top-box text-center">
                        <a href="{{route('support.policy')}}">
                            <i class="la la-support"></i>
                            <h4 class="heading-5">Support Policy</h4>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- FOOTER -->
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-5 col-xl-4 text-center text-md-left">
                        <div class="col">
                            <a href="http://shop.activeitzone.com" class="d-block">
                                <img loading="lazy" src="{{asset($gn->logo)}}" alt="Active Ecommerce CMS" height="44" />
                            </a>
                            <?php
                                $h_footer = \App\static_data::first();
                            ?>
                            <p class="mt-3">{!! $h_footer->home_footer !!}</p>
                            <div class="d-inline-block d-md-block">
                                <form class="form-inline" method="POST" action="http://shop.activeitzone.com/subscribers">
                                    <input type="hidden" name="_token" value="FU6BwnPRs9yFECGFFJsKsZEoBaYuVPCACFO5p9IH" />
                                    <div class="form-group mb-0">
                                        <input type="email" class="form-control" placeholder="Your Email Address" name="email" required />
                                    </div>
                                    <button type="submit" class="btn btn-base-1 btn-icon-left">
                                        Subscribe
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-xl-1 col-md-4">
                        <div class="col text-center text-md-left">
                            <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                                Contact Info
                            </h4>
                            <ul class="footer-links contact-widget">
                                <li>
                                    <span class="d-block opacity-5">Address:</span>
                                    <span class="d-block">{!! $gn->site_address !!}</span>
                                </li>
                                <li>
                                    <span class="d-block opacity-5">Phone:</span>
                                    <span class="d-block">+{{$gn->site_phone}}</span>
                                </li>
                                <li>
                                    <span class="d-block opacity-5">Email:</span>
                                    <span class="d-block">
                                                <a href="mailto:admin@example.com">{{$gn->site_email}}</a>
                                            </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="col text-center text-md-left">
                            <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                                Useful Link
                            </h4>
                            <ul class="footer-links">
                                <li>
                                    <a href="{{route('front')}}" title="">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('aboutus')}}" title="">
                                        About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('all.product')}}" title="">
                                        Shop
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('pricacy.policy')}}" title="">
                                        Privacy & Policy
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('terms')}}" title="">
                                        Terms & Conditions
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-2">
                        <div class="col text-center text-md-left">
                            <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                                My Account
                            </h4>

                            <ul class="footer-links">
                                <li>
                                    <a href="{{route('login')}}" title="Login">
                                        Login
                                    </a>
                                </li>
                                <li>
                                    <a href="" title="Order History">
                                        Order History
                                    </a>
                                </li>
                                <li>
                                    <a href="" title="Track Order">
                                        Track Order
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col text-center text-md-left">
                            <div class="mt-4">
                                <h4 class="heading heading-xs strong-600 text-uppercase mb-2">
                                    Be a Dealer
                                </h4>
                                <a href="" class="btn btn-base-1 btn-icon-left">
                                    Apply Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom py-3 sct-color-3">
            <div class="container">
                <div class="row row-cols-xs-spaced flex flex-items-xs-middle">
                    <div class="col-md-4">
                        <div class="copyright text-center text-md-left">
                            <ul class="copy-links no-margin">
                                <li>
                                    <?php
                                        $date = \Carbon\Carbon::now()->format('Y');
                                    ?>
                                    © {{$date}} {{$gn->site_name}}.
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <ul class="text-center my-3 my-md-0 social-nav model-2">
                            <?php
                                $icons = \App\social_icon::all();
                            ?>
                            @foreach($icons as $icon)
                            <li>
                                <a href="{!! $icon->link !!}" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="{{$icon->name}}">
                                    <i class="{{$icon->icon}}"></i>
                                </a>
                            </li>
                                @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center text-md-right">
                            <ul class="inline-links">
                                <?php
                                    $gateways = \App\payment_gateway_image::all();
                                ?>
                                @foreach($gateways as $gateway)
                                <li>
                                    <img loading="lazy" alt="{{$gateway->name}}" src="{{asset($gateway->image)}}" style="height: 35px;width: 35px;" />
                                </li>
                                    @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        function confirm_modal(delete_url) {
            jQuery("#confirm-delete").modal("show", { backdrop: "static" });
            document.getElementById("delete_link").setAttribute("href", delete_url);
        }
    </script>

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>

                <div class="modal-body">
                    <p>Are you sure? (Note: All information relevant to this will be deleted too.)</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a id="delete_link" class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addToCart">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom product-modal" id="modal-size" role="document">
            <div class="modal-content position-relative">
                <div class="c-preloader">
                    <i class="fa fa-spin fa-spinner"></i>
                </div>
                <button type="button" class="close absolute-close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="addToCart-modal-body"></div>
            </div>
        </div>
    </div>
</div>
<!-- END: body-wrap -->

<!-- SCRIPTS -->
<a href="#" class="back-to-top btn-back-to-top"></a>

<!-- Core -->
<script src="{{asset('assets/')}}/frontend/js/vendor/popper.min.js"></script>
<script src="{{asset('assets/')}}/frontend/js/vendor/bootstrap.min.js"></script>

<!-- Plugins: Sorted A-Z -->
<script src="{{asset('assets/')}}/frontend/js/jquery.countdown.min.js"></script>
<script src="{{asset('assets/')}}/frontend/js/select2.min.js"></script>
<script src="{{asset('assets/')}}/frontend/js/nouislider.min.js"></script>

<script src="{{asset('assets/')}}/frontend/js/sweetalert2.min.js"></script>
<script src="{{asset('assets/')}}/frontend/js/slick.min.js"></script>

<script src="{{asset('assets/')}}/frontend/js/jquery.share.js"></script>

<script src="{{asset('assets/')}}/frontend/js/bootstrap-tagsinput.min.js"></script>
<script src="{{asset('assets/')}}/frontend/js/jodit.min.js"></script>
<script src="{{asset('assets/')}}/frontend/js/xzoom.min.js"></script>
<script src="{{asset('assets/')}}/frontend/js/fb-script.js"></script>
<script src="{{asset('assets/')}}/frontend/js/lazysizes.min.js"></script>
<script src="{{asset('assets/')}}/frontend/js/intlTelInput.min.js"></script>

<!-- App JS -->
<script src="{{asset('assets/')}}/frontend/js/active-shop.js"></script>
<script src="{{asset('assets/')}}/frontend/js/main.js"></script>
@yield('js')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('layouts.message')
</body>
</html>
