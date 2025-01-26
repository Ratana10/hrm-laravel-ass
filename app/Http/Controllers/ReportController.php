<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function payment()
    {
      $payments = Payment::with(['invoice.openRoom.customer', 'paymentMethod'])->get();

      // dd($payments);

        return view('reports.payment', compact('payments'));
    }

    public function outstanding()
    {
        return view('reports.outstanding');
    }
}