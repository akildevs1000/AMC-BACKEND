<?php

use App\Http\Controllers\FormEntryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/form_entry', FormEntryController::class);

Route::post('/form_entry/customer_update/{id}', [FormEntryController::class, "customerUpdate"]);
Route::post('/form_entry/validate', [FormEntryController::class, "validateRequest"]);

Route::get('/form_entry/ticket/print/{id}', [FormEntryController::class, "ticketPrint"]);
Route::get('/form_entry/amc/print/{id}', [FormEntryController::class, "amcPrint"]);
