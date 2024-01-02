<?php

use App\Http\Controllers\TechnicianController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/technician', TechnicianController::class);