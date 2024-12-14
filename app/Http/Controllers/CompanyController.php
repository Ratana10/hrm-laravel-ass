<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index(){
        $company = Company::find(1);
        return view('company.index', compact('company'));
    }
    public function edit(Request $r){
        $company = Company::find(1);
        return view('company.edit', compact('company'));
    }
    public function update(Request $r){
        $company = Company::find(1);
        $company->name = $r->name;
        $company->phone = $r->phone;
        $company->address = $r->address;
        $company->telegram = $r->telegram;
        $company->tiktok = $r->tiktok;
        $company->facebook = $r->facebook;
        $company->photo = $r->hasFile('photo') ? $r->file('photo')->store('company','custom') : $company->photo;
        $company->save();
        return redirect()->route('company.index');
    }
}
