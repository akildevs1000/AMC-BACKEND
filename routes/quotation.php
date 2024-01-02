<?php

use App\Http\Controllers\QuotationController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/quotation', QuotationController::class);