<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requests;
use  Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App;
use Lang;

class LanguageController extends Controller
{
    public function changeLanguage($lang)
    {
        session()->put('locale', $lang);
        return redirect()->back();
    }
}

