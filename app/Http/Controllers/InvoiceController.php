<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Customer;
use App\Models\OpenRoom;
use App\Models\ExchangeRate;
use Illuminate\Support\Facades\Log;
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

        $invoice = new Invoice();
        $invoice->exchange_rate_id = $request->exchange_rate_id;
        $invoice->open_room_id = $request->open_room_id;
        $invoice->date = $request->date;
        $invoice->room_price = $request->room_price;
        $invoice->number_e = $request->number_e;
        $invoice->e_amount_per_kilometer = $request->e_amount_per_kilometer;
        $invoice->e_amount = $request->e_amount;
        $invoice->number_w = $request->number_w;
        $invoice->w_amount_per_kilometer = $request->w_amount_per_kilometer;
        $invoice->w_amount = $request->w_amount;
        $invoice->total_amount = $request->total_amount;
        $invoice->save();

        return redirect()->route('invoice.index')
            ->with('success', 'Invoice created successfully.');
    }
    public function edit($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);
        
        $openRooms = OpenRoom::all();

        $exchangeRate = ExchangeRate::findOrFail($invoice->exchange_rate_id);
     
        return view('invoices.edit', compact('invoice', 'openRooms', 'exchangeRate'));
    }
    public function update(Request $request, $invoiceId)
    {
        // $validator = Validator::make($request->all(), [
        //     'open_room_id' => 'required',
        //     'exchange_rate_id' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return redirect()->route('invoice.edit', $invoiceId)
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        // $invoice = Invoice::find($invoiceId);
        // $invoice->open_room_id = $request->get('open_room_id');
        // $invoice->exchange_rate_id = $request->get('exchange_rate_id');
        // $invoice->save();
        // return redirect()->route('invoice.index')
        //     ->with('success', 'Invoice updated successfully.');

        $invoice = Invoice::findOrFail($invoiceId);
        $invoice->open_room_id = $request->open_room_id;
        $invoice->date = $request->date;
        $invoice->room_price = $request->room_price;
        $invoice->number_e = $request->number_e;
        $invoice->e_amount_per_kilometer = $request->e_amount_per_kilometer;
        $invoice->e_amount = $request->e_amount;
        $invoice->number_w = $request->number_w;
        $invoice->w_amount_per_kilometer = $request->w_amount_per_kilometer;
        $invoice->w_amount = $request->w_amount;
        $invoice->total_amount = $request->total_amount;

        // Save the updated data
        $invoice->save();

        return redirect()->route('invoice.index')->with('success', 'Invoice updated successfully!');

    }
    public function delete($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);
        $invoice->delete();
        return redirect()->route('invoice.index')
            ->with('success', 'Invoice deleted successfully.');
    }   

    public function sendTelegramMessage($invoiceId){
        $invoice = Invoice::with(['openRoom.customer', 'exchangeRate'])->findOrFail($invoiceId);

        $openRoom = $invoice->openRoom;
        $customer = $openRoom ? $openRoom->customer : null; // Retrieve the customer
        $room = $openRoom ? $openRoom->room : null; // Retrieve the room
    
        $roomCode = $room ? $room->code : 'N/A';
        $telegramChatId = $customer ? $customer->telegram_chat_id : null;
    
        $previousInvoice = Invoice::where('open_room_id', $invoice->open_room_id)
        ->where('id', '<', $invoice->id)
        ->orderBy('id', 'desc')
        ->first();

        Log::info("openRoom", [$openRoom]);


        if (!$customer->telegram_chat_id) {
            return back()->with('error', 'Customer does not have a Telegram chat ID set.');
        }
    

        $electric_prev_balance = $previousInvoice ? $previousInvoice->number_e : 0;
        $water_prev_balance = $previousInvoice ? $previousInvoice->number_w : 0;
    
        $electric_current_balance = $invoice->number_e;
        $electric_price_per_unit = $invoice->e_amount_per_kilometer;
    
        // Calculate total electric usage
        $total_electric = $electric_current_balance - $electric_prev_balance;
        $total_electric_price = $total_electric * $electric_price_per_unit;
    
        $water_current_balance = $invoice->number_w;
        $water_price_per_unit = $invoice->w_amount_per_kilometer;
    
        // Calculate total water usage
        $total_water = $water_current_balance - $water_prev_balance;
        $total_water_price = $total_water * $water_price_per_unit;
    
        $total_amount = $invoice->total_amount;
        $exchange_rate = $invoice->exchangeRate->khr ?? 1;
        $total_amount_khr = $total_amount * $exchange_rate;


        $message = "*Invoice Date:* {$invoice->date}\n\n";
        $message .= "*Room:*\n";
        $message .= "- Room: {$roomCode}\n";
        $message .= "- Price: $ {$invoice->room_price}\n\n";

        $message .= "*Electric Consumption:*\n";
        $message .= "- Previous Balance: {$electric_prev_balance}\n";
        $message .= "- Current Balance: {$electric_current_balance}\n";
        $message .= "- Total Electric: {$total_electric}\n";
        $message .= "- Price per Unit: `$ {$electric_price_per_unit}\n";
        $message .= "- Total Electric Price: $ {$total_electric_price}\n\n";
    
        $message .= "*Water Consumption:*\n";
        $message .= "- Previous Balance: {$water_prev_balance}\n";
        $message .= "- Current Balance: {$water_current_balance}\n";
        $message .= "- Total Water: {$total_water} m3\n";
        $message .= "- Price per Unit: $ {$water_price_per_unit}\n";
        $message .= "- Total Water Price: $ {$total_water_price}\n\n";
    
        $message .= "*Total Amount (USD):* $ {$total_amount}\n";
        $message .= "*Total Amount (KHR):* ៛ {$total_amount_khr}\n\n";

        // $tenant->telegram_chat_id;

       app(TelegramController::class)->sendMessage($telegramChatId, $message);

        return back()->with('success', 'Message sent to the tenant via Telegram!');
   
    }
}
