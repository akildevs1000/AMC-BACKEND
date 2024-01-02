<?php

use App\Http\Controllers\AMCTypeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/amc_type', AMCTypeController::class);

Route::get('/amc_type_list', [AMCTypeController::class, "dropDownList"]);
