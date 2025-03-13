<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Employee;
use Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::with("role")->paginate(10);
        return view('user.index', compact('users'));
    }
    public function add(){
        $roles = Role::all();
        $employees = Employee::all();
        return view('user.create', compact('roles', 'employees'));
    }
    public function store(Request $r){
        $user = new User();
        $user->name = $r->name;
        $user->email = $r->email;
        $user->password = Hash::make($r->password);
        $user->photo = $r->hasFile('photo') ? $r->file('photo')->store('user','custom') : null;
        $user->phone = $r->phone;
        $user->role_id = $r->role_id;
        $user->employee_id = $r->employee_id;

        $user->save();
        return redirect()->route('user.index')->with('success', 'User create successfully');
    }
    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();
        $employees = Employee::all();
        return view('user.edit', compact('user', 'roles', 'employees'));
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
