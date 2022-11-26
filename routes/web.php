<?php

use App\Http\Controllers\DoorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZoneController;
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

Route::get('login', [SessionsController::class, 'create'])->name('login');
//Route::post('auth', [SessionsController::class, 'store']);
Route::post('logout', [SessionsController::class, 'destroy'])->name('logout');

Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

Route::resource('users', UserController::class);
Route::resource('zones', ZoneController::class);
Route::resource('doors', DoorController::class);

//Route::resource('register')

Route::get('/dashboard', function () {
    return view('zones.index', [
        'zones' => request()->user()->zones
    ]);
});
