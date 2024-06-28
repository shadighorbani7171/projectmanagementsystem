<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin', 'permission:access admin pannel']);
    }

    public function index()
    {
        return view('admindashboard');
    }

    
}
