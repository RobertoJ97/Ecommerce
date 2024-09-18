<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use Stripe;
use Session;
class OrderController extends Controller
{
    public function checkout(){
        if(Auth::id()){
            $user=Auth::user();
            $user_id=$user->id;
            $counts=Cart::where('user_id',$user_id)->count();
        return view('order.index',compact('user','counts'));
    }
}

public function pay(Request $request){

        $name=$request->name;
        $rec_address=$request->rec_address;
        $email=$request->email;
        $phone=$request->phone;
        $userid=Auth::user()->id;
        $carts=Cart::where('user_id',$userid)->get();

        foreach($carts as $cart){
            $order=new Order;
            $order->name=$name;
            $order->rec_address=$rec_address;
            $order->email=$email;
            $order->phone=$phone;
            $order->product_id=$cart->product_id;
            $order->user_id=$userid;
            $order->save();
    }
           $cart_removes=Cart::where('user_id',$userid)->get();
           foreach($cart_removes as $cart_remove){
           $data=Cart::find($cart_remove->id);
           $data->delete();
        }

        toastr()->closeButton()->timeOut(5000)->addSuccess('Product Added Successfully');
       return redirect()->back();
}
        public function list(){
        $orders=Order::all();
        return view('order.list',compact('orders'));

        }

        public function on_way($id){
           $order=Order::find($id);
           $name=$order->name;
           $data=Order::where('name',$name)->get();
           foreach($data as $dat){
            $dat->status="On the way";
            $dat->save();
        }
            return redirect()->back();

        }
        public function delivered($id){
            $order=Order::find($id);
            $name=$order->name;
            $data=Order::where('name',$name)->get();
            foreach($data as $dat){
             $dat->status="Delivered";
             $dat->save();
         }
             return redirect()->back();

         }

         public function pdf($id){
            $data=Order::find($id);
            $pdf = Pdf::loadView('order.invoice',compact('data'));
            return $pdf->download('invoice.pdf');
        }
}
