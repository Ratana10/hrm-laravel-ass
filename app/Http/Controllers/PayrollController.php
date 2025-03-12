<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payroll;
use App\Models\Employee;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::paginate(10);
        return view('payrolls.index', compact('payrolls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $employees = Employee::all();
        return view('payrolls.add', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
            //    return response()->json([
            //     'message' => 'Payload logged successfully.',
            //     'payload' => $request->all(),
            // ]);


        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'month' => 'required|string|max:10',
            'base_salary' => 'required|numeric',
            'deductions' => 'nullable|numeric',
            'bonus' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
        ]);

        $netSalary = ($request->deductions ?? 0) + ($request->tax ?? 0);

        Payroll::create([
            'employee_id' => $request->employee_id,
            'month' => $request->month,
            'base_salary' => $request->base_salary,
            'deductions' => $request->deductions ?? 0,
            'bonus' => $request->bonus ?? 0,
            'tax' => $request->tax ?? 0,
            'net_salary' => $netSalary,
            'status' => 'pending',
            'payment_date' => null,
        ]);

        return redirect()->route('payrolls.index')->with('success', 'Payroll created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($payrollId)
    {
        $payroll = Payroll::find($payrollId);
        return view('payrolls.edit', compact('payroll'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $payrollId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'work_date' => 'required|date',
        ]);
        
        echo json_encode($validated);

        // $payroll = Payroll::find($payrollId);
        // $payroll->update($validated);

        // return redirect()->route('payrolls.index')->with('success', 'Payroll updated successfully.');
    }


    public function delete(string $payrollId)
    {
        $payroll = Payroll::find($payrollId);
        $payroll->delete();
        return redirect()->route('payrolls.index')->with('success', 'Payroll deleted successfully.');
    }
}
