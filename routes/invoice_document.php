<?php

use App\Http\Controllers\InvoiceDocumentController;
use Illuminate\Support\Facades\Route;

Route::post('/invoice/document/{id}', [InvoiceDocumentController::class, "store"]);
Route::delete('/invoice/document/delete/{id}', [InvoiceDocumentController::class, "destroy"]);
