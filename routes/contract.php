<?php

use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/contract', ContractController::class);
Route::get('/contract_list/{id}', [ContractController::class, "dropdownList"]);
Route::post('/update-contract/{id}', [ContractController::class, "updateContract"]);