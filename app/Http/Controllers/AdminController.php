<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;

use App\Models\Foodchef;
// use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function users(){
            $data=user::all();
        return view("admin.users",compact("data"));
    }
    public function deleteusers($id){
        $data=user::find($id);
        $data->delete();
        return redirect()->back();

    }
    public function uploadfood(Request $request){
        $data = new food;
        $image =$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('foodimage',$imagename);
        $data->image =$imagename;

        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->save();
        return redirect()->back();

    }
    public function foodmenu(){
        $data =food::all();
        return view("admin.foodmenu",compact("data"));
    }
    public function deletemenu($id){
        $data =food::find($id);
        $data->delete();
        return redirect()->back();

    }
    public function deletechef($id){
        $data =Foodchef::find($id);
        $data->delete();
        return redirect()->back();

    }
    public function updatefood($id){
        $data=food::find($id);
        return view("admin.updatefood",compact("data"));
    }
    public function update($id,Request $request){
            $data=food::find($id);
            $image =$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('foodimage',$imagename);
            $data->image =$imagename;
    
            $data->title=$request->title;
            $data->description=$request->description;
            $data->price=$request->price;
            $data->save();
            return redirect()->back();
            
    }   
    public function updatechef($id){
            $data=foodchef::find($id);
            // return redirect()->back();
            return view("admin.updatechef",compact("data"));
            
    }   
    public function reservation(Request $request){
 
        $data = new reservation;
    

        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->guest=$request->guest;
        $data->date=$request->date;
        $data->time=$request->time;
        $data->message=$request->message;
        $data->save();
        return redirect()->back();


    }
    public function viewreservation(){
        // echo "done";
        // die();
        if(Auth::id()){

         $data =reservation::all();
        // return view("admin.adminreservation",compact("data"));
        return view("admin.adminreservation",compact("data"));
        // return redirect()->back();
    }else{
        return redirect('login');
    }


    }
    public function viewchef(){
        // echo "done";
        // die();
        //  $data =reservation::all();
        $data =Foodchef::all();
        // return view("admin.adminreservation",compact("data"));
        return view("admin.adminchef",compact("data"));
        // return redirect()->back();

    }
    public function uploadchef(Request $request){
        $data = new foodchef();
        $image=$request->image;
     
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('chefimage',$imagename);
        $data->image=$imagename;
        $data->name=$request->name;
        $data->speciality=$request->speciality;

        $data->save();
        return redirect()->back();

    }
    public function updatefoodchef(Request $request , $id){
        
        $data =foodchef::find($id);
        
        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('chefimage',$imagename);
            $data->image=$imagename;

        }
        $data->name=$request->name;
        $data->speciality=$request->speciality;
        $data->save();
        return redirect()->back();
    }
    public function orders(){
         $data=order::all();
        return view("admin.orders",compact("data"));

    }
    public function search(Request $request){
        $search=$request->search;
        $data=order::where("name","Like",'%'.$search.'%')->orWhere("foodname","Like",'%'.$search.'%')
        ->get();
        return view("admin.orders",compact("data"));


    }


}
