<?php

namespace App\Http\Controllers\Admin;

use App\Dealer;
use App\general_setting;
use App\Http\Controllers\Controller;
use App\payment_gateway_image;
use App\product;
use App\Seller;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        $product_product = product::count();
        $product_publish_product = product::where('status',1)->count();
        $product_unpublish_product = product::where('status',2)->count();
        $user = User::count();
        $dealers = Dealer::count();
        $seller = Seller::count();
        return view('admin.index',compact('product_product','product_publish_product','product_unpublish_product','user','dealers','seller'));
    }

    public function general_setting()
    {
        $gen = general_setting::first();
        return view('admin.page.generalSetting',compact('gen'));
    }

    public function general_setting_save(Request $request)
    {
        $gen_update = general_setting::first();
        if($request->hasFile('logo')){
            @unlink($gen_update->logo);
            $image = $request->file('logo');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('logo');
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen_update->logo = $imgUrl;
        }
        if($request->hasFile('icon')){
            @unlink($gen_update->icon);
            $image = $request->file('icon');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('icon');
            $directory = 'assets/admin/images/logo/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->save($imgUrl1);
            $gen_update->icon = $imgUrl1;
        }


        $gen_update->site_name = $request->site_name;
        $gen_update->site_email = $request->site_email;
        $gen_update->site_phone = $request->site_phone;
        $gen_update->site_currency = $request->site_currency;
        $gen_update->site_address = $request->site_address;
        $gen_update->save();

        return back()->with('success','General Setting Updated Successfully');
    }


    public function payment_gateway()
    {
        $payment = payment_gateway_image::all();
        return view('admin.page.paymentGateway',compact('payment'));
    }



    public function payment_gateway_save(Request $request)
    {
        $new_payment_gateway = new payment_gateway_image();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image');
            $directory = 'assets/admin/images/payment/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->save($imgUrl1);
            $new_payment_gateway->image = $imgUrl1;
        }

        $new_payment_gateway->name = $request->name;
        $new_payment_gateway->address = $request->address;
        $new_payment_gateway->save();

        return back()->with('success','Payment Gateway Created');

    }



    public function payment_gateway_update(Request $request)
    {
        $payment_update = payment_gateway_image::where('id',$request->gateway_edit_id)->first();
        if($request->hasFile('image')){
            @unlink($payment_update->icon);
            $image = $request->file('image');
            $imageName = uniqid().time().'.'.$image->getClientOriginalName('image');
            $directory = 'assets/admin/images/payment/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->save($imgUrl1);
            $payment_update->image = $imgUrl1;
        }

        $payment_update->name = $request->name;
        $payment_update->address = $request->address;
        $payment_update->save();

        return back()->with('success','Payment Gateway Updated');
    }

    public function payment_gateway_delete(Request $request)
    {
        $delete_gateway = payment_gateway_image::where('id',$request->gateway_delete_id)->first();
        $delete_gateway->delete();
        return back()->with('success','Payment Gateway Deleted');
    }




}
