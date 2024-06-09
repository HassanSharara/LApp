<?php

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

Route::group(['prefix' => 'categories'], function () {
    Route::post('all', [CategoryApiController::class, 'index']);
    Route::post('forShowing', [CategoryApiController::class, 'forShowing']);
});
