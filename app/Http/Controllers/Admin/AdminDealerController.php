<?php

namespace App\Http\Controllers\Admin;

use App\Dealer;
use App\Http\Controllers\Controller;
use App\User;
use App\user_order;
use App\user_order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminDealerController extends Controller
{
    public function create_dealer_account()
    {
        return view('admin.dealer.createDealerAccount');
    }

    public function dealer_account_save(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
           'email' => 'required',
           'phone' => 'required',
           'password' => 'required|min:8',
           'confirm_password' => 'required|min:8',
           'action' => 'required',
        ]);

        $dealer_save = new Dealer();
        $dealer_save->name = $request->name;
        $dealer_save->email = $request->email;
        $dealer_save->phone = $request->phone;
        $dealer_save->password =Hash::make($request->password);
        $dealer_save->status = $request->action;
        $dealer_save->save();

        return back()->with('success',"Dealer Account Created");


    }


    public function all_dealers()
    {
        $users = Dealer::all();
        return view('admin.dealer.allDealers',compact('users'));
    }

    public function active_dealers()
    {
        $users = Dealer::where('status',1)->get();
        return view('admin.dealer.activeDealers',compact('users'));
    }

    public function block_dealers()
    {
        $users = Dealer::where('status',2)->get();
        return view('admin.dealer.blockDealers',compact('users'));
    }


    public function dealers_profile($id)
    {
        $user = Dealer::where('id',$id)->first();
        return view('admin.dealer.dealerProfile',compact('user'));
    }

    public function dealers_pass_change(Request $request)
    {
        $dealer = Dealer::where('id',$request->user_id)->first();
        $dealer->password = Hash::make($request->password);
        $dealer->save();

        return back()->with('success','Password Successfully Changed');
    }

    public function dealers_account_action(Request $request)
    {
        $action = $request->action;
        if ($action == 0)
        {
            $user = Dealer::where('id',$request->user_id)->first();
            $user->status = 0;
            $user->save();

            return back()->with('success','Account Pending');
        }elseif ($action == 1){
            $user = Dealer::where('id',$request->user_id)->first();
            $user->status = 1;
            $user->save();

            return back()->with('success','Account Approved');
        }else{
            $user = Dealer::where('id',$request->user_id)->first();
            $user->status = 2;
            $user->save();

            return back()->with('success','Account Blocked');
        }
    }

    public function dealers_account_delete(Request $request)
    {
        $user = Dealer::where('id',$request->dealer_delete_id)->first();

        $orders = user_order::where('user_id',$user->id)->where('type',2)->get();
        foreach ($orders as $order){
            $order_details = user_order_detail::where('order_id',$order->id)->first();
            $order_details->delete();
        }

        $delete_order = user_order::where('user_id',$user->id)->get();
        foreach ($delete_order as $delorder){
            $del_or = user_order::where('id',$delorder->id)->first();
            $del_or->delete();
        }
        $user->delete();

        return redirect(route('admin.all.dealer'))->with('success','Dealer Account Deleted');

    }



}
