<?php

use App\Http\Controllers\Api\Auth\Customers\AuthController;
use App\Http\Controllers\Api\Category\CategoryApiController;
use App\Http\Controllers\Api\Orders\OrdersApiController;
use App\Http\Controllers\Api\Subcategory\SubCategoryApiController;
use App\Http\Controllers\Appmonitor\AppMonitorController;
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

/// Royal App Debug Monitor
 
Route::post("RoyalAppSigningDebugEvent",[AppMonitorController::class,'create']);


Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('loginByGoogle',[AuthController::class,'loginByGoogle']);


/// Categories
Route::group(["prefix"=>"category"],function(){
    Route::post('/all',[CategoryApiController::class,'index']);
});


Route::group(['prefix' => 'categories'], function () {
    Route::post('all', [CategoryApiController::class, 'index']);
    Route::post('forShowing', [CategoryApiController::class, 'forShowing']);
});



/// SubCategories
Route::group(["prefix"=>"subcategory"],function(){
    Route::post('/all/{id}',[SubCategoryApiController::class,'index']);
});

/// orders
Route::group(["prefix"=>"orders"],function(){
    Route::post('/create',[OrdersApiController::class,'createOrder']);
});
