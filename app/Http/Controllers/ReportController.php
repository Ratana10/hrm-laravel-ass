<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
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
      $invoices = Invoice::with(['openRoom.room', 'openRoom.customer', 'totalPayment'])
      ->get()
      ->filter(function ($invoice) {
          // Calculate outstanding balance
          $totalPayments = $invoice->totalPayment->sum('amount');
          return $invoice->total_amount - $totalPayments > 0;
      })
      ->map(function ($invoice) {
          return [
              'room_code' => $invoice->openRoom->room->code,
              'customer_name' => $invoice->openRoom->customer->first_name . ' ' . $invoice->openRoom->customer->last_name,
              'phone' => $invoice->openRoom->customer->phone,
              'outstanding_balance' => $invoice->total_amount - $invoice->totalPayment->sum('amount'),
          ];
      });
      
      return view('reports.outstanding', compact('invoices'));
    }


}