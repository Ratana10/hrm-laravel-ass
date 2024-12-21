<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomType;
use Validator;

class RoomTypeController extends Controller
{
    public function index(){
        $room_types = RoomType::paginate(1);
        return view('room_types.index', compact('room_types'));
    }
    public function add(){
        return view('room_types.create');
    }
    public function store(Request $request){
        // if($request->name == null){
        //     return redirect()->route('room_type.index')->with('error', 'Name is required');
        // }

        $validate = Validator::make($request->all(), [
            'name' => 'required'
        ]);

        if($validate->fails()){
            return redirect()->route('room_type.index')->with('error', 'Name is required');
        }

        $room_type = new RoomType();
        $room_type->name = $request->name;
        $room_type->note = $request->note;
        $room_type->save();
        return redirect()->route('room_type.index')->with('success', 'Room Type create successfully');
    }
    public function edit($id){
        $room_type = RoomType::find($id);
        return view('room_types.edit', compact('room_type'));
    }
    public function update(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if($validate->fails()){
            return redirect()->route('room_type.index')->with('error', 'Name is required');
        }
        $room_type = RoomType::find($id);
        $room_type->name = $request->name;
        $room_type->note = $request->note;
        $room_type->save();
        return redirect()->route('room_type.index')->with('success', 'Room Type update successfully');
    }
    public function delete($id){
        $room_type = RoomType::find($id);
        $room_type->delete();
        return redirect()->route('room_type.index')->with('success', 'Room Type deleted successfully');
    }
}
