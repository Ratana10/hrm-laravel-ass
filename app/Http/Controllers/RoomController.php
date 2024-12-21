<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomType;
use Validator;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::paginate(10);
        return view('rooms.index', compact('rooms'));
    }

    public function add(){
        $room_types = RoomType::all();
        return view('rooms.create', compact('room_types'));
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'room_type_id' => 'required',
            'price' => 'required|numeric|min:1'
        ]);
        if($validate->fails()){
            return redirect()->route('room.add')->with('error', 'Name and Room Type is required');
        }
        $room = new Room();
        $room->price = $request->price;
        $room->code = $request->code;
        $room->size = $request->size;
        $room->note = $request->note;
        $room->room_type_id = $request->room_type_id;
        $room->save();
        return redirect()->route('room.index')->with('success', 'Room create successfully');
    }

    public function edit($id){
        $room = Room::find($id);
        $room_types = RoomType::all();
        return view('rooms.edit', compact('room', 'room_types'));
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'room_type_id' => 'required',
            'price' => 'required|numeric|min:1'
        ]);
        if($validate->fails()){
            return redirect()->route('room.edit', $id)->with('error', 'Name and Room Type is required');
        }
        $room = Room::find($id);
        $room->price = $request->price;
        $room->code = $request->code;
        $room->size = $request->size;
        $room->note = $request->note;
        $room->room_type_id = $request->room_type_id;
        $room->save();
        return redirect()->route('room.index')->with('success', 'Room update successfully');
    }

    public function delete($id){
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('room.index')->with('success', 'Room deleted successfully');
    }
}
