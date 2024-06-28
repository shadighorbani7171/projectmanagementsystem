<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaderDashboardController;
use App\Http\Controllers\NormalUserDashboardController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/admindashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/leaderdashboard', [LeaderDashboardController::class, 'index'])->name('team_leader.dashboard');
    Route::get('/userdashboard', [NormalUserDashboardController::class, 'index'])->name('user.dashboard');
});




Route::get('/dashboard', function () {
    $user = auth()->user();
    $role = $user->getRoleNames()->first();

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
})->name('dashboard');
