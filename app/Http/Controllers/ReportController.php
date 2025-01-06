<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function income()
    {
        return view('reports.income');
    }

    public function outstanding()
    {
        return view('reports.outstanding');
    }
}
