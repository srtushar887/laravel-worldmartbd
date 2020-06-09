<?php

namespace App\Http\Controllers\Admin;

use App\home_slider;
use App\Http\Controllers\Controller;
use App\payment_gateway_image;
use App\social_icon;
use App\static_data;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminFrontendController extends Controller
{
    public function home_slider()
    {
        $sliders = home_slider::all();
        return view('admin.frontend.slider',compact('sliders'));
    }

    public function home_slider_save(Request $request)
    {
        $slider = new home_slider();
        if($request->hasFile('slider_image')){
            $image = $request->file('slider_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('slider_image');
            $directory = 'assets/admin/images/slider/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->resize(648,275)->save($imgUrl);
            $slider->slider_image = $imgUrl;
        }

        $slider->save();

        return back()->with('success','Slider Created');

    }


    public function home_slider_update(Request $request)
    {
        $slider_update = home_slider::where('id',$request->slider_edit_id)->first();
        if($request->hasFile('slider_image')){
            @unlink($slider_update->slider_image);
            $image = $request->file('slider_image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('slider_image');
            $directory = 'assets/admin/images/slider/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->resize(648,275)->save($imgUrl);
            $slider_update->slider_image = $imgUrl;
        }

        $slider_update->save();

        return back()->with('success','Slider Updated');

    }

    public function home_slider_delete(Request $request)
    {
        $slider_delete = home_slider::where('id',$request->slider_delete_id)->first();
        @unlink($slider_delete->slider_image);
        $slider_delete->delete();
        return back()->with('success','Slider Deleted');
    }


    public function static_data()
    {
        $static_data = static_data::first();
        return view('admin.frontend.staticData',compact('static_data'));
    }

    public function static_data_update(Request $request)
    {
        $static = static_data::first();
        $static->about_us = $request->about_us;
        $static->deller = $request->deller;
        $static->return = $request->return;
        $static->support = $request->support;
        $static->privacy = $request->privacy;
        $static->team = $request->team;
        $static->home_footer = $request->home_footer;
        $static->save();

        return back()->with('success','Static Data Updated');

    }

    public function social_icon()
    {
        $sicoals = social_icon::all();
        return view('admin.frontend.socialIcon',compact('sicoals'));
    }

    public function social_icon_save(Request $request)
    {
        $new_icon = new social_icon();
        $new_icon->name = $request->name;
        $new_icon->icon = $request->icon;
        $new_icon->link = $request->link;
        $new_icon->save();

        return back()->with('success','Social Icon Created');
    }

    public function social_icon_update(Request $request)
    {
        $update_icon = social_icon::where('id',$request->icon_edit_id)->first();
        $update_icon->name = $request->name;
        $update_icon->icon = $request->icon;
        $update_icon->link = $request->link;
        $update_icon->save();

        return back()->with('success','Social Icon Updated');
    }

    public function social_icon_delete(Request $request)
    {
        $delete_socil_icon = social_icon::where('id',$request->icon_delete_id)->first();
        $delete_socil_icon->delete();
        return back()->with('success','Social Icon Deleted');
    }







}
