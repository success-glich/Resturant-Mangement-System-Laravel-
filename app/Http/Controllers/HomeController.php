<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\User;
use App\Models\Foodchef;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    //
    public function index(){

        if(Auth::id()){
            return redirect('redirects');

        }
        $data = food::all();
        $data2=Foodchef::all();
       
        


        return view("home",compact("data","data2","count"));
    }
    public function redirects(){
        // $usertype=Auth::users()->usertype;
        // if($usertype=='1'){
        //     return view('admin.adminhome');
        // }else{
        //     return view("home");
        // }
        // return view("home");//

        $data=food::all();
        $data2=Foodchef::all();

        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            return view('admin.adminhome');
        }else{
            $uesr_id=Auth::id();
            $count=cart::where("user_id",$uesr_id)->count();



            return view('home',compact('data','data2','count'));

        }
        
    }
    public function addcart(Request $request,$id){

        if(Auth::id()){
            $uesr_id=Auth::id();
            // dd($uesr_id);
            $foodid=$id;
            $quantity=$request->quantity;
            $cart=new Cart;
            $cart->user_id=$uesr_id;
            $cart->food_id=$foodid;
            $cart->quantity=$quantity;
            $cart->save();


            return redirect()->back();

        }else{
            return redirect('/login');
        }

    }
    public function showcart($id){
        $count=cart::where('user_id',$id)->count();
            if(Auth::id()==$id){

        $data2=cart::select('*')->where('user_id','=',$id)->get();
        $data=cart::where('user_id',$id)->join("food",'carts.food_id','=','food.id')->get();

        return view("showcart",compact('count','data','data2'));
    }else{
        return redirect()->back();
    }

    }
    public function remove($id){
        $data=cart::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function orderconfirm(Request $request){
        foreach($request->foodname as $key =>$foodname){
                $data=new order;
                $data->foodname=$foodname;
                $data->price=$request->price[$key];
                $data->quantity=$request->quantity[$key];
                $data->name=$request->name;
                $data->phone=$request->phone;
                $data->address=$request->address;
                $data->save();
        }
        return redirect()->back();

    }
}
