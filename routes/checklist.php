<?php

use App\Http\Controllers\ChecklistController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/checklist', ChecklistController::class);
