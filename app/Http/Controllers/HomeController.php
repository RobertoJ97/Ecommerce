<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Http\Request;
use Stripe;
use Session;


class HomeController extends Controller
{
    public $count;
    public function index(){
        $amount=0;
        $user=User::where('type','user')->get()->count();
        $product=Product::all()->count();
        $order=Order::all()->count();
        $delivered=Order::where('status','delivered')->get()->count();
        $orderss=Order::where('payment_status','paid')->get();
        foreach($orderss as $orders){
          $amount+=$orders->product->price;
        }
        return view('admin.index',compact('user','product','order','delivered','amount'));
    }
    public function home(){

        $count=0;

        if(Auth::id()){
        $user=Auth::user();
        $userid=$user->id;
        $counts=Cart::where('user_id',$userid)->count();
        }else{
          $counts='';
        }
        $products = Product::all();
        return view('home.index',compact('products','count','counts'));
    }
    public function product_details($id){
        $product = Product::find($id);
        if(Auth::id()){
            $user=Auth::user();
            $userid=$user->id;
            $counts=Cart::where('user_id',$userid)->count();
            }else{
              $counts='';
            }

        return view('home.create',compact('product','counts'));
    }

    public function add_cart($id){

      $user = Auth::user();
      $user_id=$user->id;
      $product_id=$id;
      $cart=new Cart;
      $cart->user_id=$user_id;
      $cart->product_id=$product_id;
      $cart->save();
      toastr()->closeButton()->timeOut(5000)->addSuccess('Product Added to Cart Successfully');
      return redirect()->back();
    }

    public function MyCart(){
        if(Auth::id()){
         $user=Auth::user();
         $user_id=$user->id;
         $counts=Cart::where('user_id',$user_id)->count();
         $carts=Cart::where('user_id',$user_id)->get();


        }
        return view('home.mycart',compact('counts','carts'));
    }

    public function stripe($amount)
    {
        return view('home.stripe',compact('amount'));
    }

    public function stripePost(Request $request,$amount)
    {
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
            $order->payment_status="paid";
            $order->save();
    }
           $cart_removes=Cart::where('user_id',$userid)->get();
           foreach($cart_removes as $cart_remove){
           $data=Cart::find($cart_remove->id);
           $data->delete();
        }
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from complete"
        ]);

        toastr()->closeButton()->timeOut(5000)->addSuccess('Payment successful!');


        return redirect('/');
    }

}
