<?php

use App\Http\Controllers\ServiceCallTypeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/service_call_type', ServiceCallTypeController::class);

Route::get('/service_call_type_list', [ServiceCallTypeController::class, "dropDownList"]);
