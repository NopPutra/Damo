<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ConfigController extends Controller
{
    public function switchLang($code){

        // dd($code)

        session()->put('langCode', $code); 

        return redirect()->back();
    }
}
