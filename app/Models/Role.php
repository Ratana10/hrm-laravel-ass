<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

     // Define the one-to-one relationship with User
     public function user()
     {
         return $this->hasOne(User::class);
     }
}
