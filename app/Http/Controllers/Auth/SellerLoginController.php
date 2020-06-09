<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SellerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:seller',['except'=>['logout']]);
    }


    public function showLoginform()
    {
        return view('auth.sellerLogin');
    }



    //this is login function for admin which is given email and password to get data form database
    public function login(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if(Auth::guard('seller')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect(route('seller.dashboard'));
        }

        return redirect()->back();

    }


    public function seller_register()
    {
        return view('auth.sellerRegister');
    }

    public function seller_register_save(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required',
           'phone' => 'required',
           'password' => 'required',
           'password_confirmation' => 'required',
        ]);
        $seller_save = new Seller();
        $seller_save->name = $request->name;
        $seller_save->email = $request->email;
        $seller_save->phone = $request->phone;
        $seller_save->password = Hash::make($request->password);
        $seller_save->save();

        return redirect(route('seller.login'));
    }




    //this funsion for admin logout which i customized to cpy form loginController
    public function logout()
    {
        Auth::guard('seller')->logout();
        return redirect(route('seller.login'));
    }
}
