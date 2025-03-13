<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
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
            $attendances = Attendance::with('employee')->get();
        }else{
            $user = User::with('employee')->find($userId); 

            $attendances =Attendance::with('employee')
            ->where('employee_id', $user->employee->id)
            ->get(); 
        }

        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        $userId = Auth::id();
        $user = User::with('employee')->find($userId);  // Eager load 'employee'
  
        $employee = $user->employee;
         
        return view('attendances.add',  compact('employee'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//         return response()->json([
//     'message' => 'Payload logged successfully.',
//     'payload' => $request->employee_id,
// ]);

        // Validate the form data
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'status' => 'required|in:present,absent,leave',
        ]);

        // Store attendance data
        Attendance::create([
            'employee_id' => $request->employee_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'status' => $request->status,
        ]);

        // Redirect with success message
        return redirect()->route('attendances.index')->with('success', 'Attendance added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($attendanceId)
    {
        return view('attendances.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($attendanceId)
    {
        $attendance = Attendance::with('employee')->findOrFail($attendanceId);
        return view('attendances.edit', compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $attendanceId)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'status' => 'required|in:present,absent,leave',
        ]);
        

        $attendance = Attendance::find($attendanceId);
        $attendance->update($validated);

        return redirect()->route('attendances.index')->with('success', 'Attendance updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $attendanceId)
    {
        $attendance = Attendance::find($attendanceId);
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Attendance deleted successfully.');
    }
}

// return response()->json([
//     'message' => 'Payload logged successfully.',
//     'payload' => $request->all(),
// ]);