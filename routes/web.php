<?php

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

Route::get('/dashboard', function () {
    return view('dashboard', [
        'zones' => request()->user()->zones,
        'doors' => request()->user()->doors
    ]);
})->name('dashboard');

Route::middleware('guest')->group(static function () {
    Route::get('login', [SessionsController::class, 'create'])
        ->name('login');
});

// Admin functionality
Route::middleware('can:admin')->group(static function () {
    Route::resource('users', UserController::class);
    Route::resource('zones', ZoneController::class)->except('show');
    Route::resource('doors', DoorController::class)->except('show');
});

// User limited to show for doors/zones
Route::middleware('auth')->group(static function () {
    Route::post('logout', [SessionsController::class, 'destroy'])
        ->name('logout');
    Route::get('zones/{zone}', [ZoneController::class, 'show'])->name('zones.show');
    Route::get('doors/{door}', [DoorController::class, 'show'])->name('doors.show');
});
