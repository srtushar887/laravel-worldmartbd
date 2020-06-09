@extends('layouts.frontend')

@section('front')

    <section class="home-banner-area mb-4">
        <div class="container">
            <div class="row no-gutters position-relative">
                <div class="col-lg-3 position-static order-2 order-lg-0">
                    <div class="category-sidebar">
                        <div class="all-category d-none d-lg-block">
                            <span>Categories</span>
                            <a href="">
                                <span class="d-none d-lg-inline-block">See All ></span>
                            </a>
                        </div>
                        <ul class="categories no-scrollbar">
                            <li class="d-lg-none">
                                <a href="http://shop.activeitzone.com/categories">
                                    <img class="cat-image lazyload" src="{{asset('assets/')}}/frontend/images/placeholder.jpg" data-src="{{asset('assets/')}}/frontend/images/icons/list.png" width="30" alt="All Category" />
                                    <span class="cat-name">
                                                All <br />
                                                Categories
                                            </span>
                                </a>
                            </li>
                            @foreach($top_cats as $tcat)
                            <li class="category-nav-element" data-id="1">
                                <a href="{{route('topcat.prodyct',$tcat->id)}}">
                                    @if (!empty($tcat->top_cat_image))
                                        <img
                                            class="cat-image ls-is-cached lazyloaded"
                                            src="{{asset($tcat->top_cat_image)}}"
                                            data-src="{{asset($tcat->top_cat_image)}}"
                                            width="30"
                                            alt="{{$tcat->top_cat_name}}"
                                        />
                                    @else
                                        <img
                                            class="cat-image ls-is-cached lazyloaded"
                                            src="https://www.chanchao.com.tw/images/default.jpg"
                                            data-src="https://www.chanchao.com.tw/images/default.jpg"
                                            width="30"
                                            alt="{{$tcat->top_cat_name}}"
                                        />
                                    @endif

                                    <span class="cat-name">{{$tcat->top_cat_name}}</span>
                                </a>
                                <div class="sub-cat-menu c-scrollbar loaded">
                                    <div class="sub-cat-main row no-gutters">
                                        <div class="col-12">
                                            <div class="sub-cat-content">
                                                <div class="sub-cat-list">
                                                    <div class="card-columns">
                                                        <div class="card">
                                                            <ul class="sub-cat-items">
                                                                <?php
                                                                    $mid_cats = \App\middle_category::where('top_cat_id',$tcat->id)->get();
                                                                ?>
                                                                @foreach ($mid_cats as $mcta)

                                                                        <li class="sub-cat-name"><a href="{{route('mid.cat.products',$mcta->id)}}">{{$mcta->mid_cat_name}}</a></li>

                                                                        <?php
                                                                            $end_cats = \App\end_category::where('mid_cat_id',$mcta->id)->get();
                                                                        ?>
                                                                    @foreach ($end_cats as $ecat)

                                                                            <li><a href="{{route('end.cat.products',$ecat->id)}}">{{$ecat->end_cat_name}}</a></li>
                                                                        @endforeach

                                                                    @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-7 order-1 order-lg-0">
                    <div class="home-slide">
                        <div class="home-slide">
                            <div class="slick-carousel" data-slick-arrows="true" data-slick-dots="true" data-slick-autoplay="true">
                               @foreach($sliders as $slid)
                                <div class="" style="height: 275px;">
                                    <a href="{{route('front')}}" target="">
                                        <img
                                            class="d-block w-100 h-100 lazyload"
                                            src="{{asset('assets/')}}/frontend/images/placeholder.jpg"
                                            data-src="{{asset($slid->slider_image)}}"
                                            alt="{{$gn->site_name}}"
                                        />
                                    </a>
                                </div>
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <div class="trending-category d-none d-lg-block">
                        <ul>
                            @foreach($random_cats as $ranct)
                            <li class="{{ $loop->first ? 'active' : '' }}">
                                <div class="trend-category-single">
                                    <a href="{{route('topcat.prodyct',$ranct->id)}}" class="d-block">
                                        <div class="name">{{$ranct->top_cat_name}}</div>
                                        <div class="img">
                                            @if (!empty($ranct->top_cat_image))
                                                <img
                                                    src="{{asset('assets/')}}/frontend/images/placeholder.jpg"
                                                    data-src="{{asset($ranct->top_cat_image)}}"
                                                    alt="{{$ranct->top_cat_name}}"
                                                    class="lazyload img-fit"
                                                />
                                            @else
                                                <img
                                                    src="{{asset('assets/')}}/frontend/images/placeholder.jpg"
                                                    data-src="https://www.chanchao.com.tw/images/default.jpg"
                                                    alt="{{$ranct->top_cat_name}}"
                                                    class="lazyload img-fit"
                                                />
                                            @endif

                                        </div>
                                    </a>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 d-none d-lg-block">
                    <div class="flash-deal-box bg-white h-100">
                        <div class="title text-center p-2 gry-bg">
                            <h3 class="heading-6 mb-0">
                                Todays Deal
                                <span class="badge badge-danger">Hot</span>
                            </h3>
                        </div>
                        <div class="flash-content c-scrollbar c-height">
                            @foreach($today_hot_deal as $tdayhtdel)
                            <a href="{{route('product.details',$tdayhtdel->id)}}" class="d-block flash-deal-item">
                                <div class="row no-gutters align-items-center">
                                    <div class="col">
                                        <div class="img">
                                            <img
                                                src="{{asset('assets/')}}/frontend/images/placeholder.jpg"
                                                data-src="{{asset($tdayhtdel->main_image)}}"
                                                alt="{{$tdayhtdel->product_name}}"
                                                class="lazyload img-fit"
                                            />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="price">
                                            <span class="d-block">{{$gn->site_currency}} {{$tdayhtdel->new_price}}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-lg-4">
                    <div class="media-banner mb-3 mb-lg-0">
                        <a
                            href=""
                            target="_blank"
                            class="banner-container"
                        >
                            <img
                                src="{{asset('assets/')}}/frontend/images/placeholder.jpg"
                                data-src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS7T_Sa_glxajdRKJ67pjpuXlTMee6y6DdYsZ5zJg8KrR2oUAgv&usqp=CAU"
                                alt="Active Ecommerce CMS promo"
                                class="img-fluid lazyload"
                            />
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="media-banner mb-3 mb-lg-0">
                        <a href="" target="_blank" class="banner-container">
                            <img
                                src="{{asset('assets/')}}/frontend/images/placeholder.jpg"
                                data-src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS7T_Sa_glxajdRKJ67pjpuXlTMee6y6DdYsZ5zJg8KrR2oUAgv&usqp=CAU"
                                alt="Active Ecommerce CMS promo"
                                class="img-fluid lazyload"
                            />
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="media-banner mb-3 mb-lg-0">
                        <a href="" target="_blank" class="banner-container">
                            <img
                                src="{{asset('assets/')}}/frontend/images/placeholder.jpg"
                                data-src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS7T_Sa_glxajdRKJ67pjpuXlTMee6y6DdYsZ5zJg8KrR2oUAgv&usqp=CAU"
                                alt="Active Ecommerce CMS promo"
                                class="img-fluid lazyload"
                            />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="section_featured"><section class="mb-4">
            <div class="container">
                <div class="px-2 py-4 p-md-4 bg-white shadow-sm">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4">Latest Products</span>
                        </h3>
                        <ul class="inline-links float-lg-right nav mt-3 mb-2 m-lg-0">
                            <li class="active">
                                <a href="{{route('all.product')}}" class="d-block active">View All</a>
                            </li>
                        </ul>
                    </div>
                    <div class="caorusel-box arrow-round gutters-5">
                        <div class="slick-carousel" data-slick-items="3" data-slick-xl-items="2" data-slick-lg-items="3"  data-slick-md-items="2" data-slick-sm-items="1" data-slick-xs-items="1"  data-slick-rows="2">
                            @if (count($featured_products) > 0)
                                @foreach($featured_products as $fepro)
                                    <div class="caorusel-card my-1">
                                        <div class="row no-gutters product-box-2 align-items-center">
                                            <div class="col-5">
                                                <div class="position-relative overflow-hidden h-100">
                                                    <a href="{{route('product.details',$fepro->id)}}" class="d-block product-image h-100 text-center">
                                                        @if (!empty($fepro->main_image))
                                                            <img class="img-fit lazyload" src="{{asset('assets/')}}/frontend/images/placeholder.jpg" data-src="{{asset($fepro->main_image)}}" alt="{{$fepro->product_name}}">
                                                        @else
                                                            <img class="img-fit lazyload" src="{{asset('assets/')}}/frontend/images/placeholder.jpg" data-src="https://www.chanchao.com.tw/images/default.jpg" alt="{{$fepro->product_name}}">
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-7 border-left">
                                                <div class="p-3">
                                                    <h2 class="product-title mb-0 p-0 text-truncate">
                                                        <a href="{{route('product.details',$fepro->id)}}">{{$fepro->product_name}}</a>
                                                    </h2>
                                                    <div class="star-rating star-rating-sm mb-2">
                                                        <i class = 'fa fa-star active'></i><i class = 'fa fa-star active'></i><i class = 'fa fa-star active'></i><i class = 'fa fa-star active'></i><i class = 'fa fa-star active'></i>
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="price-box float-left">
                                                            <span class="product-price strong-600">{{$gn->site_currency}} {{$fepro->new_price}}</span>
                                                        </div>
                                                        <a href="{{route('add.to.cart.single',$fepro->id)}}">
                                                            <div class="float-right club-point bg-soft-base-1 border-light-base-1 border">
                                                                <button type="button" class="btn btn-success btn-sm btn-block">Add To Cart</button>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center text-danger">Sorry! No Product Available</p>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>






    @foreach($top_cats as $talcat)
    <div id="section_home_categories">
        <section class="mb-4">
            <div class="container">

                <div class="px-2 py-4 p-md-4 bg-white shadow-sm">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-lg-left">
                            <span class="mr-4">{{$talcat->top_cat_name}}</span>
                        </h3>
                        <ul class="inline-links float-lg-right nav mt-3 mb-2 m-lg-0">
                            <li class="active">
                                <a href="{{route('topcat.prodyct',$talcat->id)}}"  class="d-block active">View All</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="subsubcat-148">
                            <div class="row gutters-5 sm-no-gutters">
                                <?php
                                $all_cats_pros = \App\product::where('top_cat_id',$talcat->id)->inRandomOrder()->limit(6)->get();
                                ?>
                                @if (count($all_cats_pros) > 0)
                                        @foreach($all_cats_pros as $tcatpro)
                                            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                                                <div class="product-box-2 bg-white alt-box my-2">
                                                    <div class="position-relative overflow-hidden">
                                                        <a href="{{route('product.details',$tcatpro->id)}}" class="d-block product-image h-100 text-center">
                                                           @if (!empty($tcatpro->main_image))
                                                                <img
                                                                    class="img-fit ls-is-cached lazyloaded"
                                                                    src="{{asset($tcatpro->main_image)}}"
                                                                    data-src="{{asset($tcatpro->main_image)}}"
                                                                    alt="{{$tcatpro->product_name}}"
                                                                />
                                                            @else
                                                                <img
                                                                    class="img-fit ls-is-cached lazyloaded"
                                                                    src="https://www.chanchao.com.tw/images/default.jpg"
                                                                    data-src="https://www.chanchao.com.tw/images/default.jpg"
                                                                    alt="{{$tcatpro->product_name}}"
                                                                />
                                                           @endif

                                                        </a>
                                                        {{--                                            <div class="product-btns clearfix">--}}
                                                        {{--                                                <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(103)" tabindex="0">--}}
                                                        {{--                                                    <i class="la la-heart-o"></i>--}}
                                                        {{--                                                </button>--}}
                                                        {{--                                                <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(103)" tabindex="0">--}}
                                                        {{--                                                    <i class="la la-refresh"></i>--}}
                                                        {{--                                                </button>--}}
                                                        {{--                                                <button class="btn quick-view" title="Quick view" onclick="addToCarta" tabindex="0">--}}
                                                        {{--                                                    <i class="la la-eye"></i>--}}
                                                        {{--                                                </button>--}}
                                                        {{--                                            </div>--}}
                                                    </div>

                                                    <div class="p-md-3 p-2">
                                                        <div class="price-box">
                                                            @if (!empty($tcatpro->old_price))
                                                                <del class="old-product-price strong-400">{{$gn->site_currency}} {{$tcatpro->old_price}}</del>
                                                            @endif

                                                            <span class="product-price strong-600">{{$gn->site_currency}} {{$tcatpro->new_price}}</span>
                                                        </div>
                                                        <div class="star-rating star-rating-sm mt-1">
                                                            <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i>
                                                        </div>
                                                        <h2 class="product-title p-0">
                                                            <a href="{{route('product.details',$tcatpro->id)}}" class="text-truncate">{{$tcatpro->product_name}}</a>
                                                        </h2>
                                                        <a href="{{route('add.to.cart.single',$tcatpro->id)}}">
                                                            <div class="club-point mt-2 bg-soft-base-1 border-light-base-1 border">
                                                                <button class="btn btn-success btn-sm btn-block">Add To Cart</button>
                                                            </div>
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <p class="text-center text-danger">Sorry! No Product Available</p>
                                @endif


                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </section>
    </div>
    @endforeach

    <div class="mb-4">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-lg-6">
                    <div class="media-banner mb-3 mb-lg-0">
                        <a href="" target="_blank" class="banner-container">
                            <img
                                src="{{asset('assets/')}}/frontend/images/placeholder-rect.jpg"
                                data-src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS7T_Sa_glxajdRKJ67pjpuXlTMee6y6DdYsZ5zJg8KrR2oUAgv&usqp=CAU"
                                alt="Active Ecommerce CMS promo"
                                class="img-fluid lazyload"
                            />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="media-banner mb-3 mb-lg-0">
                        <a href="" target="_blank" class="banner-container">
                            <img
                                src="{{asset('assets/')}}/frontend/images/placeholder-rect.jpg"
                                data-src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcS7T_Sa_glxajdRKJ67pjpuXlTMee6y6DdYsZ5zJg8KrR2oUAgv&usqp=CAU"
                                alt="Active Ecommerce CMS promo"
                                class="img-fluid lazyload"
                            />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="section_best_sellers"></div>

    <section class="mb-3">
        <div class="container">
            <div class="row gutters-10">
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4">Catogories</span>
                        </h3>
                        <ul class="float-right inline-links">
                            <li>
                                <a href="" class="active">View All Catogories</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row gutters-5">
                        @foreach($top_cats as $tcatsf)
                        <div class="mb-3 col-6">
                            <a href="{{route('topcat.prodyct',$tcatsf->id)}}" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-3 text-center">
                                        @if (!empty($tcatsf->top_cat_image))
                                            <img
                                                src="{{asset('assets/')}}/frontend/images/placeholder.jpg"
                                                data-src="{{asset($tcatsf->top_cat_image)}}"
                                                alt="Women Clothing &amp; Fashion"
                                                class="img-fluid img lazyload"
                                            />
                                        @else
                                            <img
                                                src="{{asset('assets/')}}/frontend/images/placeholder.jpg"
                                                data-src="https://www.chanchao.com.tw/images/default.jpg"
                                                alt="Women Clothing &amp; Fashion"
                                                class="img-fluid img lazyload"
                                            />
                                        @endif

                                    </div>
                                    <div class="info col-7">
                                        <div class="name text-truncate pl-3 py-4">{{$tcatsf->top_cat_name}}</div>
                                    </div>
                                    <div class="col-2 text-center">
                                        <i class="la la-angle-right c-base-1"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title-1 clearfix">
                        <h3 class="heading-5 strong-700 mb-0 float-left">
                            <span class="mr-4">Brands</span>
                        </h3>
                        <ul class="float-right inline-links">
                            <li>
                                <a href="" class="active">View All Brands</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row gutters-5">
                       @foreach($brands as $brnds)
                        <div class="mb-3 col-6">
                            <a href="" class="bg-white border d-block c-base-2 box-2 icon-anim pl-2">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-3 text-center">
                                        @if (!empty($brnds->brand_image))
                                            <img
                                                src="{{asset('assets/')}}/frontend/images/placeholder.jpg"
                                                data-src="{{asset($brnds->brand_image)}}"
                                                alt="Ford"
                                                class="img-fluid img lazyload"
                                            />
                                        @else
                                            <img
                                                src="{{asset('assets/')}}/frontend/images/placeholder.jpg"
                                                data-src="{{asset('assets/')}}/frontend/images/placeholder.jpg"
                                                alt="Ford"
                                                class="img-fluid img lazyload"
                                            />
                                        @endif

                                    </div>
                                    <div class="info col-7">
                                        <div class="name text-truncate pl-3 py-4">{{$brnds->brand_name}}</div>
                                    </div>
                                    <div class="col-2 text-center">
                                        <i class="la la-angle-right c-base-1"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>



@stop
