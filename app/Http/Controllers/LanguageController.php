<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLang($lange){
        session()->put('lang',$lange);

        return redirect()->back();
    }
}
