<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\user_order;
use App\user_order_detail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserProfileController extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }


    public function order_history()
    {
        $user_orders = user_order::where('type',1)->where('user_id',Auth::user()->id)
            ->orderBy('id','desc')
            ->paginate(10);
        return view('user.orderHistory',compact('user_orders'));
    }


    public function profile_update(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        if($request->hasFile('photo')){
            @unlink($user->photo);
            $image = $request->file('photo');
            $imageName = $user->id.uniqid().'.'.$image->getClientOriginalName('photo');
            $directory = 'assets/frontend/images/user/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $user->photo = $imgUrl;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->zip_code = $request->zip_code;
        $user->save();

        return back()->with('success','Profile successfully updated');


    }


    public function chnage_pass()
    {
        return view('user.changePass');
    }

    public function chnage_pass_save(Request $request)
    {
        $npass = $request->npass;
        $cpass = $request->cpass;


        if ($npass != $cpass)
        {
            return back()->with('alert','Password Not Match');
        }else{
            $user = User::where('id',Auth::user()->id)->first();
            $user->password = Hash::make($npass);
            $user->save();
            return back()->with('success','Password Successfully Changed');
        }

    }


    public function check_out()
    {
        return view('user.checkOut');
    }

    public function check_out_save(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->city = $request->city;
        $user->postal_code = $request->postal_code;
        $user->zip_code = $request->zip_code;
        $user->save();

        $user_order = new user_order();
        $user_order->user_id = $user->id;
        $user_order->user_order_id = $user->id.rand(0000000000,9999999999);
        $user_order->payment_type = $request->p_method;
        $user_order->total_amount = $request->amount;
        $user_order->trx_id = $request->trx_id;
        $user_order->sender_address = $request->sender_address;
        $user_order->status = 0;
        $user_order->type = 1;
        if ($user_order->save()){
            $cards = Cart::content();
            foreach ($cards as $card){
                $order_detais = new user_order_detail();
                $order_detais->order_id = $user_order->id;
                $order_detais->product_id = $card->id;
                $order_detais->price = $card->price;
                $order_detais->qty = $card->qty;
                $order_detais->color_id = $card->options->color;
                $order_detais->size_id = $card->options->size;
                $order_detais->save();
            }
        }

        Cart::destroy();
        return back();

    }



}
