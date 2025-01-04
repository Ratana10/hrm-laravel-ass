<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function openRoom()
    {
        return $this->belongsTo('App\Models\Openroom', 'open_room_id', 'id');
    }
    public function exchangeRate()
    {
        return $this->belongsTo('App\Models\ExchangeRate', 'exchange_rate_id', 'id');
    }
}
