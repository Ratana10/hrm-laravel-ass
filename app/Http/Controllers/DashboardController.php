<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use App\Models\OpenRoom;
use App\Models\Payment;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalTenants = Customer::count();
        // OpenRoom::where()
        
        $totalRooms = Room::count();
        $busyRooms = Room::whereHas('openRoom')->count();
        
        $availableRooms = $totalRooms - $busyRooms;

           // Dynamic data for the charts
            $incomeData = Payment::selectRaw('MONTH(date) as month, SUM(amount) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')->toArray();

        // Prepare data for ApexCharts
        $chartIncomeData = [];
        for ($i = 1; $i <= 12; $i++) {
            $chartIncomeData[] = $incomeData[$i] ?? 0; // Fill missing months with 0
        }

      
        $outstandingBalance = Invoice::with('totalPayment')->get()->reduce(function ($carry, $invoice) {
            $totalPayments = $invoice->totalPayment->sum('amount');
            return $carry + ($invoice->total_amount - $totalPayments);
        }, 0);

        $tenantsWithOutstandingInvoicesCount = Invoice::with('totalPayment')
        ->get()
        ->filter(function ($invoice) {
            $totalPayments = $invoice->totalPayment->sum('amount');
            return $invoice->total_amount > $totalPayments;
        })
        ->pluck('openRoom.customer_id')
        ->unique()
        ->count();
     
        // dd($incomeData, $chartIncomeData);
        return view('welcome', compact('totalRooms',  'availableRooms', 'totalTenants', 'chartIncomeData', 'outstandingBalance', 'tenantsWithOutstandingInvoicesCount'));

    }
}
