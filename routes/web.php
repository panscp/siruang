<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UnitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC AREA
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/rooms', [RoomController::class, 'index'])
    ->name('rooms.index');

Route::get('/rooms/{room}', [RoomController::class, 'show'])
    ->name('rooms.show');

Route::get('/units/{unit}', [UnitController::class, 'show'])
    ->name('units.show');

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');


/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');

Route::post('/logout', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()
        ->route('home')
        ->with(
            'success',
            'Anda berhasil keluar dari akun.'
        );

})->name('logout');


/*
|--------------------------------------------------------------------------
| CUSTOMER AREA
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard',
        [CustomerController::class, 'dashboard']
    )->name('customer.dashboard');


    /*
    |--------------------------------------------------------------------------
    | BOOKING
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/booking',
        [BookingController::class, 'create']
    )->name('booking.create');

    Route::post(
        '/booking/check-availability',
        [BookingController::class, 'checkAvailability']
    )->name('booking.checkAvailability');

    Route::post(
        '/booking',
        [BookingController::class, 'store']
    )->name('booking.store');

    Route::get(
        '/booking/{booking}',
        [BookingController::class, 'show']
    )->name('booking.show');

    Route::delete(
    '/booking/{booking}',
    [BookingController::class, 'cancel']
)->name('booking.cancel');


    /*
    |--------------------------------------------------------------------------
    | RIWAYAT
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/riwayat',
        [CustomerController::class, 'history']
    )->name('customer.history');


    /*
    |--------------------------------------------------------------------------
    | PROFIL
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/profil',
        [CustomerController::class, 'profile']
    )->name('customer.profile');

    Route::put(
        '/profil',
        [CustomerController::class, 'updateProfile']
    )->name('customer.profile.update');

});