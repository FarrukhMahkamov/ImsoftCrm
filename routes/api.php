<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReklamaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ActivityTypeController;

Route::post('register-user', [AuthController::class, 'registerUser']);
Route::post('login-user', [AuthController::class, 'loginUser']);


// Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResource('categories', CategoryController::class);

    Route::get('workers/all', [DeveloperController::class, 'getAllDeveloper']);
    Route::delete('workers/image/delete', [DeveloperController::class, 'deletePhoto']);
    Route::post('workers/image', [DeveloperController::class, 'storeImage']);
    Route::delete('workers/delete', [DeveloperController::class, 'deleteDeveloper']);

    Route::get('workers', [DeveloperController::class, 'index']);
    Route::get('workers/{id}', [DeveloperController::class, 'show']);
    Route::post('workers', [DeveloperController::class, 'store']);
    Route::put('workers/{id}', [DeveloperController::class, 'update']);
    

    Route::apiResource('categories', CategoryController::class);
    Route::get('states/all', [StateController::class, 'getAll']);
    Route::get('states/all/{id}', [StateController::class, 'getSelectedState']);
    Route::get('states' , [StateController::class, 'index']);
    Route::get('states/{id}', [StateController::class, 'show']);
    Route::post('states', [StateController::class, 'store']);
    Route::put('states/{id}', [StateController::class, 'update']);
    Route::delete('states/delete', [StateController::class, 'destroy']);

    Route::get('districts/delete', [AddressController::class, 'destroy']);
    Route::get('districts/all', [AddressController::class, 'getAllDistricts']);
    Route::get('districts', [AddressController::class, 'index']);
    Route::get('districts/{id}', [AddressController::class, 'show']);
    Route::post('districts', [AddressController::class, 'store']);
    Route::put('districts/{id}', [AddressController::class, 'update']);


    Route::get('cities/all', [RegionController::class, 'getAll']);
    Route::get('cities/all/{id}', [RegionController::class, 'getSelectedRegion']);
    Route::delete('cities/delete', [RegionController::class, 'destroy']);
    Route::get('cities', [RegionController::class, 'index']);
    Route::get('cities/{id}', [RegionController::class, 'show']);
    Route::post('cities', [RegionController::class, 'store']);
    Route::put('cities/{id}', [RegionController::class, 'update']);

    Route::get('activity-types', [ActivityTypeController::class, 'index']);
    Route::get('activity-types/all', [ActivityTypeController::class, 'getAll']);
    Route::get('activity-types/{id}', [ActivityTypeController::class, 'show']);
    Route::post('activity-types', [ActivityTypeController::class, 'store']);
    Route::put('activity-types/{id}', [ActivityTypeController::class, 'update']);
    Route::delete('activity-types/delete', [ActivityTypeController::class, 'destroy']);
    
    Route::get('projects', [ProjectController::class, 'index']);
    Route::post('projects', [ProjectController::class, 'store']);
    Route::get('projects/{project}', [ProjectController::class, 'show']);
    Route::get('projects/status/{id}', [ProjectController::class, 'searchByStatus']);
    Route::put('projects/{project}', [ProjectController::class, 'update']);
    Route::delete('projects/{project}', [ProjectController::class, 'destroy']);
    Route::post('projects/image', [ProjectController::class, 'storeImage']);

    Route::get('directions', [TypeController::class, 'index']);
    Route::get('directions/all', [TypeController::class, 'getAll']);
    Route::get('directions/{direction}', [TypeController::class, 'show']);
    Route::post('directions', [TypeController::class, 'store']);
    Route::put('directions/{id}', [TypeController::class, 'update']);
    Route::delete('directions/delete', [TypeController::class, 'destroy']);

    Route::get('reklams', [ReklamaController::class, 'index']);
    Route::get('reklams/{id}', [ReklamaController::class, 'show']);
    Route::post('reklams', [ReklamaController::class, 'store']);
    Route::put('reklams/{id}', [ReklamaController::class, 'update']);
    Route::delete('reklams/{id}', [ReklamaController::class, 'destroy']);
    
    Route::get('clients', [ClientController::class, 'index']);
    Route::get('clients/active', [ClientController::class, 'searchById']);
    Route::get('clients/status/{status}', [ClientController::class, 'searchByStatus']);
    Route::get('clients/{client}', [ClientController::class, 'show']);
    Route::post('clients', [ClientController::class, 'store']);  
    Route::post('clients/image', [ClientController::class, 'storeImage']);
    Route::delete('clients/delete', [ClientController::class, 'deleteClient']);
    
    Route::put('clients/{client}', [ClientController::class, 'update']);
    Route::delete('clients/status/delete', [ClientController::class, 'destroy']);

    
    Route::post('logout-user', [AuthController::class, 'logoutUser']);
// });
