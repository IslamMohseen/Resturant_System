<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Chef;
use App\Models\order;

class AdminController extends Controller
{
    public function users() {

        $users = User::all();
        return view('admin.users',compact('users'));
    }

    public function deleteuser($id) {
        $users = User::find($id);
        $users->delete();
        return redirect()->back();
    }

    public function foodmenu() {
        $foods = Food::all();
        return view('admin.foodmenu',compact('foods'));
    }

    public function upload(Request $request) {
        $food = new Food;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        
        $request->image->move('foodimage',$imagename);
        $food->image       = $imagename;
        $food->title        = $request->name;
        $food->price       = $request->price;
        $food->description = $request->description;
        $food->save();    
        return redirect()->back();
    }


    public function editfood($id) {
        $foods = Food::find($id);
        return view('admin.editfood',compact('foods'));
    }

    public function updatefood(Request $request, $id) {
        $foods = Food::find($id);
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        
        $request->image->move('foodimage',$imagename);
        $foods->image       = $imagename;
        $foods->title        = $request->name;
        $foods->price       = $request->price;
        $foods->description = $request->description;
        $foods->save();
        
        return redirect()->back();
    }

    public function deletefood($id) {

        $foods = Food::find($id);
        $foods->delete();
        return redirect()->back();
    }

    public function reservation(Request $request) {
        $reservation = new Reservation;
        $reservation->name        = $request->name;
        $reservation->email       = $request->email;
        $reservation->phone       = $request->phone;
        $reservation->guest       = $request->guest;
        $reservation->date        = $request->date;
        $reservation->time       = $request->time;
        $reservation->message    = $request->message;
        $reservation->save();
        
        return redirect()->back();
    }

    public function viewreservation() {

        if(Auth::id()) {

        $reservations = Reservation::all();
        return view('admin.reservation',compact('reservations'));

    } else {

        return view('/login');
    }
    }

    public function viewchef() {
        $chefs = Chef::all();
        return view('admin.chef',compact('chefs'));
    }

    public function uploadchef(Request $request) {
        $chef = new Chef;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        
        $request->image->move('chefimage',$imagename);
        $chef->image       = $imagename;
        $chef->name        = $request->name;
        $chef->speciality       = $request->speciality;
        $chef->save();
        
        return redirect()->back();
    }

    public function editchef($id) {
        $chefs = Chef::find($id);
        return view('admin.editchef',compact('chefs'));
    }

    public function deletechef($id) {

        $chefs = Chef::find($id);
        $chefs->delete();
        return redirect()->back();
    }

    public function updateched(Request $request, $id) {
        $chefs = Chef::find($id);
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        
        $request->image->move('chefimage',$imagename);
        $chefs->image       = $imagename;
        $chefs->name        = $request->name;
        $chefs->speciality  = $request->speciality;
        $chefs->save();
        
        return redirect()->back();
    }

    public function orders(){

        $orders = order::all();

        return view('admin.orders',compact('orders'));

    }

    public function search(Request $request) {

        $search = $request->search;


        $orders = order::where('name','like','%'.$search.'%')->orWhere('foodname','like','%'.$search.'%')->get();

        return view('admin.orders',compact('orders'));

    }
}
