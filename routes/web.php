<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AirlineController;
use App\Http\Controllers\AirportController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\FlightClassController;
use App\Http\Controllers\FlightSeatController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/flight_seat', function () {
    return view('flight_seat');
});

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('airline', AirlineController::class);
Route::get('/airports', [AirportController::class, 'index'])->name('airport.index');
Route::get('/airports/create', [AirportController::class, 'create'])->name('airport.create');
Route::post('/airports', [AirportController::class, 'store'])->name('airport.store');
Route::resource('facility', FacilityController::class);
Route::resource('flight', FlightController::class);
Route::resource('flight_class', FlightClassController::class);
Route::get('/flight_seat', [FlightSeatController::class, 'index']);
Route::post('/flight_seat', [FlightSeatController::class, 'store']);