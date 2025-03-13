<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\OpenRoom;
use App\Models\Payment;
use App\Models\Room;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Leave;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $totalEmployees = Employee::count();
        $totalAttendanceToday = Attendance::whereDate('check_in', Carbon::today())->count();
        $totalLeaveRequestsPending = Leave::where('status', 'pending')->count();

        return view('welcome', compact('totalEmployees', 'totalAttendanceToday', 'totalLeaveRequestsPending'));

    }
}
