<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NormalUserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:user']);
    }

    public function index()
    {
        return view('userdashboard');
    }
}
