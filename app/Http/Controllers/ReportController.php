<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Invoice;

class ReportController extends Controller
{
    public function payment(){
        $payments = Payment::all();
        return view('reports.payment', compact('payments'));
    }
    public function outstanding(){
        $invoices = Invoice::all();
        return view('reports.outstanding', compact('invoices'));
    }
}
