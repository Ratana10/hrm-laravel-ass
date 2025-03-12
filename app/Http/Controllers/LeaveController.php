<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves =Leave::with('employee')->paginate(10); 

        return view('leaves.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $employees = Employee::all();
        return view('leaves.add',  compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        // Validate the form data
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:check_in',
            'reason' => 'required|string|max:255',
        ]);

        // Store leave data
        Leave::create($validated);

        // Redirect with success message
        return redirect()->route('leaves.index')->with('success', 'Leave added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($leaveId)
    {
        return view('leaves.show', compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($leaveId)
    {
        $leave = Leave::with('employee')->findOrFail($leaveId);
        return view('leaves.edit', compact('leave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $leaveId)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:check_in',
            'reason' => 'required|string|max:255',
        ]);

        $leave = Leave::find($leaveId);
        $leave->update($validated);

        return redirect()->route('leaves.index')->with('success', 'Leave updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $leaveId)
    {
        
        $leave = Leave::find($leaveId);
        $leave->delete();
        return redirect()->route('leaves.index')->with('success', 'Leave deleted successfully.');
    }
}
