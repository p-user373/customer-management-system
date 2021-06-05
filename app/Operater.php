<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Customer;

class Operater extends Model
{
    
    protected $fillable=["user_id","customer_id"];

    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
