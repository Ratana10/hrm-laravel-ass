<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerComment;

class Customer extends Model
{
    public function comments(){
        return $this->hasMany(CustomerComment::class);
    }
}
