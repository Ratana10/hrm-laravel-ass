<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RoomType;

class Room extends Model
{
    public function roomType(){
        return $this->belongsTo(RoomType::class,'room_type_id');
    }
    public function openRoom(){
        return $this->hasOne(OpenRoom::class)->where('end_date','>',date('Y-m-d'))->where('is_stop',0);
    }
}
