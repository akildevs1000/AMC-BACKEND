<?php

use App\Http\Controllers\ServiceCallTypeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/service_call_type', ServiceCallTypeController::class);