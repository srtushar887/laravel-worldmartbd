<?php

namespace App\Http\Controllers;

use App\brand;
use App\end_category;
use App\home_slider;
use App\middle_category;
use App\product;
use App\product_color;
use App\product_size;
use App\size;
use App\static_data;
use App\top_category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $top_cats = top_category::all();
        $latest_products = product::orderby('id','desc')->inRandomOrder()->limit(6)->get();
        $featured_products = product::orderby('id','desc')->inRandomOrder()->limit(50)->get();
        $sliders = home_slider::all();
        $brands = brand::orderBy('id','desc')->limit(10)->get();
        $random_cats = top_category::inRandomOrder()->limit(7)->get();
        $today_hot_deal = product::where('hot_deal',1)->get();
        return view('frontend.index',compact('top_cats','latest_products','featured_products','sliders','brands','random_cats','today_hot_deal'));
    }


    public function about_us()
    {
        $about = static_data::first();
        return view('frontend.aboutUs',compact('about'));
    }

    public function contact_us()
    {
        return view('frontend.contactUs');
    }


    public function all_products(Request $request)
    {
        $products = product::limit(12)->paginate(12);
        $cats = top_category::all();
        $mid_cats_data = middle_category::all();
        $ends_cats_data = end_category::all();
        $brands = brand::all();
        return view('frontend.allProducts',compact('products','cats','mid_cats_data','ends_cats_data','brands'));
    }

    public function product_view($id)
    {
        $product = product::where('id',$id)
            ->with('top_cat')
            ->first();
        $pro_sizes = product_size::where('product_id',$id)
            ->with('size_data')
            ->get();
        $pro_colors = product_color::where('product_id',$id)
            ->with('color_data')
            ->get();
        return view('frontend.productView',compact('product','pro_sizes','pro_colors'));
    }


    public function add_to_cart_single($id)
    {
        $product = product::where('id',$id)->first();

        $data['qty'] = 1;
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['price'] = $product->new_price;
        $data['weight'] = 550;
        $data['options']['image'] = $product->main_image;

        Cart::add($data);
        return back();


    }

    public function add_to_cart_product_details(Request $request)
    {
        $product = product::where('id',$request->product_id)->first();
        $qt = $request->qty;
        $data['qty'] = $qt;
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['price'] = $product->new_price;
        $data['weight'] = 550;
        $data['options']['image'] = $product->main_image;
        $data['options']['size'] = $request->prouct_sz_id;
        $data['options']['color'] = $request->prouct_cl_id;

        Cart::add($data);
        return back();
    }


    public function remove_cart_single($id)
    {
        Cart::remove($id);
        return back();
    }


    public function view_cart()
    {
        return view('frontend.viewCart');
    }

    public function cart_update_cart_page(Request $request)
    {
        $qt = $request->qty;
        $id = $request->update_id;
        Cart::update($id, $qt);
        return back();

        return back();

    }

    public function cart_delete_cart_page(Request $request)
    {
        Cart::remove($request->delete_id);
        return back();
    }

    public function privacy_policy()
    {
        $pri = static_data::first();
        return view('frontend.privacyPolicy',compact('pri'));
    }

    public function terms_conditions()
    {
        $pri = static_data::first();
        return view('frontend.tremscon',compact('pri'));
    }

    public function dealer_policy()
    {
        $pri = static_data::first();
        return view('frontend.dealerPolicy',compact('pri'));
    }

    public function return_policy()
    {
        $pri = static_data::first();
        return view('frontend.returnPolicy',compact('pri'));
    }

    public function support_policy()
    {
        $pri = static_data::first();
        return view('frontend.supportPolicy',compact('pri'));
    }


    public function main_category_products($id)
    {
        $products = product::limit(12)->paginate(12);
        $cats = top_category::all();
        $mid_cats_data = middle_category::all();
        $ends_cats_data = end_category::all();
        $brands = brand::all();
        return view('frontend.topCatProduct',compact('id','products','cats','mid_cats_data','ends_cats_data','brands'));
    }

    public function mid_category_products($id)
    {
        $products = product::limit(12)->paginate(12);
        $cats = top_category::all();
        $mid_cats_data = middle_category::all();
        $ends_cats_data = end_category::all();
        $brands = brand::all();
        return view('frontend.midCatProduct',compact('id','products','cats','mid_cats_data','ends_cats_data','brands'));
    }

    public function end_category_products($id)
    {
        $products = product::limit(12)->paginate(12);
        $cats = top_category::all();
        $mid_cats_data = middle_category::all();
        $ends_cats_data = end_category::all();
        $brands = brand::all();
        return view('frontend.endCatProduct',compact('id','products','cats','mid_cats_data','ends_cats_data','brands'));
    }

    public function search(Request $request)
    {
        $q = $request->q;
        $id = $request->category;
        $products = product::limit(12)->paginate(12);
        $cats = top_category::all();
        $mid_cats_data = middle_category::all();
        $ends_cats_data = end_category::all();
        $brands = brand::all();
        return view('frontend.search',compact('products','cats','mid_cats_data','ends_cats_data','brands','q','id'));
    }




}
