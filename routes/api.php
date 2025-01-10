<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\LocalController;
use App\Http\Controllers\Api\CateringController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\ManagerController;
use App\Http\Controllers\Api\AuthenticateController;

use App\Http\Middleware\JwtMiddleware;

Route::post('register', [AuthenticateController::class, 'register']);
Route::post('login', [AuthenticateController::class, 'login']);

Route::get('/clients', [ClientController::class, 'index']); // funciona
Route::post('/clients', [ClientController::class, 'store']); // funciona
Route::patch('/clients/{client}', [ClientController::class, 'update']); // funciona

route::get('/locals', [LocalController::class, 'index']); // funciona
Route::post('/locals', [LocalController::class, 'store']); // funciona / vai ser com token 

route::get('/caterings', [CateringController::class, 'index']); // funciona
route::post('/caterings', [CateringController::class, 'store']); // funciona / vai ser com token

Route::get('/bookings', [BookingController::class, 'index']);
Route::post('/bookings', [BookingController::class, 'store']);
Route::patch('/bookings/{id}', [BookingController::class, 'update']);
Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);

Route::get('/managers', [ManagerController::class, 'index']); // funciona
Route::post('/managers', [ManagerController::class, 'storeManager']); // funciona
Route::patch('/managers/{id}', [ManagerController::class, 'update']); // funciona

Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/managers/{id}/profile', [ManagerController::class, 'showProfile']); // funciona
    Route::post('/managers/{id}/profile', [ManagerController::class, 'storeProfile']); // funciona
});



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
