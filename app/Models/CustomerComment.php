<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class CustomerComment extends Model
{
    protected $table = 'comments';
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
