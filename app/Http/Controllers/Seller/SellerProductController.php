<?php

namespace App\Http\Controllers\Seller;

use App\brand;
use App\color;
use App\end_category;
use App\Http\Controllers\Controller;
use App\middle_category;
use App\product;
use App\product_color;
use App\product_size;
use App\size;
use App\top_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SellerProductController extends Controller
{
    public function create_product()
    {
        $top_cats = top_category::all();
        $mid_cats = middle_category::all();
        $end_cats = end_category::all();
        $brands = brand::all();
        $sizes = size::all();
        $colors = color::all();
        return view('seller.product.create',compact('top_cats','mid_cats','end_cats','brands','sizes','colors'));
    }

    public function create_product_save(Request $request)
    {
        $new_product = new product();
        if($request->hasFile('main_image')){
            $image = $request->file('main_image');
            $imageName = Str::random(5).uniqid().time().'.'.$image->getClientOriginalName('main_image');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->resize(550, 550)->save($imgUrl);
            $new_product->main_image = $imgUrl;
        }

        if($request->hasFile('image_one')){
            $image = $request->file('image_one');
            $imageName = Str::random(5).uniqid().time().'.'.$image->getClientOriginalName('image_one');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->resize(550, 550)->save($imgUrl);
            $new_product->image_one = $imgUrl;
        }

        if($request->hasFile('image_two')){
            $image = $request->file('image_two');
            $imageName = Str::random(5).uniqid().time().'.'.$image->getClientOriginalName('image_two');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->resize(550, 550)->save($imgUrl);
            $new_product->image_two = $imgUrl;
        }

        if($request->hasFile('image_three')){
            $image = $request->file('main_image');
            $imageName = Str::random(5).uniqid().time().'.'.$image->getClientOriginalName('image_three');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->resize(550, 550)->save($imgUrl);
            $new_product->image_three = $imgUrl;
        }

        if($request->hasFile('image_four')){
            $image = $request->file('image_four');
            $imageName = Str::random(5).uniqid().time().'.'.$image->getClientOriginalName('image_four');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->resize(550, 550)->save($imgUrl);
            $new_product->image_four = $imgUrl;
        }

        if($request->hasFile('image_five')){
            $image = $request->file('image_five');
            $imageName = Str::random(5).uniqid().time().'.'.$image->getClientOriginalName('image_five');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->resize(550, 550)->save($imgUrl);
            $new_product->image_five = $imgUrl;
        }


        $new_product->product_name = $request->product_name;
        $new_product->top_cat_id = $request->top_cat_id;
        $new_product->mid_cat_id = $request->mid_cat_id;
        $new_product->end_cat_id = $request->end_cat_id;
        $new_product->brand_id = $request->brand_id;
        $new_product->hot_deal = $request->hot_deal;
        $new_product->old_price = $request->old_price;
        $new_product->new_price = $request->new_price;
        $new_product->description = $request->description;
        $new_product->is_admin = Auth::user('seller')->id;
        $new_product->status = 3;

        $frm_sizes = $request->size_id;
        $frm_color = $request->color_id;
        if ($new_product->save()){

            for ($i=0;$i<count($frm_color);$i++){
                $new_product_color = new product_color();
                $new_product_color->product_id = $new_product->id;
                $new_product_color->color_id = $frm_color[$i];
                $new_product_color->save();
            }

            for ($i=0;$i<count($frm_sizes);$i++){
                $new_product_size = new product_size();
                $new_product_size->product_id = $new_product->id;
                $new_product_size->size_id = $frm_sizes[$i];
                $new_product_size->save();
            }

        }

        return back()->with('success','Product Successfully Created');
    }

    public function product_list(Request $request)
    {
        $products = product::where('is_admin',Auth::user()->id)->orderBy('id','desc')->get();
        return view('seller.product.productList',compact('products'));
    }

    public function product_update($id)
    {
        $top_cats = top_category::all();
        $mid_cats = middle_category::all();
        $end_cats = end_category::all();
        $brands = brand::all();
        $sizes = size::all();
        $colors = color::all();
        $product = product::where('id',$id)->first();
        return view('seller.product.update',compact('top_cats','mid_cats','end_cats','brands','sizes','colors','product'));
    }


    public function product_size_edit_delete(Request $request)
    {
        $del_sz = product_size::where('id',$request->id)->first();
        $del_sz->delete();
    }

    public function product_color_edit_delete(Request $request)
    {
        $del_cl = product_color::where('id',$request->id)->first();
        $del_cl->delete();
    }

    public function product_update_save(Request $request)
    {
        $update_product = product::where('id',$request->product_edit_id)->first();
        if($request->hasFile('main_image')){
            @unlink($update_product->main_image);
            $image = $request->file('main_image');
            $imageName = Str::random(5).uniqid().time().'.'.$image->getClientOriginalName('main_image');
            $directory = 'assets/admin/images/product/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->resize(550, 550)->save($imgUrl);
            $update_product->main_image = $imgUrl;
        }

        if($request->hasFile('image_one')){
            @unlink($update_product->image_one);
            $image = $request->file('image_one');
            $imageName = Str::random(5).uniqid().time().'.'.$image->getClientOriginalName('image_one');
            $directory = 'assets/admin/images/product/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->resize(550, 550)->save($imgUrl1);
            $update_product->image_one = $imgUrl1;
        }

        if($request->hasFile('image_two')){
            @unlink($update_product->image_two);
            $image = $request->file('image_two');
            $imageName = Str::random(5).uniqid().time().'.'.$image->getClientOriginalName('image_two');
            $directory = 'assets/admin/images/product/';
            $imgUrl2  = $directory.$imageName;
            Image::make($image)->resize(550, 550)->save($imgUrl2);
            $update_product->image_two = $imgUrl2;
        }

        if($request->hasFile('image_three')){
            @unlink($update_product->image_three);
            $image = $request->file('image_three');
            $imageName = Str::random(5).uniqid().time().'.'.$image->getClientOriginalName('image_three');
            $directory = 'assets/admin/images/product/';
            $imgUrl3  = $directory.$imageName;
            Image::make($image)->resize(550, 550)->save($imgUrl3);
            $update_product->image_three = $imgUrl3;
        }

        if($request->hasFile('image_four')){
            @unlink($update_product->image_four);
            $image = $request->file('image_four');
            $imageName = Str::random(5).uniqid().time().'.'.$image->getClientOriginalName('image_four');
            $directory = 'assets/admin/images/product/';
            $imgUrl4  = $directory.$imageName;
            Image::make($image)->resize(550, 550)->save($imgUrl4);
            $update_product->image_four = $imgUrl4;
        }

        if($request->hasFile('image_five')){
            @unlink($update_product->image_five);
            $image = $request->file('image_five');
            $imageName = Str::random(5).uniqid().time().'.'.$image->getClientOriginalName('image_five');
            $directory = 'assets/admin/images/product/';
            $imgUrl5  = $directory.$imageName;
            Image::make($image)->resize(550, 550)->save($imgUrl5);
            $update_product->image_five = $imgUrl5;
        }


        $update_product->product_name = $request->product_name;
        $update_product->top_cat_id = $request->top_cat_id;
        $update_product->mid_cat_id = $request->mid_cat_id;
        $update_product->end_cat_id = $request->end_cat_id;
        $update_product->brand_id = $request->brand_id;
        $update_product->hot_deal = $request->hot_deal;
        $update_product->old_price = $request->old_price;
        $update_product->new_price = $request->new_price;
        $update_product->description = $request->description;

        $frm_sizes = $request->size_id;
        $frm_color = $request->color_id;

        if (empty($frm_sizes)){
            $frm_sizes = [];
        }

        if (empty($frm_color))
        {
            $frm_color = [];
        }

        if ($update_product->save()) {

            if (count($frm_sizes) > 0){
                for ($i = 0; $i < count($frm_sizes); $i++) {
                    $exist_sz = product_size::where('product_id', $update_product->id)->where('size_id', $frm_sizes[$i])->get();
                    if (count($exist_sz) > 0) {
                        foreach ($exist_sz as $exda) {
                            $dtsz = product_size::where('id', $exda->id)->first();
                            $dtsz->size_id = $frm_sizes[$i];
                            $dtsz->save();
                        }
                    } else {
                        $new_sz_sv = new product_size();
                        $new_sz_sv->product_id = $update_product->id;
                        $new_sz_sv->size_id = $frm_sizes[$i];
                        $new_sz_sv->save();
                    }
                }
            }


            if (count($frm_color) > 0){
                for ($i=0;$i<count($frm_color);$i++){
                    $esist_color = product_color::where('product_id',$update_product->id)->where('color_id',$frm_color[$i])->get();
                    if (count($esist_color) > 0)
                    {
                        foreach ($esist_color as $excil){
                            $excldt = product_color::where('id',$excil->id)->first();
                            $excldt->color_id = $frm_color[$i];
                            $excldt->save();

                        }
                    }else{
                        $sav_new_cl = new product_color();
                        $sav_new_cl->product_id = $update_product->id;
                        $sav_new_cl->color_id = $frm_color[$i];
                        $sav_new_cl->save();
                    }
                }
            }

        }



        return back()->with('success','Product Successfully Updated');
    }

    public function product_delete(Request $request)
    {
        $prouct_delete = product::where('id',$request->seller_product_delete_id)->first();
        $prouct_delete->delete();
        return back()->with('success','Product Successfully Deleted');
    }


    public function pending_product_list()
    {
        $products = product::where('is_admin',Auth::user()->id)
            ->where('status',3)
            ->orderBy('id','desc')->get();
        return view('seller.product.pendingProductList',compact('products'));
    }

    public function approved_product_list()
    {
        $products = product::where('is_admin',Auth::user()->id)
            ->where('status',4)
            ->orderBy('id','desc')->get();
        return view('seller.product.approvedProductList',compact('products'));
    }

    public function rejected_product_list()
    {
        $products = product::where('is_admin',Auth::user()->id)
            ->where('status',5)
            ->orderBy('id','desc')->get();
        return view('seller.product.rejectedProductList',compact('products'));
    }




}
