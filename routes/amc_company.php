<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AMCCompanyController;

Route::apiResource('/amc_company', AMCCompanyController::class);
Route::delete('/amc/company/{id}', [AMCCompanyController::class, "AMCCompany"]);
Route::get('/amc_company-delete/{id}', [AMCCompanyController::class, "AMCCompanyDelete"]);
Route::post('/amc/building/validate', [AMCCompanyController::class, "validateAMCCompany"]);
Route::post('/amc/license/validate', [AMCCompanyController::class, "validateLicense"]);
Route::post('/amc/contact/validate', [AMCCompanyController::class, "validateContact"]);
Route::post('/amc/geographic/validate', [AMCCompanyController::class, "validateGeographic"]);


Route::post('/amc/company/info/{id}', [AMCCompanyController::class, "AMCCompanyInfoUpdate"]);
Route::put('/amc/company/license/{id}', [AMCCompanyController::class, "AMCLicenseUpdate"]);
Route::put('/amc/company/contact/{id}', [AMCCompanyController::class, "AMCContactUpdate"]);
Route::put('/amc/company/geographic/{id}', [AMCCompanyController::class, "AMCGeographicUpdate"]);


