<?php

use App\Http\Controllers\AMCController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/service_call', AMCController::class);
Route::get('/service_call-card', [AMCController::class, "card"]);
Route::post('/service_call_bulk_store', [AMCController::class, "bulkStore"]);
Route::post('/service_call_technician_assigning', [AMCController::class, 'serviceCallTechnicianAssigning']);
Route::get('/service_call_list', [AMCController::class, "dropDownList"]);
