<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use Auth;

class MyPageController extends Controller
{
    public function my_page(Request $request){
        
        
            
        $hobby=$request->hobby;
        $other=$request->other;
            
        //取得
        
        $customer_email=Auth::user()->email;

        $customer_data=Customer::where("email",$customer_email)->first();
        
        if($hobby||$other){
            $customer_data->hobby=$hobby;
            $customer_data->other=$other;
            $customer_data->save();
            $customer_data=Customer::where("email",$customer_email)->first();
        }
        
        return view("my_page",compact("customer_data"));
    }
}
