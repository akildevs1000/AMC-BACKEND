<?php

use App\Http\Controllers\PriorityController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/priority', PriorityController::class);
Route::get('/priority_list', [PriorityController::class, "dropdownList"]);
