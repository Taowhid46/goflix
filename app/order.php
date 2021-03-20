<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Customer;

class order extends Model
{	
	use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id');
    }
}
