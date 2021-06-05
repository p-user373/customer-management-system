<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Message;
use App\Operater;
use Auth;

class CustomerMessageController extends Controller
{
    public function customer_message(Request $request){
        
        //
        $customer_user_id=Auth::id();
        $customer_email=Auth::user()->email;

        $pre_operater_user_id=Customer::join("operaters","operaters.customer_id","=","customers.id")
                       ->where("email",$customer_email)
                       ->first();
        $operater_user_id=$pre_operater_user_id->user_id;               
                       
        $message=$request->message;
        
        if($message){

            $message_table=new Message();
            $message_table->f_id=$customer_user_id;
            $message_table->to_id=$operater_user_id;
            $message_table->message=$message;
            $message_table->save();
        }

        //一覧表示用
        $message_list=Message::join("users","users.id","=","messages.f_id")
                      ->where("f_id",$customer_user_id)->orWhere("to_id",$customer_user_id)->get();
        $message_list_to_id=Message::join("users","users.id","=","messages.to_id")
                           ->where("f_id",$customer_user_id)->orWhere("to_id",$customer_user_id)->get();
        
        return view("customer_message",compact("message_list","message_list_to_id"));
    }    
}
