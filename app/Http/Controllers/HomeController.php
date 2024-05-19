<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{


    public function adminDashboard()
    {
        return view('dashboard.admin');
    }
    public function customerDashboard()
    {
        return view('dashboard.customer');
    }
    public function farmerDashboard()
    {
        return view('dashboard.farmer');
    }



}
