<?php

use App\Http\Controllers\EquipmentCategoryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/equipment_category', EquipmentCategoryController::class);
Route::get('/equipmentCategoryList', [EquipmentCategoryController::class, "dropDownList"]);
Route::get('/equipmentCategoryByCompanyId', [EquipmentCategoryController::class, "equipmentCategoryByCompanyId"]);
Route::get('/equipmentCategoryWithQuestions', [EquipmentCategoryController::class, "equipmentCategoryWithQuestions"]);
Route::get('/equipmentCategoryWithQuestionsList', [EquipmentCategoryController::class, "equipmentCategoryWithQuestionsList"]);

