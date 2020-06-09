<?php

namespace App\Http\Controllers\Dealer;

use App\Dealer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class DealerController extends Controller
{
    public function index()
    {
        return view('dealer.index');
    }

    public function my_profile()
    {
        return view('dealer.page.myProfile');
    }

    public function my_profile_update(Request $request)
    {
        $dealer = Dealer::where('id',Auth::user()->id)->first();
        if($request->hasFile('photo')){
            @unlink($dealer->photo);
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalName('photo');
            $directory = 'assets/admin/images/dealer/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $dealer->photo = $imgUrl;
        }


        $dealer->name = $request->name;
        $dealer->email = $request->email;
        $dealer->phone = $request->phone;
        $dealer->address = $request->address;
        $dealer->country = $request->country;
        $dealer->city = $request->city;
        $dealer->postal_code = $request->postal_code;
        $dealer->zip_code = $request->zip_code;
        $dealer->save();


        return back()->with('success','Profile Updated');


    }


    public function change_password()
    {
        return view('dealer.page.changePassword');
    }

    public function change_password_save(Request $request)
    {
        $this->validate($request,[
           'npass' => 'required',
           'cpass' => 'required',
        ]);

        if ($request->npass != $request->cpass)
        {
            return back()->with('alert','Password Not Match');
        }else{
            $dealer = Dealer::where('id',Auth::user()->id)->first();
            $dealer->password = Hash::make($request->npass);
            $dealer->save();
            return back()->with('success','Password Changed');
        }


    }


}
