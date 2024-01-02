<?php

use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/contract', ContractController::class);
Route::post('/update-contract/{id}', [ContractController::class, "updateContract"]);