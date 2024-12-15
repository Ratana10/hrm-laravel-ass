<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index(){
        $payment_methods = PaymentMethod::paginate(10);
        return view('payment_method.index', compact('payment_methods'));
    }
    public function add(){
        return view('payment_method.create');
    }
    public function edit($id){
        $payment_method = PaymentMethod::find($id);
        return view('payment_method.edit', compact('payment_method'));
    }
    public function store(Request $request){
        if($request->currency != 'KHR' && $request->currency != 'USD'){
            return redirect()->route('payment_method.index')->with('error', 'We can not accept this currency');
        }
        $payment_method = new PaymentMethod();
        $payment_method->name = $request->name;
        $payment_method->is_cash = $request->is_cash;
        $payment_method->currency = $request->currency;
        $payment_method->photo = $request->hasFile('photo') ? $request->file('photo')->store('payment_method','custom') : null;
        $payment_method->save();
        return redirect()->route('payment_method.index')->with('success', 'Payment Method create successfully');
    }
    public function update(Request $request, $id){
        $payment_method = PaymentMethod::find($id);
        $payment_method->name = $request->name;
        $payment_method->is_cash = $request->is_cash;
        if($request->hasFile('photo')){
            if($payment_method->photo){
                unlink(public_path($payment_method->photo));
            }
            $payment_method->photo = $request->file('photo')->store('payment_method','custom');
        }
        $payment_method->currency = $request->currency;
        $payment_method->save();
        return redirect()->route('payment_method.index')->with('success', 'Payment Method update successfully');
    }
    public function delete($id){
        $payment_method = PaymentMethod::find($id);
        $payment_method->delete();
        
        if($payment_method->photo){
            unlink(public_path($payment_method->photo));
        }
        return redirect()->route('payment_method.index')->with('success', 'Payment Method deleted successfully');
    }
}
