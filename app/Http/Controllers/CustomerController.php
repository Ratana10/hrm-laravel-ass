<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Validator;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::paginate(10);
        return view('customers.index', compact('customers'));
    }
    public function add(){
        return view('customers.create');
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'id_card' => 'required',
            'age' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('customer/add')->with('error', json_encode($validator->errors()));
        }
        $customer = new Customer;
        $customer->id_card = $request->first_name;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->nick_name = $request->nick_name;
        $customer->age = $request->age;
        $customer->phone = $request->phone;
        if($request->hasFile('photo')){
            $customer->photo = $request->file('photo')->store('customer','custom');
        }
        $customer->save();
        return redirect('customer/list')->with('success', 'Customer added successfully.');
    }
    public function edit($id){
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'id_card' => 'required',
            'age' => 'required',
            'phone' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('customer/add')
                        ->withErrors($validator)
                        ->withInput();
        }
        $customer = Customer::find($id);
        $customer->id_card = $request->first_name;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->nick_name = $request->nick_name;
        $customer->age = $request->age;
        $customer->phone = $request->phone;
        if($request->hasFile('photo')){
            if($customer->photo){
                unlink(public_path($customer->photo));
            }
            $customer->photo = $request->file('photo')->store('customer','custom');
        }
        $customer->save();
        return redirect('customer/list')->with('success', 'Customer update successfully.');
    }    
    public function delete($id){
        $customer = Customer::find($id);
        if($customer->photo){
            unlink(public_path($customer->photo));
        }
        $customer->delete();
        return redirect('customer/list')->with('success', 'Customer delete successfully.');
    }
}
