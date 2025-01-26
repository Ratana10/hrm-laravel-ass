<?php

namespace App\Http\Controllers;

use App\Exports\PaymentExport;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\Payment;
use App\Models\ExchangeRate;
use App\Models\Invoice;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PaymentController extends Controller
{
    public function index($invoiceId){
        $invoice = Invoice::with('openRoom.customer')->findOrFail($invoiceId);
        $payments = Payment::where('invoice_id', $invoiceId)->get();
        return view('payments.index',  compact('invoice', 'payments'));
    }
    public function add(Request $r, $invoice_id){
        $payment_methods = PaymentMethod::all();
        $exchange_rate = ExchangeRate::where('is_current',1)->first();
        return view('payments.create', compact('payment_methods', 'invoice_id','exchange_rate'));
    }
    public function store(Request $request, $invoice_id){
        $payment = new Payment;
        $payment->invoice_id = $invoice_id;
        $payment->date = $request->get('date');
        $payment->payment_method_id = $request->get('payment_method_id');
        $payment->amount = $request->get('amount');
        $payment->exchange_rate_id = $request->get('exchange_rate_id');
        $payment->save();
        return redirect()->route('invoice.index', $invoice_id)->with('success', 'Payment added successfully.');
    }

    public function exportPdf(){
        $payments = Payment::all();

        $pdf = PDF::loadView('payments.pdf', compact('payments'))->setPaper('a4', 'portrait');;

        return $pdf->stream('Payment_Report.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new PaymentExport, 'Payment_Report.xlsx');
    }
}
