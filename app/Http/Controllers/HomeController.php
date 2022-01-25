<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\order;

class HomeController extends Controller
{

    public function index() {
        $user_id = Auth::id();
        $count = cart::where('user_id',$user_id)->count();
        $foods = Food::all();
        $chefs = Chef::all();
        return view('/home',compact('foods','chefs','count'));
    }

    public function redirect() {
        $foods = Food::all();
        $chefs = Chef::all();
        $usertype = Auth::user()->usertype;
        if ($usertype == 1) {
            return view('admin.adminhome');
        }else {
            $user_id = Auth::id();

            $count = cart::where('user_id',$user_id)->count();

            return view('/home',compact('foods','chefs','count'));
        }
    }

    public function addcart(Request $request, $id){
        if(Auth::id())
        {
            $user_id = Auth::id();
            $food_id = $id;
            $quantaty = $request->quantaty;

            $cart = new Cart ;
            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantaty = $quantaty;
            $cart->save();

            return redirect()->back();
        
        } else 
        {
            return redirect('/login');
        }
    }

    public function viewcart(Request $request, $id) {

        $count = cart::where('user_id', $id)->count();

        if (Auth::id()==$id) {
        
        $carts = cart::where('user_id', $id)->join('food','carts.food_id', '=' , 'food.id')->get();
        $carts2 = cart::select('*')->where('user_id','=', $id)->get();
        return view('viewcart', compact('count','carts','carts2'));
        } else {

            return redirect()->back();
        }

    }
    
    public function removecart($id){

        $carts = cart::find($id);
        $carts->delete();
        return redirect()->back();

    }
    
    public function orderconfirm(Request $request){
        foreach($request->foodname as $key =>$foodname) {

            $orders = new order;

            $orders->foodname = $foodname;

            $orders->price = $request->price[$key];

            $orders->quantaty = $request->quantaty[$key];

            $orders->name = $request->name;

            $orders->phone = $request->phone;

            $orders->address = $request->address;

            $orders->save();

        }
        
        return redirect()->back();
    }

}
