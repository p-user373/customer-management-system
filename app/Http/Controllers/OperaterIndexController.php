<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Operater;
use Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Mail;




class OperaterIndexController extends Controller
{
    public function operater_index(Request $request){
        
        $email_redirect=Auth::user()->email;
        
        
        if(Customer::where("email",$email_redirect)->exists()){

            return view("customer_page");
            
        }else{
            

            //バリデーション
           
        
            $customer_name=$request->customer_name;
            $name_number=$request->name_number;
            $email=$request->email;
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

            //自分のidと名前を取得
            $operater_user_id=Auth::id();
            $operater_user_name=Auth::user()->name;




            if($customer_name){
                

                $request->validate([

                    "customer_name"=>"required",
                    "email"=>["required","unique:users"],
                    "password"=>"required"
                ]);
    
                
                
                

                $customer=Customer::updateOrCreate(["email"=>$email],[
                "user_name"=>$customer_name,
                "name_number"=>$name_number,
                "email"=>$email,
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
                
               


                $customer_name_session=session("customer_name");

                $user=User::updateOrCreate(["email"=>$email],[
                    "name"=>$customer_name,
                    "email"=>$email,
                    "password"=>Hash::make($password),
                ]);
                

                $customer_id_row=Customer::where("email",$email)->first();
                $customer_id=$customer_id_row->id;
                $operater=Operater::updateOrCreate(["customer_id"=>$customer_id],[
                    "user_id"=>$operater_user_id,
                    "customer_id"=>$customer_id,
                ]);

                
                if($correspond_mail_number==1){
                    Mail::send("correspond",["correspond"=>$correspond],function($message) use($email){
                        $message->to($email)
                                ->from("s2061409@g.tohoku-gakuin.ac.jp")
                                ->subject("対応履歴");
                    });
                }

                if($information_mail_number==1){
                    Mail::send("information",["information"=>$information],function($message) use($email){
                        $message->to($email)
                                ->from("s2061409@g.tohoku-gakuin.ac.jp")
                                ->subject("お知らせ");
                    });
                }

                
            }    




            //
            
                //検索に関する処理
                $search_customer_name=$request->search_customer_name;
                $search_gender=$request->search_gender;
                if(
                    $search_customer_name||
                    $search_gender
                  ){

                    if($search_gender==0){
                    

                        $customer_datas=Customer::select("customers.id as customer_user_id","user_name","name_number","email","email_number","password","password_number",
                        "gender","gender_number","image","image_number","address","address_number","hobby","hobby_number",
                        "other","other_number","correspond","correspond_mail_number","correspond_public_number",
                        "information","information_public_number","information_mail_number")
                                        ->join("operaters","operaters.customer_id","=","customers.id")
                                        ->where("user_id",$operater_user_id)
                                        ->where("user_name","like","%$search_customer_name%")
                                        ->get();
                    }else{

                        $customer_datas=Customer::select("customers.id as customer_user_id","user_name","name_number","email","email_number","password","password_number",
                        "gender","gender_number","image","image_number","address","address_number","hobby","hobby_number",
                        "other","other_number","correspond","correspond_mail_number","correspond_public_number",
                        "information","information_public_number","information_mail_number")
                                    ->join("operaters","operaters.customer_id","=","customers.id")
                                    ->where("user_id",$operater_user_id)
                                    ->where("user_name","like","%$search_customer_name%")
                                    ->where("gender",$search_gender)
                                    ->get();

                    }                
                }else{

            $customer_datas=Customer::select("customers.id as customer_user_id","user_name","name_number","email","email_number","password","password_number",
            "gender","gender_number","image","image_number","address","address_number","hobby","hobby_number",
            "other","other_number","correspond","correspond_mail_number","correspond_public_number",
            "information","information_public_number","information_mail_number")
                            ->join("operaters","operaters.customer_id","=","customers.id")
                            ->where("user_id",$operater_user_id)->get();
            }


        


            session()->forget(["customer_id","customer_name2","image"]);

            return view("operater_index",compact("operater_user_name","customer_datas","search_customer_name","search_gender"));
        }    
    }
}
