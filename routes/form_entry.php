<?php

use App\Http\Controllers\FormEntryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/form_entry', FormEntryController::class);


Route::get('/form_entry/preview/{id}', [FormEntryController::class, "preview"]);
