<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'department',
        'position',
        'salary',
        'work_date', 
        'status',
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
