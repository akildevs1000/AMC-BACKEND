<?php

use App\Http\Controllers\FormEntryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/form_entry', FormEntryController::class);