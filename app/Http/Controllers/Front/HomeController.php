<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class HomeController extends Controller
{
    //
    public function index(){
        $settings = Setting::first();
        return view('front.home',compact('settings'));
    }
}
