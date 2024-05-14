<?php

use App\Http\Controllers\ManagerController;
use Illuminate\Support\Facades\Route;


Route::get('/manager-list', [ManagerController::class, "dropDown"]);
Route::apiResource('/manager', ManagerController::class);
