<?php

use App\Http\Controllers\VisitTypeController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/visit_type', VisitTypeController::class);