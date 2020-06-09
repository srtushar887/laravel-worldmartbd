<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\user_order;
use App\user_order_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function all_users()
    {
        $users = User::all();
        return view('admin.users.allUsers',compact('users'));
    }

    public function active_users()
    {
        $users = User::where('status',1)->get();
        return view('admin.users.activeUsers',compact('users'));
    }

    public function block_users()
    {
        $users = User::where('status',2)->get();
        return view('admin.users.blockedUsers',compact('users'));
    }


    public function user_profile($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.users.userProfile',compact('user'));
    }

    public function user_pass_change(Request $request)
    {
        $user = User::where('id',$request->user_id)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success','Password Successfully Changed');
    }


    public function user_account_action(Request $request)
    {
        $action = $request->action;
        if ($action == 0)
        {
            $user = User::where('id',$request->user_id)->first();
            $user->status = 0;
            $user->save();

            return back()->with('success','Account Pending');
        }elseif ($action == 1){
            $user = User::where('id',$request->user_id)->first();
            $user->status = 1;
            $user->save();

            return back()->with('success','Account Approved');
        }else{
            $user = User::where('id',$request->user_id)->first();
            $user->status = 2;
            $user->save();

            return back()->with('success','Account Blocked');
        }

    }

    public function user_account_delete(Request $request)
    {
        $user = User::where('id',$request->user_delete_id)->first();

        $orders = user_order::where('user_id',$user->id)->where('type',1)->get();
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

        return redirect(route('admin.all.users'))->with('success','User Deleted');


    }


}
