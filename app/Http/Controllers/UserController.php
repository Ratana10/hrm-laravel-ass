<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::with("role")->paginate(10);
        return view('user.index', compact('users'));
    }
    public function add(){
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }
    public function store(Request $r){
        $user = new User();
        $user->name = $r->name;
        $user->email = $r->email;
        $user->password = Hash::make($r->password);
        $user->photo = $r->hasFile('photo') ? $r->file('photo')->store('user','custom') : null;
        $user->phone = $r->phone;
        $user->role_id = $r->role_id;
        $user->save();
        return redirect()->route('user.index')->with('success', 'User create successfully');
    }
    public function edit($id){
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    public function update(Request $r, $id){
        $user = User::find($id);
        $user->name = $r->name;
        $user->email = $r->email;
        if($r->password){
            $user->password = Hash::make($r->password);
        }
        if($r->hasFile('photo')){
            if($user->photo){
                unlink(public_path($user->photo));
            }
        }
        $user->photo = $r->hasFile('photo') ? $r->file('photo')->store('user','custom') : null;
        $user->phone = $r->phone;
        $user->save();
        return redirect()->route('user.index')->with('success', 'User update successfully');
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();

        if($user->photo){
            unlink(public_path($user->photo));
        }

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
