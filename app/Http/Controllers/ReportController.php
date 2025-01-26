<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function payment(Request $request)
    {
       
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');

      $payments = Payment::with(['invoice.openRoom.customer', 'paymentMethod'])
      ->when($start_date && $end_date, function ($query) use ($start_date, $end_date) {
        $query->whereBetween('date', [$start_date, $end_date]);
    })
      ->get();

      // dd($payments);

        return view('reports.payment', compact('payments', 'start_date', 'end_date'));
    }

    public function outstanding()
    {
        return view('reports.outstanding');
    }


}