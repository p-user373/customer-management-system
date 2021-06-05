<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterCustomerController extends Controller
{
    public function register_customer(){

        return view("register_customer");
    
    }
}
