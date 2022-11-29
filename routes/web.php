<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DoorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
use App\Models\Door;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Admin functionality
Route::middleware('can:admin')->group(static function () {
    Route::resource('users', UserController::class);
    Route::resource('zones', ZoneController::class)->except('show');
    Route::resource('doors', DoorController::class)->except('show');
});

// User limited to show for doors/zones
Route::middleware('auth')->group(static function () {
    Route::get('/dashboard', function () {
        return view('account.dashboard', [
            'zones' => request()->user()->zones,
            'doors' => request()->user()->doors,
            'active' => request()->user()->isActive(),
        ]);
    })->name('account.dashboard');
    Route::get('account/{user}/edit', function () {
        return view('account.edit', [
            'user' => request()->user()
        ]);
    })->name('account.edit');
    Route::patch('account/{user}', [AccountController::class, 'update'])->name('account.update');
    Route::get('zones/{zone}', [ZoneController::class, 'show'])->name('zones.show');
    Route::get('doors/{door}', [DoorController::class, 'show'])->name('doors.show');
});
