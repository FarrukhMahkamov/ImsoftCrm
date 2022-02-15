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
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\ActivityTypeController;


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

Route::post('register-user', [AuthController::class, 'registerUser']);
Route::post('login-user', [AuthController::class, 'loginUser']);


// Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('workers', DeveloperController::class);
    Route::apiResource('states', StateController::class);
    Route::apiResource('districts', AddressController::class);
    Route::apiResource('operators', OperatorController::class);
    Route::apiResource('cities', RegionController::class);

    Route::get('activity-types', [ActivityTypeController::class, 'index']);
    Route::get('activity-types/{id}', [ActivityTypeController::class, 'show']);
    Route::post('activity-types', [ActivityTypeController::class, 'store']);
    Route::put('activity-types/{id}', [ActivityTypeController::class, 'update']);
    Route::delete('activity-types/{id}', [ActivityTypeController::class, 'destroy']);
    

    Route::get('projects', [ProjectController::class, 'index']);
    Route::post('projects', [ProjectController::class, 'store']);
    Route::get('projects/{project}', [ProjectController::class, 'show']);
    Route::get('projects/search/{id}', [ProjectController::class, 'searchByStatus']);
    Route::put('projects/{project}', [ProjectController::class, 'update']);
    Route::delete('projects/{project}', [ProjectController::class, 'destroy']);

    Route::get('directions', [TypeController::class, 'index']);
    Route::get('directions/{direction}', [TypeController::class, 'show']);
    Route::post('directions', [TypeController::class, 'store']);
    Route::put('directions/{direction}', [TypeController::class, 'update']);
    Route::delete('directions/{direction}', [TypeController::class, 'destroy']);


    Route::get('reklama', [ReklamaController::class, 'index']);
    Route::get('reklama/{reklama}', [ReklamaController::class, 'show']);
    Route::post('reklama', [ReklamaController::class, 'store']);
    Route::put('reklama/{reklama}', [ReklamaController::class, 'update']);
    Route::delete('reklama/{reklama}', [ReklamaController::class, 'destroy']);

    Route::get('clients', [ClientController::class, 'index']);
    Route::get('clients/{client}', [ClientController::class, 'show']);
    Route::post('clients', [ClientController::class, 'store']);  
    Route::put('clients/{client}', [ClientController::class, 'update']);
    Route::delete('clients/{client}', [ClientController::class, 'destroy']);

    
    Route::post('logout-user', [AuthController::class, 'logoutUser']);
// });




