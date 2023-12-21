<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AMCCompanyController;

Route::apiResource('/amc_company', AMCCompanyController::class);
Route::delete('/amc_company-delete/{id}', [AMCCompanyController::class,"AMCCompanyDelete"]);
Route::post('/amc/building/validate', [AMCCompanyController::class,"validateAMCCompany"]);
