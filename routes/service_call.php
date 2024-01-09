<?php

use App\Http\Controllers\ServiceCallController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/service_call', ServiceCallController::class);

Route::get('/service_call_list', [ServiceCallController::class, "dropDownList"]);
