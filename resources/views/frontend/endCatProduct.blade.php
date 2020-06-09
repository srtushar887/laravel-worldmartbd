@extends('layouts.frontend')
@section('hove_cat_icon')
    <div class="d-none d-xl-block category-menu-icon-box">
        <div class="dropdown-toggle navbar-light category-menu-icon" id="category-menu-icon">
            <span class="navbar-toggler-icon"></span>
        </div>
    </div>
@stop
@section('hover_cat')
    <div class="hover-category-menu" id="hover-category-menu">
        <div class="container">
            <div class="row no-gutters position-relative">
                <div class="col-lg-3 position-static">
                    <div class="category-sidebar" id="category-sidebar">
                        <div class="all-category">
                            <span>CATEGORIES</span>
                            <a href="http://shop.activeitzone.com/categories" class="d-inline-block">See All &gt;</a>
                        </div>
                        <ul class="categories">
                            @foreach($cats as $hcat)
                                <li class="category-nav-element" data-id="1">
                                    <a href="{{route('topcat.prodyct',$hcat->id)}}">
                                        <img class="cat-image ls-is-cached lazyloaded" src="{{asset($hcat->top_cat_image)}}" data-src="{{asset($hcat->top_cat_image)}}" width="30" alt="{{$hcat->top_cat_name}}">
                                        <span class="cat-name">{{$hcat->top_cat_name}}</span>
                                    </a>
                                    <div class="sub-cat-menu c-scrollbar loaded"><div class="sub-cat-main row no-gutters">
                                            <div class="col-12">
                                                <div class="sub-cat-content">
                                                    <div class="sub-cat-list">
                                                        <div class="card-columns">
                                                            <div class="card">
                                                                <ul class="sub-cat-items">
                                                                    <?php
                                                                    $mid_cats = \App\middle_category::where('top_cat_id',$hcat->id)->get();
                                                                    ?>
                                                                    @foreach($mid_cats as $mcts)
                                                                        <li class="sub-cat-name"><a href="{{route('mid.cat.products',$mcts->id)}}">{{$mcts->mid_cat_name}}</a></li>
                                                                        <?php
                                                                        $end_cats = \App\end_category::where('mid_cat_id',$mcts->id)->get();
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

            </div>
        </div>
    </div>
@stop
@section('front')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul class="breadcrumb">
                        <li><a href="{{route('front')}}">Home</a></li>
                        <li><a href="{{route('all.product')}}">All Products</a></li>
                        {{--                        <li class="active"><a href="searchf356.html?category=Women-Clothing-Fashion">Women Clothing &amp; Fashion</a></li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="gry-bg py-4">
        <div class="container sm-px-0">
            <form class="" id="search-form" action="http://shop.activeitzone.com/search" method="GET">
                <div class="row">
                    <div class="col-xl-3 side-filter d-xl-block">
                        <div class="filter-overlay filter-close"></div>
                        <div class="filter-wrapper c-scrollbar">
                            <div class="filter-title d-flex d-xl-none justify-content-between pb-3 align-items-center">
                                <h3 class="h6">Filters</h3>
                                <button type="button" class="close filter-close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>



                            <div class="bg-white sidebar-box mb-3">
                                <div class="box-title text-center">
                                    Filter by Category
                                </div>
                                <div class="box-content" style="height: 333px;overflow: scroll;">
                                    <!-- Filter by others -->
                                    <div class="filter-checkbox">
                                        @foreach($cats as $cat)
                                            <div class="checkbox">
                                                <input type="checkbox" class="common_selector category" id="attribute_1_value_{{$cat->id}}" name="category" value="{{$cat->id}}">
                                                <label for="attribute_1_value_{{$cat->id}}">{{$cat->top_cat_name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <div class="bg-white sidebar-box mb-3">
                                <div class="box-title text-center">
                                    Filter by Sub-Category
                                </div>
                                <div class="box-content" style="height: 333px;overflow: scroll;">
                                    <!-- Filter by others -->
                                    <div class="filter-checkbox" >
                                        @foreach($mid_cats_data as $midcatdat)
                                            <div class="checkbox">
                                                <input type="checkbox" class="common_selector midcategory" id="attribute_2_value_{{$midcatdat->id}}" name="midcategory" value="{{$midcatdat->id}}">
                                                <label for="attribute_2_value_{{$midcatdat->id}}">{{$midcatdat->mid_cat_name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>


                            <div class="bg-white sidebar-box mb-3">
                                <div class="box-title text-center">
                                    Filter by Sub Sub-Category
                                </div>
                                <div class="box-content" style="height: 333px;overflow: scroll;">
                                    <!-- Filter by others -->
                                    <div class="filter-checkbox" >
                                        @foreach($ends_cats_data as $endcatdat)
                                            <div class="checkbox">
                                                <input type="checkbox" class="common_selector endcategory" id="attribute_3_value_{{$endcatdat->id}}" name="endcategory" value="{{$endcatdat->id}}" {{$id == $endcatdat->id ? 'checked' : ''}}>
                                                <label for="attribute_3_value_{{$endcatdat->id}}">{{$endcatdat->end_cat_name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>



                            <div class="bg-white sidebar-box mb-3">
                                <div class="box-title text-center">
                                    Filter by Brand
                                </div>
                                <div class="box-content" style="height: 333px;overflow: scroll;">
                                    <!-- Filter by others -->
                                    <div class="filter-checkbox">
                                        @foreach($brands as $brnd)
                                            <div class="checkbox">
                                                <input type="checkbox" class="common_selector brand" id="attribute_4_value_{{$brnd->id}}" name="brand" value="{{$brnd->id}}">
                                                <label for="attribute_4_value_{{$brnd->id}}">{{$brnd->brand_name}}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            {{--                            <div class="bg-white sidebar-box mb-3">--}}
                            {{--                                <div class="box-title text-center">--}}
                            {{--                                    Filter by Price--}}
                            {{--                                </div>--}}
                            {{--                                <div class="box-content" style="height: 333px;overflow: scroll;">--}}
                            {{--                                    <!-- Filter by others -->--}}
                            {{--                                    <div class="filter-checkbox" >--}}
                            {{--                                        <div class="checkbox">--}}
                            {{--                                            <input type="checkbox" id="attribute_1_value_34" name="attribute_1[]" value="34" onchange="filter()">--}}
                            {{--                                            <label for="attribute_1_value_34">150-500</label>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="checkbox">--}}
                            {{--                                            <input type="checkbox" id="attribute_1_value_ 36" name="attribute_1[]" value=" 36" onchange="filter()">--}}
                            {{--                                            <label for="attribute_1_value_ 36"> 501-1000</label>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="checkbox">--}}
                            {{--                                            <input type="checkbox" id="attribute_1_value_ 38" name="attribute_1[]" value=" 38" onchange="filter()">--}}
                            {{--                                            <label for="attribute_1_value_ 38"> 1001-1500</label>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="checkbox">--}}
                            {{--                                            <input type="checkbox" id="attribute_1_value_ 38" name="attribute_1[]" value=" 38" onchange="filter()">--}}
                            {{--                                            <label for="attribute_1_value_ 38"> 1501-2000</label>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="checkbox">--}}
                            {{--                                            <input type="checkbox" id="attribute_1_value_ 38" name="attribute_1[]" value=" 38" onchange="filter()">--}}
                            {{--                                            <label for="attribute_1_value_ 38"> 2001-2500</label>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="checkbox">--}}
                            {{--                                            <input type="checkbox" id="attribute_1_value_ 38" name="attribute_1[]" value=" 38" onchange="filter()">--}}
                            {{--                                            <label for="attribute_1_value_ 38"> 2501-3000</label>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="checkbox">--}}
                            {{--                                            <input type="checkbox" id="attribute_1_value_ 38" name="attribute_1[]" value=" 38" onchange="filter()">--}}
                            {{--                                            <label for="attribute_1_value_ 38"> 3001-3500</label>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="checkbox">--}}
                            {{--                                            <input type="checkbox" id="attribute_1_value_ 38" name="attribute_1[]" value=" 38" onchange="filter()">--}}
                            {{--                                            <label for="attribute_1_value_ 38"> 3501-4000</label>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="checkbox">--}}
                            {{--                                            <input type="checkbox" id="attribute_1_value_ 38" name="attribute_1[]" value=" 38" onchange="filter()">--}}
                            {{--                                            <label for="attribute_1_value_ 38"> 4001-5000</label>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="checkbox">--}}
                            {{--                                            <input type="checkbox" id="attribute_1_value_ 38" name="attribute_1[]" value=" 38" onchange="filter()">--}}
                            {{--                                            <label for="attribute_1_value_ 38"> 5001-6000</label>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="checkbox">--}}
                            {{--                                            <input type="checkbox" id="attribute_1_value_ 38" name="attribute_1[]" value=" 38" onchange="filter()">--}}
                            {{--                                            <label for="attribute_1_value_ 38"> 3501-4000</label>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}




                        </div>
                    </div>
                    <div class="col-xl-9">
                        <!-- <div class="bg-white"> -->
                        <input type="hidden" name="category" value="Women-Clothing-Fashion">

                        <div class="sort-by-bar row no-gutters bg-white mb-3 px-3 pt-2">
                            <div class="col-xl-12 d-flex d-xl-block justify-content-between align-items-end ">
                                <div class="sort-by-box flex-grow-1">
                                    <div class="form-group">
                                        <label>Search</label>
                                        <div class="search-widget">
                                            <input class="form-control input-lg searchpro spro"   type="text" name="q" placeholder="Search products">
                                            <button type="submit" class="btn-inner">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-xl-none ml-3 form-group">
                                    <button type="button" class="btn p-1 btn-sm" id="side-filter">
                                        <i class="la la-filter la-2x"></i>
                                    </button>
                                </div>
                            </div>


                        </div>
                        <input type="hidden" name="min_price" value="">
                        <input type="hidden" name="max_price" value="">
                        <!-- <hr class=""> -->
                        <div class="products-box-bar p-3 bg-white">

                            <div class="row sm-no-gutters gutters-5 products">
                                @include('frontend.include.all_product_include')
                            </div>
                            <div class="text-center loading">
                                <img src="{{asset('assets/frontend/images/load.gif')}}" >
                            </div>
                        </div>
                        <div class="products-pagination bg-white p-3">

                        </div>

                        <!-- </div> -->
                    </div>
                </div>
            </form>
        </div>
    </section>

@stop
@section('js')
    <script>
        $('.products').hide();
        $('.loading').show();
        setTimeout(function(){
            $('.loading').hide();
            $('.products').show();
        }, 2000);

        $(window).on('hashchange', function() {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                }else{
                    getData(page);
                }
            }
        });



        $('.common_selector').click(function () {
            $("html, body").animate({ scrollTop: 100 }, "slow");
        })


        $(document).ready(function () {

            $(document).on('click', '.pagination a',function(event)
            {
                event.preventDefault();

                $("html, body").animate({ scrollTop: 100 }, "slow");

                $('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');
                // console.log(myurl);
                var newurl = myurl.substr(0,myurl.length-1);

                var page=$(this).attr('href').split('page=')[1];
                var newurldata = (newurl+page);
                // console.log(newurldata);
                getData(myurl);
            });





            filter_data();

            function filter_data() {
                var catagory = get_filter('category');
                var midcatagory = get_filter('midcategory');
                var endcatagory = get_filter('endcategory');
                var brand = get_filter('brand');
                var se = get_filter_two('spro');

                $.ajax({
                    type : "POST",
                    url: "{{route('get.all.product.by.filter')}}",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'catagory' : catagory,
                        'midcatagory' : midcatagory,
                        'endcatagory' : endcatagory,
                        'brand' : brand,
                        'se' : se,
                    },
                    success:function(data){
                        $('.products').hide();
                        $('.loading').show();
                        var totalPro = data.notices.total;

                        if(totalPro > 0){
                            setTimeout(function(){
                                $('.loading').hide();
                                $('.products').show();
                                $('.products').empty().append(data.view)
                            }, 2000);
                        }else {
                            setTimeout(function(){
                                var err_not = `<h3 class="text-center text-danger">Sorry! No Product Available</h3>`;
                                $('.loading').hide();
                                $('.products').show();
                                $('.products').empty().append(err_not)
                            }, 2000);
                        }

                    }
                });
            }



            function get_filter(class_name)
            {
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }

            function get_filter_two(class_name)
            {
                var data = $('.'+class_name).val();
                return data;
            }


            $('.common_selector').click(function(){
                filter_data();
            });

            $('.searchpro').keyup(function () {
                // var search = $(this).val();
                filter_data();
                // console.log(search)
            });



        });



        function getData(myurl){
            function get_filter_data(class_name)
            {
                var filter = [];
                $('.'+class_name+':checked').each(function(){
                    filter.push($(this).val());
                });
                return filter;
            }

            function get_filter_two(class_name)
            {
                var data = $('.'+class_name).val();
                return data;
            }


            var catagory = get_filter_data('category');
            var midcatagory = get_filter_data('midcategory');
            var endcatagory = get_filter_data('endcategory');
            var brand = get_filter_data('brand');
            var se = get_filter_two('spro');
            $.ajax(
                {
                    url: myurl,
                    type: "get",
                    data : {
                        '_token' : "{{csrf_token()}}",
                        'catagory' : catagory,
                        'midcatagory' : midcatagory,
                        'endcatagory' : endcatagory,
                        'brand' : brand,
                        'se' : se,
                    },
                    datatype: "html"
                }).done(function(data){

                $('.products').hide();
                $('.loading').show();
                setTimeout(function(){
                    $('.loading').hide();
                    $('.products').show();
                    $('.products').empty().append(data.view)
                }, 2000);

                // $('.products').empty().append(data.view)

                // location.hash = myurl;

            }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert('No response from server');
            });
        }





    </script>
@stop
