<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{ public function __construct()
    {
        $this->middleware(['permission:view dashboard']);
    }

    public function index()
    {
        $user = auth()->user();
        $role = $user->getRoleNames()->first(); // گرفتن اولین نقش کاربر

        switch ($role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'team_leader':
                return redirect()->route('team_leader.dashboard');
            case 'user':
                return redirect()->route('user.dashboard');
            default:
                return view('dashboard');
        }
    }

    public function admin()
    {
        return view('dashboard.admin');
    }

    public function teamLeader()
    {
        return view('dashboard.team_leader');
    }

    public function user()
    {
        return view('dashboard.user');
    }
    }

