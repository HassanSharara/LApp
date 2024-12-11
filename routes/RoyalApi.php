<?php

use App\Http\Controllers\Api\Account\CustomerAccountController;
use App\Http\Controllers\Api\Banners\BannersApiController;
use App\Http\Controllers\Api\Category\CategoryApiController;
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


Route::group(['prefix'=>'customer'],function (){
    Route::post('refresh',[CustomerAccountController::class,'refresh']);
});

Route::group(['prefix' => 'categories'], function () {
    Route::post('all', [CategoryApiController::class, 'index']);
});
 


Route::group(['prefix'=>'banners'],function (){
    Route::post('all',[BannersApiController::class,'allBanners']);
});