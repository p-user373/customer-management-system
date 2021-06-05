<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Operater;

class Customer extends Model
{
    protected $fillable=["user_name","name_number","email","email_number","password","password_number",
    "gender","gender_number","image","image_number","address","address_number","hobby","hobby_number",
    "other","other_number","correspond","correspond_mail_number","correspond_public_number",
    "information","information_public_number","information_mail_number"];

    

    
    
    public function operaters(){
        return $this->hasMany(Operater::class);
    }
}
