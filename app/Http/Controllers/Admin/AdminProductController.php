<?php

namespace App\Http\Controllers\Admin;

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
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminProductController extends Controller
{
    public function product()
    {
        $products = product::orderBy('id','desc')->get();
        return view('admin.product.productList',compact('products'));
    }

    public function product_create()
    {
        $top_cats = top_category::all();
        $mid_cats = middle_category::all();
        $end_cats = end_category::all();
        $brands = brand::all();
        $sizes = size::all();
        $colors = color::all();
        return view('admin.product.productCreate',compact('top_cats','mid_cats','end_cats','brands','sizes','colors'));
    }

    public function product_save(Request $request)
    {

        $this->validate($request,[
            'product_name'=>'required',
            'top_cat_id'=>'required|not_in:0',
            'mid_cat_id'=>'required|not_in:0',
            'end_cat_id'=>'required|not_in:0',
            'old_price'=>'required',
            'new_price'=>'required',
            'main_image'=>'required',
            'description'=>'required',
        ],[
            'product_name.required' => 'Please Enter Product Name',
            'top_cat_id.required|not_in:0' => 'Please Select Mid Category',
            'mid_cat_id.required|not_in:0' => 'Please Select Mid Category',
            'end_cat_id.required|not_in:0' => 'Please Select End Category',
            'old_price.required' => 'Please Enter Old Price',
            'new_price.required' => 'Please Enter New Price',
            'main_image.required' => 'Please Select Product Image',
            'description.required||not_in:0' => 'Please Enter Product Description',
        ]);


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
        $new_product->is_admin = 0;
        $new_product->status = $request->status;


        $frm_sizes = $request->size_id;
        $frm_color = $request->color_id;
        if ($new_product->save()){

            if ($frm_color){
                for ($i=0;$i<count($frm_color);$i++){
                    $new_product_color = new product_color();
                    $new_product_color->product_id = $new_product->id;
                    $new_product_color->color_id = $frm_color[$i];
                    $new_product_color->save();
                }
            }

            if ($frm_sizes){
                for ($i=0;$i<count($frm_sizes);$i++){
                    $new_product_size = new product_size();
                    $new_product_size->product_id = $new_product->id;
                    $new_product_size->size_id = $frm_sizes[$i];
                    $new_product_size->save();
                }
            }


        }

        return back()->with('success','Product Successfully Created');


    }

    public function product_view($id)
    {
        $top_cats = top_category::all();
        $mid_cats = middle_category::all();
        $end_cats = end_category::all();
        $product = product::where('id',$id)
            ->with('color')
            ->with('size')
            ->first();
        $brands = brand::all();
        $sizes = size::all();
        $colors = color::all();

        return view('admin.product.productView',compact('top_cats','mid_cats','end_cats','product','brands','sizes','colors'));
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
        $update_product->is_admin = 0;
        $update_product->status = $request->status;

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
        $delete_product = product::where('id',$request->product_delete_id)->first();
        @unlink($delete_product->main_image);
        @unlink($delete_product->image_one);
        @unlink($delete_product->image_two);
        @unlink($delete_product->image_three);
        @unlink($delete_product->image_four);
        @unlink($delete_product->image_five);

        $delete_product->delete();

        return back()->with('success','Product Successfully Deleted');
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


    public function seller_pending_product()
    {
        $products = product::where('is_admin','!=',0)
            ->where('status',3)
            ->with('seller')
            ->get();
        return view('admin.product.sellerPendingProduct',compact('products'));
    }

    public function seller_product_details($id)
    {
        $top_cats = top_category::all();
        $mid_cats = middle_category::all();
        $end_cats = end_category::all();
        $product = product::where('id',$id)
            ->with('color')
            ->with('size')
            ->first();
        $brands = brand::all();
        $sizes = size::all();
        $colors = color::all();
        return view('admin.product.sellerProductDetails',compact('top_cats','mid_cats','end_cats','product','brands','sizes','colors'));
    }

    public function seller_product_update(Request $request)
    {
        $seller_product = product::where('id',$request->product_edit_id)->first();
        $seller_product->status = $request->status;
        $seller_product->save();

        return back()->with('success','Product Updated');

    }

    public function seller_approved_product()
    {
        $products = product::where('is_admin','!=',0)
            ->where('status',4)
            ->with('seller')
            ->get();
        return view('admin.product.sellerApprovedProduct',compact('products'));
    }

    public function seller_rejected_product()
    {
        $products = product::where('is_admin','!=',0)
            ->where('status',5)
            ->with('seller')
            ->get();
        return view('admin.product.sellerRejectedProduct',compact('products'));
    }





}
