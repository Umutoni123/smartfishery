<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\CooperativeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('cooperatives', CooperativeController::class);
Route::resource('fishtypes', FishtypesController::class);
Route::resource('Fishponds', FishpondsController::class);
Route::resource('Fishdiseases', FishdiseasesController::class);
Route::resource('userroles', userrolesController::class);
Route::resource('recommended_treatment', recommended_treatmentController::class);
Route::resource('Permission', PermissionController::class);
Route::resource('Location', LocationController::class);
Route::resource('Environment', EnvironmentController::class);
Route::resource('Product', ProductController::class);
Route::resource('users', usersController::class);

Route::get('/', function () {
    return view('welcome');
});
