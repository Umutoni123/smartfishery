<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CooperativeController;
use App\Http\Controllers\EnvironmentController;
use App\Http\Controllers\FishdiseasesController;
use App\Http\Controllers\FishpondsController;
use App\Http\Controllers\FishtypesController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Recommended_treattmentController;
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
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('Fishponds', FishpondsController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('Location', LocationController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('cooperatives', CooperativeController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('fishtypes', FishtypesController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('Fishdiseases', FishdiseasesController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('userroles', userrolesController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('recommended_treatment', Recommended_treattmentController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('Permission', PermissionController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('Environment', EnvironmentController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('Product', ProductController::class)->only([
    'index', 'destroy', 'show', 'store', 'update'
])->middleware('auth:api');

Route::resource('users', UserController::class)->only([
    'index', 'destroy', 'show', 'update'
])->middleware('auth:api');
