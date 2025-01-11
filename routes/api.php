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


Route::get('/clients', [ClientController::class, 'index']);  // Listagem dos clientes
Route::post('/clients', [ClientController::class, 'store']); // Adicionar um novo cliente
Route::patch('/clients/{client}', [ClientController::class, 'update']); // Atualizar o campo email, telefone de um cliente

route::get('/locals', [LocalController::class, 'index']); // Listagem dos locais das festas
Route::post('/locals', [LocalController::class, 'store']); // Adicionar um novo local | fiquei na duvida se punha com Auth

route::get('/caterings', [CateringController::class, 'index']); // listagem das empresas de catering
route::post('/caterings', [CateringController::class, 'store']); // Adicionar uma nova empreesa de catering

Route::get('/bookings', [BookingController::class, 'index']); // Listagem de todas as reservas
Route::post('/bookings', [BookingController::class, 'store']); // Adicionar uma nova reserva
Route::patch('/bookings/{id}', [BookingController::class, 'update']); // Atualizar uma reserva específica
Route::delete('/bookings/{id}', [BookingController::class, 'destroy']); // Apagar uma reserva específica
Route::get('/bookings/{id}', [BookingController::class, 'getbookingdetails']); // Detalhes de uma unica reserva

Route::get('/managers', [ManagerController::class, 'index']); // Listagem de todos os managers
Route::post('/managers', [ManagerController::class, 'storeManager']); // Adicionar um novo manager 
Route::patch('/managers/{id}', [ManagerController::class, 'updateManager']); // Atualizar o campo email, telefone de um manager

Route::middleware(['jwt.auth'])->group(function () {
    Route::get('/managers/{id}/profile', [ManagerController::class, 'showProfile']); // Ver o perfil de um manager, onde tem os dados pessoais
    Route::post('/managers/{id}/profile', [ManagerController::class, 'storeProfile']); // Atualizar os dados pessoais de um manager
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
