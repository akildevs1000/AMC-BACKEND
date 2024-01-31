<?php

use App\Http\Controllers\FormEntryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/form_entry', FormEntryController::class);


Route::get('/form_entry/ticket/print/{id}', [FormEntryController::class, "ticketPrint"]);
Route::get('/form_entry/amc/print/{id}', [FormEntryController::class, "amcPrint"]);


