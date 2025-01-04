<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\OpenRoom;
use App\Models\ExchangeRate;
use Validator;

class InvoiceController extends Controller
{
    public function index(Request $r)
    {
        $invoices = Invoice::paginate(30);
        $customers = Customer::all();
        $customer_id = $r->get('customer_id');
        return view('invoices.index', compact('invoices', 'customers','customer_id'));
    }
    public function add()
    {
        $openRooms = OpenRoom::all();
        $exchangeRate = ExchangeRate::where('is_current',1)->first();
        return view('invoices.add', compact('openRooms', 'exchangeRate'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'open_room_id' => 'required',
            'exchange_rate_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('invoice.add')
                ->withErrors($validator)
                ->withInput();
        }
        $invoice = new Invoice([
            'open_room_id' => $request->get('open_room_id'),
            'exchange_rate_id' => $request->get('exchange_rate_id'),
        ]);
        $invoice->save();
        return redirect()->route('invoice.index')
            ->with('success', 'Invoice created successfully.');
    }
    public function edit($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);
        $openRooms = OpenRoom::all();
        $exchangeRates = ExchangeRate::all();
        return view('invoices.edit', compact('invoice', 'openRooms', 'exchangeRates'));
    }
    public function update(Request $request, $invoiceId)
    {
        $validator = Validator::make($request->all(), [
            'open_room_id' => 'required',
            'exchange_rate_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('invoice.edit', $invoiceId)
                ->withErrors($validator)
                ->withInput();
        }
        $invoice = Invoice::find($invoiceId);
        $invoice->open_room_id = $request->get('open_room_id');
        $invoice->exchange_rate_id = $request->get('exchange_rate_id');
        $invoice->save();
        return redirect()->route('invoice.index')
            ->with('success', 'Invoice updated successfully.');
    }
    public function delete($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);
        $invoice->delete();
        return redirect()->route('invoice.index')
            ->with('success', 'Invoice deleted successfully.');
    }   
}
