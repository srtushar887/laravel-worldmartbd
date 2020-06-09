<?php

namespace App\Http\Controllers\Dealer;

use App\general_setting;
use App\Http\Controllers\Controller;
use App\payment_gateway_image;
use App\product;
use App\user_order;
use App\user_order_detail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DealerProductController extends Controller
{
    public function order_product()
    {
        $products = product::where('is_admin',0)->where('status',1)->get();
        return view('dealer.product.orderProduct',compact('products'));
    }


    public function product_add_cart(Request $request)
    {
        $product = product::where('id',$request->product_id)->first();
        $qt = $request->qty;

        $data['qty'] = $qt;
        $data['id'] = $product->id;
        $data['name'] = $product->product_name;
        $data['price'] = $product->new_price;
        $data['weight'] = 550;
        $data['options']['image'] = $product->main_image;
        $data['options']['total_price'] = $product->new_price * $qt;

        Cart::add($data);
        return back();
    }

    public function product_remove_cart($id)
    {
        Cart::remove($id);
        return back();
    }

    public function payment()
    {
        $payment = payment_gateway_image::all();
        return view('dealer.product.payment',compact('payment'));
    }

    public function payment_save(Request $request)
    {
        $this->validate($request,[
           'payment_type' => 'required',
           'trx_id' => 'required',
           'sender_address' => 'required',
        ]);


        $dealer_order = new user_order();
        $dealer_order->user_id = Auth::user()->id;
        $dealer_order->user_order_id = Auth::user()->id.Str::random(5);
        $dealer_order->payment_type = $request->payment_type;
        $dealer_order->total_amount = $request->total_amount;
        $dealer_order->trx_id = $request->trx_id;
        $dealer_order->sender_address = $request->sender_address;
        $dealer_order->status = 0;
        $dealer_order->type = 2;

        if ($dealer_order->save()){
            $cards = Cart::content();
            foreach ($cards as $card){
                $order_detais = new user_order_detail();
                $order_detais->order_id = $dealer_order->id;
                $order_detais->product_id = $card->id;
                $order_detais->price = $card->price;
                $order_detais->qty = $card->qty;
                $order_detais->save();
            }
        }

        Cart::destroy();
        return back();


    }


    public function pending_product_list()
    {
        $orders = user_order::where('user_id',Auth::user()->id)->where('type',2)->where('status',0)->get();
        return view('dealer.product.pendingProduct',compact('orders'));
    }

    public function delivered_product_list()
    {
        $orders = user_order::where('user_id',Auth::user()->id)->where('type',2)->where('status',1)->get();
        return view('dealer.product.approvedProduct',compact('orders'));
    }

    public function rejected_product_list()
    {
        $orders = user_order::where('user_id',Auth::user()->id)->where('type',2)->where('status',2)->get();
        return view('dealer.product.rejectedProduct',compact('orders'));
    }

    public function canceled_product_list()
    {
        $orders = user_order::where('user_id',Auth::user()->id)->where('type',2)->where('status',3)->get();
        return view('dealer.product.canceledProduct',compact('orders'));
    }


    public function my_order_details($id)
    {
        $order = user_order::where('id',$id)->first();
        return view('dealer.product.orderDetails',compact('order'));
    }





}
