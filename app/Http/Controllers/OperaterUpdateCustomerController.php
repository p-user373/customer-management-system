<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use Mail;

class OperaterUpdateCustomerController extends Controller
{
    public function operater_update_customer(Request $request){

        $customer_id=$request->customer_id;
        $request->session()->put("customer_id",$customer_id);
        
        
        $customer_data=Customer::where("id",$customer_id)->first();

        $customer_name=$customer_data->user_name;
        $name_number=$customer_data->name_number;
        $email=$customer_data->email;
        $email_number=$customer_data->email_number;
        $password=$customer_data->password;
        $password_number=$customer_data->password_number;
        $gender=$customer_data->gender;
        $gender_number=$customer_data->gender_number;
        $image=$customer_data->image;
        $request->session()->put("image",$image);

        $image_number=$customer_data->image_number;
        $address=$customer_data->address;
        $address_number=$customer_data->address_number;
        $hobby=$customer_data->hobby;
        $hobby_number=$customer_data->hobby_number;
        $other=$customer_data->other;
        $other_number=$customer_data->other_number;
        
        
        $correspond=$customer_data->correspond;
        $correspond_mail_number=$customer_data->correspond_mail_number;
        $correspond_public_number=$customer_data->correspond_public_number;
        $information=$customer_data->information;
        $information_public_number=$customer_data->information_public_number;
        $information_mail_number=$customer_data->information_mail_number;
        

        $request->session()->put("customer_name",$customer_name);
        $request->session()->put("email",$email);

        
        return view("operater_update_customer",
            compact("customer_name","name_number","email","email_number","password","password_number",
            "gender","gender_number","image","image_number","address","address_number","hobby","hobby_number",
            "other","other_number","correspond","correspond_mail_number","correspond_public_number",
            "information","information_public_number","information_mail_number"));

    }

    public function operater_update_customer2(Request $request){

        $request->validate([

            "customer_name"=>"required",
            
            "password"=>"required"
        ]);
        
        
        $customer_id=session("customer_id");
        $email=session("email");


        $customer_name=$request->customer_name;
        $name_number=$request->name_number;
        
        $email_number=$request->email_number;
        $password=$request->password;
        $password_number=$request->password_number;
        $gender=$request->gender;
        $gender_number=$request->gender_number;
        if($image=$request->file("image")){

            $path=$image->store("uploads","public");

        }elseif($image_session=session("image")){

            $path=$image_session;

        }else{
            $path=NULL;
        }

        $image_number=$request->image_number;
        $address=$request->address;
        $address_number=$request->address_number;
        $hobby=$request->hobby;
        $hobby_number=$request->hobby_number;
        $other=$request->other;
        $other_number=$request->other_number;


        $correspond=$request->correspond;
        $correspond_mail_number=$request->correspond_mail_number;
        $correspond_public_number=$request->correspond_public_number;
        $information=$request->information;
        $information_public_number=$request->information_public_number;
        $information_mail_number=$request->information_mail_number;



        $post_customer=Customer::where("id",$customer_id)->first();
        $post_correspond=$post_customer->correspond;
        $post_information=$post_customer->information;


        $customer=Customer::where("id",$customer_id)
        ->update([     
                "user_name"=>$customer_name,
                "name_number"=>$name_number,
                
                "email_number"=>$email_number,
                "password"=>$password,
                "password_number"=>$password_number,
                "gender"=>$gender,
                "gender_number"=>$gender_number,
                "image"=>$path,
                "image_number"=>$image_number,
                "address"=>$address,
                "address_number"=>$address_number,
                "hobby"=>$hobby,
                "hobby_number"=>$hobby_number,
                "other"=>$other,
                "other_number"=>$other_number,
                
                "correspond"=>$correspond,
                "correspond_public_number"=>$correspond_public_number,
                "correspond_mail_number"=>$correspond_mail_number,

                "information"=>$information,
                "information_public_number"=>$information_public_number,
                "information_mail_number"=>$information_mail_number
        ]);

        
        if($correspond_mail_number==1&&$correspond!==$post_correspond){
            Mail::send("correspond",["correspond"=>$correspond],function($message) use($email){
                $message->to($email)
                        ->from("s2061409@g.tohoku-gakuin.ac.jp")
                        ->subject("対応履歴");
            });
        }

        if($information_mail_number==1&&$information!==$post_information){
            Mail::send("information",["information"=>$information],function($message) use($email){
                $message->to($email)
                        ->from("s2061409@g.tohoku-gakuin.ac.jp")
                        ->subject("お知らせ");
            });
        }

        return redirect("operater_index");
    }







}