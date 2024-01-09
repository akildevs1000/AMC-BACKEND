<?php

use App\Http\Controllers\TechnicianController;
use Illuminate\Support\Facades\Route;

Route::get('/technician/logout', [TechnicianController::class, 'logout']);
Route::get('/technician/me', [TechnicianController::class, 'me']);
Route::post('/technician/login', [TechnicianController::class, 'login']);
Route::apiResource('/technician', TechnicianController::class);


