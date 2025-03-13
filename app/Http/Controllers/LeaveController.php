<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRole = strtolower(Auth::user()->role->name);
        $userId = Auth::id();
        $allAccessRoles = ['admin', 'hr'];

        if(in_array($userRole, $allAccessRoles)){
            $leaves = Leave::with('employee')->get();
        }else{
            $user = User::with('employee')->find($userId); 

            $leaves =Leave::with('employee')
            ->where('employee_id', $user->employee->id)
            ->get(); 
        }

        return view('leaves.index', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {

        $userId = Auth::id();
      $user = User::with('employee')->find($userId);  // Eager load 'employee'

      $employee = $user->employee;
       
        return view('leaves.add',  compact('employee'));
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
            'end_date' => 'required|date',
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

    public function updateStatus($id, $status)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = $status;
        $leave->save();

        return redirect()->route('leaves.index')->with('success', 'Leave status updated successfully!');
    }
}
