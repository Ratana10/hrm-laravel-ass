<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index($invoice_id)
    {
        $payments = Payment::where('invoice_id', $invoice_id)->paginate(50);
        return view('payments.index', compact('payments'));
    }
}
