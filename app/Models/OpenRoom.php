<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Room;
use App\Models\Customer;
use App\Models\Invoice;

class OpenRoom extends Model
{
    public function room(){
        return $this->belongsTo(Room::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function lastInvoice(){
        return $this->hasOne(Invoice::class,'open_room_id','id')->latest();
    }
}
