<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class RailController extends Controller
{
    public function home()
    {
        return view('SIH_H/homepage');
    }

    public function dashboard()
    {
        return view('SIH_H/dashboard');
    }

    public function aboutus()
    {
        return view('SIH_H/aboutus');
    }

    public function report()
    {
        return view('SIH_H/reports');
    }

    public function notification()
    {
        return view('SIH_H/notificationalerts');
    }

}
