<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\FoodCategoryController;
use App\Http\Controllers\Api\v1\FoodController;
use App\Http\Controllers\Api\v1\IngredientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::resource('food-category', FoodCategoryController::class)->except(['edit','create']);
Route::resource('food', FoodController::class)->except(['edit','create']);
Route::resource('ingredient', IngredientController::class)->except(['edit','create']);

