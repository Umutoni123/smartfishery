<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CooperativeController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\FishdiseasesController;
use App\Http\Controllers\FishPondDiseasesController;
use App\Http\Controllers\FishpondsController;
use App\Http\Controllers\FishtypesController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\RecordingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\userrolesController;
use Illuminate\Http\Request;
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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('fishponds', FishpondsController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api')  ;

Route::resource('locations', LocationController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('cooperatives', CooperativeController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('fishtypes', FishtypesController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('fishdiseases', FishdiseasesController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('userroles', userrolesController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('pond_environments', EnvironmentController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('pond_diseases', FishPondDiseasesController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('production', ProductionController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('users', UserController::class)->only([
    'index', 'destroy', 'store', 'show', 'update'
])->middleware('auth:api');

Route::resource('user_roles', userrolesController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('recordings', RecordingsController::class)->only([
    'index', 'store', 'destroy', 'show', 'update'
])->middleware('auth:api');
