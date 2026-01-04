<?php

use App\Http\Controllers\AirlineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthApiController;

Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);
Route::post('/logout', [AuthApiController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [AuthApiController::class, 'profile']);
});

Route::prefix('v1')->group(function () {
    Route::prefix('airlines')->group(function () {
        Route::get('/', [AirlineController::class, 'index']);
        Route::post('/', [AirlineController::class, 'store']);
        Route::get('/{id}', [AirlineController::class, 'show']);
        Route::put('/{id}', [AirlineController::class, 'update']);
        Route::delete('/{id}', [AirlineController::class, 'destroy']);
    });
});

// use App\Http\Controllers\AirlineController;
// use App\Http\Controllers\AirportController;
// use App\Http\Controllers\FacilityController;
// use App\Http\Controllers\FlightClassController;
// use App\Http\Controllers\FlightController;
// use App\Http\Controllers\FlightSeatController;
// use App\Http\Controllers\FlightSegmentController;
// use App\Http\Controllers\PromoCodeController;
// use App\Http\Controllers\TransactionController;
// use App\Http\Controllers\TransactionPassengerController;


// use App\Models\Airline;
// use App\Models\Airport;
// use App\Models\Facility;
// use App\Models\FlightClass;
// use App\Models\Flight;
// use App\Models\FlightSeat;
// use App\Models\FlightSegment;
// use App\Models\PromoCode;
// use App\Models\Transaction;
// use App\Models\TransactionPassenger;

