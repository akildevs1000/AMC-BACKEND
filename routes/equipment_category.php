<?php

use App\Http\Controllers\EquipmentCategoryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/equipment_category', EquipmentCategoryController::class);
Route::get('/equipmentCategoryList', [EquipmentCategoryController::class, "dropDownList"]);
