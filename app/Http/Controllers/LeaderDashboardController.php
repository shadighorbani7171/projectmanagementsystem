<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaderDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:team_leader']);
    }

    public function index()
    {
        return view('leaderdashboard');
    }
} 
