<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::apiResource('/ticket', TicketController::class);
Route::get('/ticket_all', [TicketController::class, "companyIndex"]);
Route::post('/update-ticket/{id}', [TicketController::class, "updateTicket"]);
Route::post('/ticket_technician_assigning', [TicketController::class, 'ticketTechnicianAssigning']);
