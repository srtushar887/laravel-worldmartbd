<?php

namespace App\Http\Controllers\Admin;

use App\brand;
use App\color;
use App\end_category;
use App\Http\Controllers\Controller;
use App\middle_category;
use App\size;
use App\top_category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminCategoryController extends Controller
{
    public function top_category()
    {
        $top_cats = top_category::orderBy('id','desc')->get();
        return view('admin.category.topCategory',compact('top_cats'));
    }

    public function top_category_save(Request $request)
    {
        $new_top_cat = new top_category();
        if($request->hasFile('top_cat_image')){
            $image = $request->file('top_cat_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('top_cat_image');
            $directory = 'assets/admin/images/category/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->resize(120,120)->save($imgUrl);
            $new_top_cat->top_cat_image = $imgUrl;
        }

        $new_top_cat->top_cat_name = $request->top_cat_name;
        $new_top_cat->save();

        return back()->with('success','Top Category Created Succssfully');

    }

    public function top_category_update(Request $request)
    {
        $update_top_cat = top_category::where('id',$request->top_cat_edit_id)->first();
        if($request->hasFile('top_cat_image')){
            @unlink($update_top_cat->top_cat_image);
            $image = $request->file('top_cat_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('top_cat_image');
            $directory = 'assets/admin/images/category/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->resize(120,120)->save($imgUrl);
            $update_top_cat->top_cat_image = $imgUrl;
        }

        $update_top_cat->top_cat_name = $request->top_cat_name;
        $update_top_cat->save();

        return back()->with('success','Top Category Updated Succssfully');
    }

    public function top_category_delete(Request $request)
    {
        $delete_top_cat = top_category::where('id',$request->top_cat_delete_id)->first();
        @unlink($delete_top_cat->top_cat_image);
        $delete_top_cat->delete();
        return back()->with('success','Top Category Deleted Succssfully');
    }


    public function mid_category()
    {
        $top_cats = top_category::all();
        $mid_cats = middle_category::orderBy('id','desc')
            ->with('top_cat')
            ->get();
        return view('admin.category.middleCategory',compact('top_cats','mid_cats'));
    }


    public function mid_category_save(Request $request)
    {
        $new_midl_cat = new middle_category();
        $new_midl_cat->top_cat_id = $request->top_cat_id;
        $new_midl_cat->mid_cat_name = $request->mid_cat_name;
        $new_midl_cat->save();

        return back()->with('success','Middle Category Created Successfully');
    }

    public function mid_category_update(Request $request)
    {
        $mid_cat_update = middle_category::where('id',$request->mid_cat_edit_id)->first();
        $mid_cat_update->top_cat_id = $request->top_cat_id;
        $mid_cat_update->mid_cat_name = $request->mid_cat_name;
        $mid_cat_update->save();

        return back()->with('success','Middle Category Updated Successfully');
    }

    public function mid_category_delete(Request $request)
    {
        $mid_cat_delete = middle_category::where('id',$request->mid_cat_delete_id)->first();
        $mid_cat_delete->delete();
        return back()->with('success','Middle Category Deleted Successfully');
    }

    public function end_category()
    {
        $top_cats = top_category::all();
        $middle_cats = middle_category::all();
        $end_cats = end_category::orderBy('id','desc')
            ->with('top_cat')
            ->with('mid_cat')
            ->get();
        return view('admin.category.endCategory',compact('top_cats','middle_cats','end_cats'));
    }

    public function end_category_save(Request $request)
    {
        $new_end_cat = new end_category();
        $new_end_cat->top_cat_id = $request->top_cat_id;
        $new_end_cat->mid_cat_id = $request->mid_cat_id;
        $new_end_cat->end_cat_name = $request->end_cat_name;
        $new_end_cat->save();
        return back()->with('success','End Category Created Successfully');
    }

    public function end_category_update(Request $request)
    {
        $end_cat_delete = end_category::where('id',$request->end_cat_edit_id)->first();
        $end_cat_delete->top_cat_id = $request->top_cat_id;
        $end_cat_delete->mid_cat_id = $request->mid_cat_id;
        $end_cat_delete->end_cat_name = $request->end_cat_name;
        $end_cat_delete->save();
        return back()->with('success','End Category Updated Successfully');
    }

    public function end_category_delete(Request $request)
    {
        $delete_end_cat = end_category::where('id',$request->end_cat_delete_id)->first();
        $delete_end_cat->delete();
        return back()->with('success','End Category Deleted Successfully');
    }

    public function get_mid_cat_data_bt_ajax(Request $request)
    {
        $mid_cat = middle_category::where('top_cat_id',$request->id)->get();
        return response($mid_cat);
    }

    public function get_end_cat_data_bt_ajax(Request $request)
    {
        $end_cat = end_category::where('mid_cat_id',$request->mid)->get();
        return response($end_cat);
    }


    public function product_brand()
    {
        $end_cats = end_category::all();
        $brands = brand::all();
        return view('admin.category.brand',compact('end_cats','brands'));
    }

    public function product_brand_save(Request $request)
    {
        $new_brand = new brand();
        $new_brand->brand_name = $request->brand_name;
        $new_brand->save();
        return back()->with('success','Product Brand Successfully Created');
    }

    public function product_brand_update(Request $request)
    {
        $brand_update = brand::where('id',$request->brand_edit_id)->first();
        $brand_update->brand_name = $request->brand_name;
        $brand_update->save();
        return back()->with('success','Product Brand Successfully Updated');
    }

    public function product_brand_delete(Request $request)
    {
        $delete_brand = brand::where('id',$request->brand_delete_id)->first();
        $delete_brand->delete();
        return back()->with('success','Product Brand Successfully Deleted');
    }

    public function product_size()
    {
        $end_cats = end_category::all();
        $sizes = size::all();
        return view('admin.category.size',compact('end_cats','sizes'));
    }

    public function product_size_save(Request $request)
    {
        $new_size = new size();
        $new_size->size_name = $request->size_name;
        $new_size->save();
        return back()->with('success','Product Size Successfully Created');

    }

    public function product_size_update(Request $request)
    {
        $update_size = size::where('id',$request->size_edit_id)->first();
        $update_size->size_name = $request->size_name;
        $update_size->save();
        return back()->with('success','Product Size Successfully Updated');
    }

    public function product_size_delete(Request $request)
    {
        $delete_size = size::where('id',$request->size_delete_id)->first();
        $delete_size->delete();
        return back()->with('success','Product Size Successfully Deleted');
    }

    public function product_color()
    {
        $end_cats = end_category::all();
        $colors = color::all();
        return view('admin.category.color',compact('end_cats','colors'));
    }

    public function product_color_save(Request $request)
    {
        $new_color = new color();
        $new_color->color_name = $request->color_name;
        $new_color->save();

        return back()->with('success','Product Color Successfully Created');
    }

    public function product_color_update(Request $request)
    {
        $color_update = color::where('id',$request->color_edit_id)->first();
        $color_update->color_name = $request->color_name;
        $color_update->save();

        return back()->with('success','Product Color Successfully Updated');
    }


    public function product_color_delete(Request $request)
    {
        $color_delete = color::where('id',$request->color_delete_id)->first();
        $color_delete->delete();
        return back()->with('success','Product Color Successfully Deleted');
    }











}
