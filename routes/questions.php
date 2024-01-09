<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/questions', QuestionController::class);
Route::delete('/questions-heading-delete/{id}', [QuestionController::class, 'destroyHeading']);
