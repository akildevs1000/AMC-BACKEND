<?php

use App\Http\Controllers\BusinessTypeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/business_type', BusinessTypeController::class);