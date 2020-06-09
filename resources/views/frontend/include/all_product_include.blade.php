@foreach($products as $product)
<div class="col-xxl-3 col-xl-4 col-lg-3 col-md-4 col-6">
    <div class="product-box-2 bg-white alt-box my-md-2">
        <div class="position-relative overflow-hidden">
            <a href="{{route('product.details',$product->id)}}" class="d-block product-image h-100 text-center" tabindex="0">
                <img class="img-fit lazyloaded" src="{{asset($product->main_image)}}" data-src="{{asset($product->main_image)}}" alt="{{$product->product_name}}">
            </a>
{{--            <div class="product-btns clearfix">--}}
{{--                <button class="btn add-wishlist" title="Add to Wishlist" onclick="addToWishList(101)" type="button">--}}
{{--                    <i class="la la-heart-o"></i>--}}
{{--                </button>--}}
{{--                <button class="btn add-compare" title="Add to Compare" onclick="addToCompare(101)" type="button">--}}
{{--                    <i class="la la-refresh"></i>--}}
{{--                </button>--}}
{{--                <button class="btn quick-view" title="Quick view" onclick="showAddToCartModal(101)" type="button">--}}
{{--                    <i class="la la-eye"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
        </div>
        <div class="p-md-3 p-2">
            <div class="price-box">
                @if (!empty($product->old_price))
                    <del class="old-product-price strong-400">{{$gn->site_currency}} {{$product->old_price}}</del>
                @endif
                <span class="product-price strong-600">{{$gn->site_currency}} {{$product->new_price}}</span>
            </div>
            <div class="star-rating star-rating-sm mt-1">
                <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </div>
            <h2 class="product-title p-0">
                <a href="{{route('product.details',$product->id)}}" class=" text-truncate">{{$product->product_name}}</a>
            </h2>
            <a href="{{route('add.to.cart.single',$product->id)}}">
                <div class="club-point mt-2 bg-soft-base-1 border-light-base-1 border">
                    <button type="button" class="btn btn-success btn-sm btn-block">Add To Cart</button>
                </div>
            </a>

        </div>
    </div>
</div>
@endforeach

<br>
{{$products->links()}}
