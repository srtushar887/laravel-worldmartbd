<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\user_order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function user_new_order()
    {
        $orders = user_order::where('type',1)->where('status',0)->with('user')->get();
        return view('admin.order.userNewOrder',compact('orders'));
    }

    public function user_order_view($id)
    {
        $order = user_order::where('id',$id)->with('user')->first();
        return view('admin.order.userOrderView',compact('order'));
    }

    public function user_order_save(Request $request)
    {
        $status = $request->status;

        if ($status == 1)
        {
            $order = user_order::where('id',$request->orderid)->first();
            $order->status = 1;
            $order->save();
            return back()->with('success','Order Delivered');
        }
        elseif ($status == 2)
        {
            $order = user_order::where('id',$request->orderid)->first();
            $order->status = 2;
            $order->save();
            return back()->with('success','Order Rejected');
        }elseif ($status == 3)
        {
            $order = user_order::where('id',$request->orderid)->first();
            $order->status = 3;
            $order->save();
            return back()->with('success','Order Cancel');
        }else{
            return back()->with('success','Order Action Not Set');
        }
    }


    public function user_delivered_order()
    {
        $orders = user_order::where('type',1)->where('status',1)->with('user')->get();
        return view('admin.order.useDeliveredOrder',compact('orders'));
    }

    public function user_rejected_order()
    {
        $orders = user_order::where('type',1)->where('status',2)->with('user')->get();
        return view('admin.order.useRejectedOrder',compact('orders'));
    }

    public function user_canceled_order()
    {
        $orders = user_order::where('type',1)->where('status',3)->with('user')->get();
        return view('admin.order.usecanceledOrder',compact('orders'));
    }

    public function dealer_new_order()
    {
        $orders = user_order::where('type',2)->where('status',0)
            ->with('dealer')
            ->get();
        return view('admin.order.dealerNewOrder',compact('orders'));
    }


    public function dealer_delivered_order()
    {
        $orders = user_order::where('type',2)->where('status',1)
            ->with('dealer')
            ->get();
        return view('admin.order.dealerDeliveredOrder',compact('orders'));
    }

    public function dealer_rejected_order()
    {
        $orders = user_order::where('type',2)->where('status',2)
            ->with('dealer')
            ->get();
        return view('admin.order.dealerRejectedOrder',compact('orders'));
    }

    public function dealer_canceled_order()
    {
        $orders = user_order::where('type',2)->where('status',3)
            ->with('dealer')
            ->get();
        return view('admin.order.dealerCancelOrder',compact('orders'));
    }


    public function dealer_order_view($id)
    {
        $order = user_order::where('id',$id)->with('dealer')->first();
        return view('admin.order.dealerOrderView',compact('order'));
    }

    public function dealer_order_save(Request $request)
    {
        $status = $request->status;

        if ($status == 1)
        {
            $order = user_order::where('id',$request->orderid)->first();
            $order->status = 1;
            $order->save();
            return back()->with('success','Order Delivered');
        }
        elseif ($status == 2)
        {
            $order = user_order::where('id',$request->orderid)->first();
            $order->status = 2;
            $order->save();
            return back()->with('success','Order Rejected');
        }elseif ($status == 3)
        {
            $order = user_order::where('id',$request->orderid)->first();
            $order->status = 3;
            $order->save();
            return back()->with('success','Order Cancel');
        }else{
            return back()->with('success','Order Action Not Set');
        }
    }

}
