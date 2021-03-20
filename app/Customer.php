<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\verifyCustomer;
// use App\wishlist;

class Customer extends Model
{

    protected $fillable = [
        'name', 'email','address', 'number', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function verifyCustomer()
    {
        return $this->hasOne('App\verifyCustomer');
    }

    // public function wishlist()
    // {
    //     return $this->hasOne('App\wishlist');
    // }

}
