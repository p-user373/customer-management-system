<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use Auth;

class CustomerUpdateController extends Controller
{
    public function customer_update(){
        
        $customer_email=Auth::user()->email;
        
        $customer_data=Customer::where("email",$customer_email)->first();
        
        $hobby=$customer_data->hobby;
        $other=$customer_data->other;
        
        return view("customer_update",compact("hobby","other"));
    }
}
