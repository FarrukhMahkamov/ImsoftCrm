<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityTypeController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\TypeController;


/*
|--------------------------------------------------------------------------
| API Routess
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('developers', DeveloperController::class);
    Route::apiResource('states', StateController::class);
    Route::apiResource('addresses', AddressController::class);
    Route::apiResource('operators', OperatorController::class);
    Route::apiResource('regions', RegionController::class);
    Route::apiResource('activity-types', ActivityTypeController::class);
    Route::apiResource('projects', ProjectController::class);
    Route::apiResource('types', TypeController::class);
    Route::apiResource('clients', ClientController::class);

            