@extends('layouts.frontend')
@section('front')
    <section class="product-details-area gry-bg">
        <div class="container">

            <div class="bg-white">

                <!-- Product gallery and Description -->
                <div class="row no-gutters cols-xs-space cols-sm-space cols-md-space">
                    <div class="col-lg-6">
                        <div class="product-gal sticky-top d-flex flex-row-reverse">
                            <div class="product-gal-img">
                                <img src="{{asset($product->main_image)}}" class="xzoom img-fluid lazyloaded" data-src="{{asset($product->main_image)}}" xoriginal="{{asset($product->main_image)}}" >
                            </div>
                            <div class="product-gal-thumb">
                                @if (!empty($product->main_image))
                                    <div class="xzoom-thumbs">
                                        <a href="{{asset($product->main_image)}}">
                                            <img src="{{asset($product->main_image)}}" class="xzoom-gallery xactive lazyloaded" width="80" data-src="{{asset($product->main_image)}}" xpreview="{{asset($product->main_image)}}" >
                                        </a>
                                    </div>
                                @endif
                                    @if (!empty($product->image_one))
                                        <div class="xzoom-thumbs">
                                            <a href="{{asset($product->image_one)}}">
                                                <img src="{{asset($product->image_one)}}" class="xzoom-gallery xactive lazyloaded" width="80" data-src="{{asset($product->image_one)}}" xpreview="{{asset($product->image_one)}}">
                                            </a>
                                        </div>
                                    @endif
                                    @if (!empty($product->image_two))
                                        <div class="xzoom-thumbs">
                                            <a href="{{asset($product->image_two)}}">
                                                <img src="{{asset($product->image_two)}}" class="xzoom-gallery xactive lazyloaded" width="80" data-src="{{asset($product->image_two)}}" xpreview="{{asset($product->image_two)}}">
                                            </a>
                                        </div>
                                    @endif
                                    @if (!empty($product->image_three))
                                        <div class="xzoom-thumbs">
                                            <a href="{{asset($product->image_three)}}">
                                                <img src="{{asset($product->image_three)}}" class="xzoom-gallery xactive lazyloaded" width="80" data-src="{{asset($product->image_three)}}" xpreview="{{asset($product->image_three)}}">
                                            </a>
                                        </div>
                                    @endif
                                    @if (!empty($product->image_four))
                                        <div class="xzoom-thumbs">
                                            <a href="{{asset($product->image_four)}}">
                                                <img src="{{asset($product->image_four)}}" class="xzoom-gallery xactive lazyloaded" width="80" data-src="{{asset($product->image_four)}}" xpreview="{{asset($product->image_four)}}">
                                            </a>
                                        </div>
                                    @endif
                                    @if (!empty($product->image_five))
                                        <div class="xzoom-thumbs">
                                            <a href="{{asset($product->image_five)}}">
                                                <img src="{{asset($product->image_five)}}" class="xzoom-gallery xactive lazyloaded" width="80" data-src="{{asset($product->image_five)}}" xpreview="{{asset($product->image_five)}}">
                                            </a>
                                        </div>
                                    @endif

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <!-- Product description -->
                        <div class="product-description-wrapper">
                            <!-- Product title -->
                            <h1 class="product-title mb-2">
                                {{$product->product_name}}
                            </h1>

                            <div class="row align-items-center my-1">
                                <div class="col-6">
                                    <!-- Rating stars -->
                                    <div class="rating">
                                                                                <span class="star-rating">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        </span>
                                        <span class="rating-count ml-1">(0 reviews)</span>
                                    </div>
                                </div>
{{--                                <div class="col-6 text-right">--}}
{{--                                    <ul class="inline-links inline-links--style-1">--}}
{{--                                        <li>--}}
{{--                                            <span class="badge badge-md badge-pill bg-red">Out of stock</span>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
                            </div>


                            <hr>

                            <div class="row align-items-center">
                                <div class="sold-by col-auto">
                                    <small class="mr-2">Category: </small><br>
                                    {{$product->top_cat->top_cat_name}}
                                </div>
                            </div>

                            <hr>

                            <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label">Price:</div>
                                </div>
                                <div class="col-10">
                                    <div class="product-price">
                                            @if (!empty($product->old_price))
                                            <del>{{$gn->site_currency}}.{{$product->old_price}}</del>
                                            @endif


                                        <strong>
                                            {{$gn->site_currency}}.{{$product->new_price}}
                                        </strong>
                                    </div>
                                </div>
                            </div>


                            <hr>

                            <form action="{{route('add.to.cart.product.details')}}" method="post" id="option-choice-form">
                                @csrf

                                @if (count($pro_sizes) > 0)


                                <div class="row no-gutters">
                                    <div class="col-2">
                                        <div class="product-description-label mt-2">Size:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="form-group">
                                            <select class="form-control" name="prouct_sz_id">
                                                @foreach($pro_sizes as $prosz)
                                                <option value="{{$prosz->size_data->id}}">{{$prosz->size_data->size_name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @endif

                                    @if (count($pro_colors) > 0)
                                        <div class="row no-gutters">
                                            <div class="col-2">
                                                <div class="product-description-label mt-2">Color:</div>
                                            </div>
                                            <div class="col-10">
                                                <div class="form-group">
                                                    <select class="form-control" name="prouct_cl_id">
                                                        @foreach($pro_colors as $procl)
                                                        <option value="{{$procl->color_data->id}}">{{$procl->color_data->color_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @endif



                                <input type="hidden" name="product_id"  placeholder="1" value="{{$product->id}}" >
                                <!-- Quantity + Add to cart -->
                                <div class="row no-gutters">
                                    <div class="col-2">
                                        <div class="product-description-label mt-2">Quantity:</div>
                                    </div>
                                    <div class="col-10">
                                        <div class="product-quantity d-flex align-items-center">
                                            <div class="input-group input-group--style-2 pr-3" style="width: 160px;">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="minus" data-field="quantity">
                                                        <i class="la la-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="text" name="qty" class="form-control input-number text-center" placeholder="1" value="1" >

                                                <span class="input-group-btn">
                                                    <button class="btn btn-number" type="button" data-type="plus" data-field="quantity">
                                                        <i class="la la-plus"></i>
                                                    </button>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>




                            <div class="d-table width-100 mt-3">
                                <div class="d-table-cell">
                                    <!-- Buy Now button -->
                                    <button type="button" class="btn btn-styled btn-base-1 btn-icon-left strong-700 hov-bounce hov-shaddow buy-now" >
                                        <i class="la la-shopping-cart"></i> Buy Now
                                    </button>
                                    <button type="submit" class="btn btn-styled btn-alt-base-1 c-white btn-icon-left strong-700 hov-bounce hov-shaddow ml-2 add-to-cart" >
                                        <i class="la la-shopping-cart"></i>
                                        <span class="d-none d-md-inline-block"> Add to cart</span>
                                    </button>
                                </div>
                            </div>

                            </form>


                            <hr class="mt-2">

                            <div class="row no-gutters mt-3">
                                <div class="col-2">
                                    <div class="product-description-label alpha-6">Payment:</div>
                                </div>
                                <div class="col-10">
                                    <ul class="inline-links">
                                        <li>
                                            <img src="http://shop.activeitzone.com/public/frontend/images/icons/cards/visa.png" data-src="http://shop.activeitzone.com/public/frontend/images/icons/cards/visa.png" width="30" class=" ls-is-cached lazyloaded">
                                        </li>
                                        <li>
                                            <img src="http://shop.activeitzone.com/public/frontend/images/icons/cards/mastercard.png" data-src="http://shop.activeitzone.com/public/frontend/images/icons/cards/mastercard.png" width="30" class=" ls-is-cached lazyloaded">
                                        </li>
                                        <li>
                                            <img src="http://shop.activeitzone.com/public/frontend/images/icons/cards/maestro.png" data-src="http://shop.activeitzone.com/public/frontend/images/icons/cards/maestro.png" width="30" class=" ls-is-cached lazyloaded">
                                        </li>
                                        <li>
                                            <img src="http://shop.activeitzone.com/public/frontend/images/icons/cards/paypal.png" data-src="http://shop.activeitzone.com/public/frontend/images/icons/cards/paypal.png" width="30" class=" ls-is-cached lazyloaded">
                                        </li>
                                        <li>
                                            <img src="http://shop.activeitzone.com/public/frontend/images/icons/cards/cod.png" data-src="http://shop.activeitzone.com/public/frontend/images/icons/cards/cod.png" width="30" class=" ls-is-cached lazyloaded">
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <hr class="mt-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="gry-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 d-none d-xl-block">
                    <div class="seller-info-box mb-3">
                        <div class="sold-by position-relative">
                            <div class="title">Sold By</div>
                            Active Ecommerce CMS

                            <div class="rating text-center d-block">
                                <span class="star-rating star-rating-sm d-block">
                                                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                                                    </span>
                                <span class="rating-count d-block ml-0">(0 customer reviews)</span>
                            </div>
                        </div>
                        <div class="row no-gutters align-items-center">
                        </div>
                    </div>
                    <div class="seller-top-products-box bg-white sidebar-box mb-3">
                        <div class="box-title">
                            Top Selling Products From This Seller
                        </div>
                        <div class="box-content">
                            <div class="mb-3 product-box-3">
                                <div class="clearfix">
                                    <div class="product-image float-left">
                                        <a href="Apple-Macbook-Pro-2018-Six-Core-Intel-Core-i7-22-41GHz-16GB-2400MHz-DDR4-fWQld.html">
                                            <img class="img-fit ls-is-cached lazyloaded" src="http://shop.activeitzone.com/public/uploads/products/thumbnail/Jqdb9BbJCNQZR4IatAMIk4YAayXggBUYhS0DIWLW.jpeg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/Jqdb9BbJCNQZR4IatAMIk4YAayXggBUYhS0DIWLW.jpeg" alt="iphone xs max Gold (64GB/128GB/256GB)">
                                        </a>
                                    </div>
                                    <div class="product-details float-left">
                                        <h4 class="title text-truncate">
                                            <a href="Apple-Macbook-Pro-2018-Six-Core-Intel-Core-i7-22-41GHz-16GB-2400MHz-DDR4-fWQld.html" class="d-block">iphone xs max Gold (64GB/128GB/256GB)</a>
                                        </h4>
                                        <div class="star-rating star-rating-sm mt-1">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        </div>
                                        <div class="price-box">
                                            <!--  -->
                                            <span class="product-price strong-600">$1,099.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 product-box-3">
                                <div class="clearfix">
                                    <div class="product-image float-left">
                                        <a href="iphone-xs-max-Gold-64GB128GB256GB-tCK0m.html">
                                            <img class="img-fit lazyloaded" src="http://shop.activeitzone.com/public/uploads/products/thumbnail/jNts3VUHPb9N3W5orHylTffHOvDrXExu0s71JA6g.jpeg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/jNts3VUHPb9N3W5orHylTffHOvDrXExu0s71JA6g.jpeg" alt="iphone xs max Gold (64GB/128GB/256GB)">
                                        </a>
                                    </div>
                                    <div class="product-details float-left">
                                        <h4 class="title text-truncate">
                                            <a href="iphone-xs-max-Gold-64GB128GB256GB-tCK0m.html" class="d-block">iphone xs max Gold (64GB/128GB/256GB)</a>
                                        </h4>
                                        <div class="star-rating star-rating-sm mt-1">
                                            <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i>
                                        </div>
                                        <div class="price-box">
                                            <!--  -->
                                            <span class="product-price strong-600">$1,099.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 product-box-3">
                                <div class="clearfix">
                                    <div class="product-image float-left">
                                        <a href="Apple-watch-Silver-64GB128GB256GB-aFGxL.html">
                                            <img class="img-fit lazyloaded" src="http://shop.activeitzone.com/public/uploads/products/thumbnail/V6e7IUjGghNawtOQsYPnGLMt9zEp8IYBaJqPQY3Q.jpeg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/V6e7IUjGghNawtOQsYPnGLMt9zEp8IYBaJqPQY3Q.jpeg" alt="Apple watch Silver (64GB/128GB/256GB)">
                                        </a>
                                    </div>
                                    <div class="product-details float-left">
                                        <h4 class="title text-truncate">
                                            <a href="Apple-watch-Silver-64GB128GB256GB-aFGxL.html" class="d-block">Apple watch Silver (64GB/128GB/256GB)</a>
                                        </h4>
                                        <div class="star-rating star-rating-sm mt-1">
                                            <i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i>
                                        </div>
                                        <div class="price-box">
                                            <!--  -->
                                            <span class="product-price strong-600">$499.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 product-box-3">
                                <div class="clearfix">
                                    <div class="product-image float-left">
                                        <a href="Apple-Macbook-Pro-2018-Six-Core-Intel-Core-i7-22-41GHz-16GB-2400MHz-DDR4-5eMap.html">
                                            <img class="img-fit lazyloaded" src="http://shop.activeitzone.com/public/uploads/products/thumbnail/rdz1e1TZlosgz9VeOO7Jy4i0jKbkZg9BMSLwDkDI.jpeg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/rdz1e1TZlosgz9VeOO7Jy4i0jKbkZg9BMSLwDkDI.jpeg" alt="Apple Macbook Pro (2018) Six Core Intel Core i7 (2.2-4.1GHz, 16GB 2400MHz DDR4">
                                        </a>
                                    </div>
                                    <div class="product-details float-left">
                                        <h4 class="title text-truncate">
                                            <a href="Apple-Macbook-Pro-2018-Six-Core-Intel-Core-i7-22-41GHz-16GB-2400MHz-DDR4-5eMap.html" class="d-block">Apple Macbook Pro (2018) Six Core Intel Core i7 (2.2-4.1GHz, 16GB 2400MHz DDR4</a>
                                        </h4>
                                        <div class="star-rating star-rating-sm mt-1">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        </div>
                                        <div class="price-box">
                                            <!--  -->
                                            <span class="product-price strong-600">$2,250.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 product-box-3">
                                <div class="clearfix">
                                    <div class="product-image float-left">
                                        <a href="HP-Spectre-x360-13-AE517TU-8th-Gen-Intel-Core-i7-8550U-VMA7U.html">
                                            <img class="img-fit lazyloaded" src="http://shop.activeitzone.com/public/uploads/products/thumbnail/nZ4zy4QNTU7IfkcRStgaqyHa4a9rScxR5DsJCoyf.jpeg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/nZ4zy4QNTU7IfkcRStgaqyHa4a9rScxR5DsJCoyf.jpeg" alt="HP Spectre x360 13-AE517TU 8th Gen Intel Core i7 8550U">
                                        </a>
                                    </div>
                                    <div class="product-details float-left">
                                        <h4 class="title text-truncate">
                                            <a href="HP-Spectre-x360-13-AE517TU-8th-Gen-Intel-Core-i7-8550U-VMA7U.html" class="d-block">HP Spectre x360 13-AE517TU 8th Gen Intel Core i7 8550U</a>
                                        </h4>
                                        <div class="star-rating star-rating-sm mt-1">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        </div>
                                        <div class="price-box">
                                            <!--  -->
                                            <span class="product-price strong-600">$1,550.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 product-box-3">
                                <div class="clearfix">
                                    <div class="product-image float-left">
                                        <a href="Apple-Macbook-Pro-2018-Six-Core-Intel-Core-i7-22-41GHz-16GB-2400MHz-DDR4-5tDUK.html">
                                            <img class="img-fit lazyloaded" src="http://shop.activeitzone.com/public/uploads/products/thumbnail/VeN9wlpFSIVG2x9Ta7n8tscQUqiVZbn3X5RTp2Nn.jpeg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/VeN9wlpFSIVG2x9Ta7n8tscQUqiVZbn3X5RTp2Nn.jpeg" alt="iphone xs max Space Gray (64GB/128GB/256GB) 2688×1242 resolution">
                                        </a>
                                    </div>
                                    <div class="product-details float-left">
                                        <h4 class="title text-truncate">
                                            <a href="Apple-Macbook-Pro-2018-Six-Core-Intel-Core-i7-22-41GHz-16GB-2400MHz-DDR4-5tDUK.html" class="d-block">iphone xs max Space Gray (64GB/128GB/256GB) 2688×1242 resolution</a>
                                        </h4>
                                        <div class="star-rating star-rating-sm mt-1">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        </div>
                                        <div class="price-box">
                                            <!--  -->
                                            <span class="product-price strong-600">$1,099.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="product-desc-tab bg-white">
                        <div class="tabs tabs--style-2">
                            <ul class="nav nav-tabs justify-content-center sticky-top bg-white">
                                <li class="nav-item">
                                    <a href="#tab_default_1" data-toggle="tab" class="nav-link text-uppercase strong-600 active show">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#tab_default_4" data-toggle="tab" class="nav-link text-uppercase strong-600">Reviews</a>
                                </li>
                            </ul>

                            <div class="tab-content pt-0">
                                <div class="tab-pane active show" id="tab_default_1">
                                    <div class="py-2 px-4">
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="mw-100 overflow--hidden">
                                                    <p>{!! $product->description !!}</p>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab_default_2">
                                    <div class="fluid-paragraph py-2">
                                        <!-- 16:9 aspect ratio -->
                                        <div class="embed-responsive embed-responsive-16by9 mb-5">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_default_4">
                                    <div class="fluid-paragraph py-4">

                                        <div class="text-center">
                                            There have been no reviews for this product yet.
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="my-4 bg-white p-3">
                        <div class="section-title-1">
                            <h3 class="heading-5 strong-700 mb-0">
                                <span class="mr-4">Related products</span>
                            </h3>
                        </div>
                        <div class="caorusel-box arrow-round gutters-5">
                            <div class="slick-carousel" data-slick-items="3" data-slick-xl-items="2" data-slick-lg-items="3"  data-slick-md-items="2" data-slick-sm-items="1" data-slick-xs-items="1"  data-slick-rows="2">
                                <div class="caorusel-card my-1">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-5">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="Apple-watch-Silver-64GB128GB256GB-aFGxL.html" class="d-block product-image h-100 text-center">
                                                    <img class="img-fit lazyload" src="../public/frontend/images/placeholder.jpg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/V6e7IUjGghNawtOQsYPnGLMt9zEp8IYBaJqPQY3Q.jpeg" alt="Apple watch Silver (64GB/128GB/256GB)">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-7 border-left">
                                            <div class="p-3">
                                                <h2 class="product-title mb-0 p-0 text-truncate">
                                                    <a href="Apple-watch-Silver-64GB128GB256GB-aFGxL.html">Apple watch Silver (64GB/128GB/256GB)</a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mb-2">
                                                    <i class = 'fa fa-star active'></i><i class = 'fa fa-star active'></i><i class = 'fa fa-star active'></i><i class = 'fa fa-star active'></i><i class = 'fa fa-star active'></i>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                        <span class="product-price strong-600">$499.00</span>
                                                    </div>
                                                    <div class="float-right club-point bg-soft-base-1 border-light-base-1 border">
                                                        Club Point:
                                                        <span class="strong-700 float-right">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="caorusel-card my-1">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-5">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="iphone-xs-max-Gold-64GB128GB256GB-tCK0m.html" class="d-block product-image h-100 text-center">
                                                    <img class="img-fit lazyload" src="../public/frontend/images/placeholder.jpg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/jNts3VUHPb9N3W5orHylTffHOvDrXExu0s71JA6g.jpeg" alt="iphone xs max Gold (64GB/128GB/256GB)">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-7 border-left">
                                            <div class="p-3">
                                                <h2 class="product-title mb-0 p-0 text-truncate">
                                                    <a href="iphone-xs-max-Gold-64GB128GB256GB-tCK0m.html">iphone xs max Gold (64GB/128GB/256GB)</a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mb-2">
                                                    <i class = 'fa fa-star active'></i><i class = 'fa fa-star active'></i><i class = 'fa fa-star active'></i><i class = 'fa fa-star active'></i><i class = 'fa fa-star active'></i>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                        <span class="product-price strong-600">$1,099.00</span>
                                                    </div>
                                                    <div class="float-right club-point bg-soft-base-1 border-light-base-1 border">
                                                        Club Point:
                                                        <span class="strong-700 float-right">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="caorusel-card my-1">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-5">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-pAoYB.html" class="d-block product-image h-100 text-center">
                                                    <img class="img-fit lazyload" src="../public/frontend/images/placeholder.jpg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/u50DemVX8v7GAmJ9MXfEebiFLKdq9vv3CrfVTyqI.jpeg" alt="OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-7 border-left">
                                            <div class="p-3">
                                                <h2 class="product-title mb-0 p-0 text-truncate">
                                                    <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-pAoYB.html">OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery</a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mb-2">
                                                    <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                        <span class="product-price strong-600">$700.00</span>
                                                    </div>
                                                    <div class="float-right club-point bg-soft-base-1 border-light-base-1 border">
                                                        Club Point:
                                                        <span class="strong-700 float-right">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="caorusel-card my-1">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-5">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-d0aU8.html" class="d-block product-image h-100 text-center">
                                                    <img class="img-fit lazyload" src="../public/frontend/images/placeholder.jpg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/u50DemVX8v7GAmJ9MXfEebiFLKdq9vv3CrfVTyqI.jpeg" alt="OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-7 border-left">
                                            <div class="p-3">
                                                <h2 class="product-title mb-0 p-0 text-truncate">
                                                    <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-d0aU8.html">OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery</a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mb-2">
                                                    <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                        <span class="product-price strong-600">$700.00</span>
                                                    </div>
                                                    <div class="float-right club-point bg-soft-base-1 border-light-base-1 border">
                                                        Club Point:
                                                        <span class="strong-700 float-right">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="caorusel-card my-1">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-5">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-Hqcch.html" class="d-block product-image h-100 text-center">
                                                    <img class="img-fit lazyload" src="../public/frontend/images/placeholder.jpg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/u50DemVX8v7GAmJ9MXfEebiFLKdq9vv3CrfVTyqI.jpeg" alt="OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-7 border-left">
                                            <div class="p-3">
                                                <h2 class="product-title mb-0 p-0 text-truncate">
                                                    <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-Hqcch.html">OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery</a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mb-2">
                                                    <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                        <span class="product-price strong-600">$700.00</span>
                                                    </div>
                                                    <div class="float-right club-point bg-soft-base-1 border-light-base-1 border">
                                                        Club Point:
                                                        <span class="strong-700 float-right">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="caorusel-card my-1">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-5">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-L6Pdv.html" class="d-block product-image h-100 text-center">
                                                    <img class="img-fit lazyload" src="../public/frontend/images/placeholder.jpg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/u50DemVX8v7GAmJ9MXfEebiFLKdq9vv3CrfVTyqI.jpeg" alt="OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-7 border-left">
                                            <div class="p-3">
                                                <h2 class="product-title mb-0 p-0 text-truncate">
                                                    <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-L6Pdv.html">OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery</a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mb-2">
                                                    <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                        <span class="product-price strong-600">$700.00</span>
                                                    </div>
                                                    <div class="float-right club-point bg-soft-base-1 border-light-base-1 border">
                                                        Club Point:
                                                        <span class="strong-700 float-right">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="caorusel-card my-1">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-5">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-ivLEf.html" class="d-block product-image h-100 text-center">
                                                    <img class="img-fit lazyload" src="../public/frontend/images/placeholder.jpg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/u50DemVX8v7GAmJ9MXfEebiFLKdq9vv3CrfVTyqI.jpeg" alt="OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-7 border-left">
                                            <div class="p-3">
                                                <h2 class="product-title mb-0 p-0 text-truncate">
                                                    <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-ivLEf.html">OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery</a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mb-2">
                                                    <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                        <span class="product-price strong-600">$700.00</span>
                                                    </div>
                                                    <div class="float-right club-point bg-soft-base-1 border-light-base-1 border">
                                                        Club Point:
                                                        <span class="strong-700 float-right">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="caorusel-card my-1">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-5">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-2p1R9.html" class="d-block product-image h-100 text-center">
                                                    <img class="img-fit lazyload" src="../public/frontend/images/placeholder.jpg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/u50DemVX8v7GAmJ9MXfEebiFLKdq9vv3CrfVTyqI.jpeg" alt="OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-7 border-left">
                                            <div class="p-3">
                                                <h2 class="product-title mb-0 p-0 text-truncate">
                                                    <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-2p1R9.html">OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery</a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mb-2">
                                                    <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                        <span class="product-price strong-600">$700.00</span>
                                                    </div>
                                                    <div class="float-right club-point bg-soft-base-1 border-light-base-1 border">
                                                        Club Point:
                                                        <span class="strong-700 float-right">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="caorusel-card my-1">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-5">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-fgl5v.html" class="d-block product-image h-100 text-center">
                                                    <img class="img-fit lazyload" src="../public/frontend/images/placeholder.jpg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/u50DemVX8v7GAmJ9MXfEebiFLKdq9vv3CrfVTyqI.jpeg" alt="OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-7 border-left">
                                            <div class="p-3">
                                                <h2 class="product-title mb-0 p-0 text-truncate">
                                                    <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-fgl5v.html">OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery</a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mb-2">
                                                    <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                        <span class="product-price strong-600">$700.00</span>
                                                    </div>
                                                    <div class="float-right club-point bg-soft-base-1 border-light-base-1 border">
                                                        Club Point:
                                                        <span class="strong-700 float-right">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="caorusel-card my-1">
                                    <div class="row no-gutters product-box-2 align-items-center">
                                        <div class="col-5">
                                            <div class="position-relative overflow-hidden h-100">
                                                <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-rmrQ2.html" class="d-block product-image h-100 text-center">
                                                    <img class="img-fit lazyload" src="../public/frontend/images/placeholder.jpg" data-src="http://shop.activeitzone.com/public/uploads/products/thumbnail/u50DemVX8v7GAmJ9MXfEebiFLKdq9vv3CrfVTyqI.jpeg" alt="OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-7 border-left">
                                            <div class="p-3">
                                                <h2 class="product-title mb-0 p-0 text-truncate">
                                                    <a href="OnePlus-6T-16-MP-Camera-Li-Po-3700-mAh-battery-rmrQ2.html">OnePlus 6T 16 MP Camera Li-Po 3700 mAh battery</a>
                                                </h2>
                                                <div class="star-rating star-rating-sm mb-2">
                                                    <i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i><i class = 'fa fa-star'></i>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="price-box float-left">
                                                        <span class="product-price strong-600">$700.00</span>
                                                    </div>
                                                    <div class="float-right club-point bg-soft-base-1 border-light-base-1 border">
                                                        Club Point:
                                                        <span class="strong-700 float-right">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
    </section>


@stop
