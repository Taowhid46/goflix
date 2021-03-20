<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class VerifyCustomer extends Model
{
    protected $guarded = [];
 
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
}
