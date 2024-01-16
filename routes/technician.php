<?php

use App\Http\Controllers\TechnicianController;
use Illuminate\Support\Facades\Route;

Route::get('/technician/logout', [TechnicianController::class, 'logout']);
Route::get('/technician/me', [TechnicianController::class, 'me']);
Route::post('/technician/login', [TechnicianController::class, 'login']);
Route::apiResource('/technician', TechnicianController::class);
Route::get('/technician_list', [TechnicianController::class, "dropDownList"]);
Route::get('/get_service_calls_by_technician_id/{id}', [TechnicianController::class, "getServiceCallsByTechnicianId"]);
Route::get('/get_tickets_by_technician_id/{id}', [TechnicianController::class, "getTicketsByTechnicianId"]);

