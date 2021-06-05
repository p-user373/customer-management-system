<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\User;
use App\Operater;
use App\Message;
use App\Customer;
use Auth;

class OperaterMessageController extends Controller
{
    public function operater_message(Request $request){
        
        //id取得
        $customer_id=$request->customer_id;
        $pre_customer_email=Customer::where("id",$customer_id)->first();
        $customer_email=$pre_customer_email->email;
        $pre_customer_user_id=User::where("email",$customer_email)->first();
        $customer_user_id=$pre_customer_user_id->id;
        $operater_user_id=Auth::id();
        


        //メッセージ取得
        if($message=$request->message){

            $message_table=new Message();
            $message_table->f_id=$operater_user_id;
            $message_table->to_id=$customer_user_id;
            $message_table->message=$message;
            $message_table->save();
        }

        //一覧表示用
        $message_list=Message::join("users","users.id","=","messages.f_id")
                      ->where("f_id",$customer_user_id)->orWhere("to_id",$customer_user_id)->get();
        $message_list_to_id=Message::join("users","users.id","=","messages.to_id")
                           ->where("f_id",$customer_user_id)->orWhere("to_id",$customer_user_id)->get();
        
        return view("operater_message",compact("message_list","message_list_to_id","customer_id"));
    }
}
