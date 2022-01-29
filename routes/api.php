<?php

use App\Http\Controllers\ActivityTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('developers', DeveloperController::class);
    Route::apiResource('activity-type', ActivityTypeController::class);
    Route::apiResource('projects', ProjectController::class);
