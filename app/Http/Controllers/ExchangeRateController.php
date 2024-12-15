<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExchangeRate;

class ExchangeRateController extends Controller
{
    public function index(){
        $data['exchange_rate'] = ExchangeRate::where('is_current',1)->first();
        return view('exchange_rate.index', $data);
    }
    public function add(Request $r){
        ExchangeRate::where('is_current',1)->update(['is_current' => 0]);

        $exchange_rate = new ExchangeRate();
        $exchange_rate->khr = $r->khr;
        $exchange_rate->is_current = 1;
        $exchange_rate->save();

        return redirect()->route('exchange_rate.index')->with('success', 'Exchange rate added successfully');
    }
}
