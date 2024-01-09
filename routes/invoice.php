<?php

use App\Http\Controllers\InvoiceController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/invoice', InvoiceController::class);
Route::get('/getLastInvoice', [InvoiceController::class, "getLastInvoice"]);
