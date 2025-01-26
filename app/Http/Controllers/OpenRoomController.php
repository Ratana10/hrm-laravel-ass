<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;
use Validator;
use App\Models\OpenRoom;
use App\Models\Customer;
use App\Models\Invoice;
use App\Models\OpenRoomMember;

class OpenRoomController extends Controller
{
    public function list(Request $request){
        $rooms = Room::orderBy('code', 'asc')->get();
        $type = $request->type;
        return view('open_rooms.open', compact('rooms','type'));
    }
    public function add(Request $request, $room_id)
    {
        $room = Room::find($room_id);
        $customers = Customer::all();
        return view('open_rooms.add', compact('room', 'customers'));
    }
    public function store(Request $request, $room_id)
    {
        $openRoom = new OpenRoom();
        $openRoom->customer_id = $request->customer_id;
        $openRoom->room_id = $room_id;
        $openRoom->room_price = $request->room_price;
        $openRoom->booking_amount = $request->booking_amount;
        $openRoom->start_date = date('Y-m-d', strtotime($request->start_date));
        $openRoom->end_date = date('Y-m-d', strtotime($request->end_date));
        $openRoom->note = $request->note;
        $openRoom->condition_invoice = $request->condition_invoice;
        $openRoom->alert = $request->alert;
        $openRoom->water_meter = $request->water_meter;
        $openRoom->electric_meter = $request->electric_meter;
        $openRoom->water_price_per_meter = $request->water_meter_price;
        $openRoom->electric_price_per_meter = $request->electric_meter_price;
        $openRoom->save();
        return redirect()->route('open_room.list_room')->with('success', 'Create successfully');
    }
    public function edit($id)
    {
        $openRoom = OpenRoom::find($id);
        $customers = Customer::all();
        return view('open_rooms.edit', compact('openRoom','customers'));
    }
    public function update(Request $request, $id)
    {
        $openRoom = OpenRoom::find($id);
        $openRoom->customer_id = $request->customer_id;
        $openRoom->room_price = $request->room_price;
        $openRoom->booking_amount = $request->booking_amount;
        $openRoom->start_date = date('Y-m-d', strtotime($request->start_date));
        $openRoom->end_date = date('Y-m-d', strtotime($request->end_date));
        $openRoom->note = $request->note;
        $openRoom->condition_invoice = $request->condition_invoice;
        $openRoom->alert = $request->alert;
        $openRoom->water_meter = $request->water_meter;
        $openRoom->electric_meter = $request->electric_meter;
        $openRoom->water_price_per_meter = $request->water_meter_price;
        $openRoom->electric_price_per_meter = $request->electric_meter_price;
        $openRoom->is_stop = $request->is_stop;
        $openRoom->save();
        return redirect()->route('open_room.list_room')->with('success', 'Update successfully');
    }
    public function delete($id)
    {
        $openRoom = OpenRoom::find($id)->delete();
        return redirect()->route('open_room.list_room')->with('success', 'Delete successfully');
    }

    public function invoices($openRoomId)
    {
        $invoices = Invoice::with(['openRoom.customer', 'exchangeRate'])
        ->where('open_room_id', $openRoomId)
        ->get();

    return view('open_rooms.invoices', compact('invoices', 'openRoomId'));
    }
}
