<?php

use App\Http\Controllers\Web\Appwebmonitr\AppWebMonitorController;
use App\Http\Controllers\Web\Category\CategoryController;
use App\Http\Controllers\Web\City\CityController;
use App\Http\Controllers\Web\Country\CountryController;
use App\Http\Controllers\Web\Notifications\NotificationsWebController;
use App\Http\Controllers\Web\Orders\OrdersWebController;
use App\Http\Controllers\Web\Sections\SectionsController;
use App\Http\Controllers\Web\Subcategory\SubcategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/// Countries and Cities Group
Route::group(['prefix'=>"Countries"],function(){
Route::get('/all',[CountryController::class,'index'])->name('Countries');
Route::get('create',[CountryController::class,'create'])->name('create_country');
Route::post('create',[CountryController::class,'create'])->name('create_country_post');

/// Cities
Route::group(['prefix'=>'city'],function(){
    Route::get('/{id}',[CityController::class,'index'])->name('cities');
});
});



/// Categories 
Route::group(['prefix'=>'categories'],function(){
    Route::get('',[CategoryController::class,'index'])->name('categories');
    Route::get('create',[CategoryController::class,'create'])->name('create_category');
    Route::post('create',[CategoryController::class,'create'])->name('create_category_post');
    Route::get('edit/{id}',[CategoryController::class,'edit'])->name('edit_category');
    Route::post('edit/{id}',[CategoryController::class,'edit'])->name('edit_category_post');
    Route::get('delete/{id}',[CategoryController::class,'delete'])->name('delete_category');
});


Route::group(['prefix'=>'subcategory'],function(){   
    Route::get('subcategory/{id}',[SubcategoryController::class,'index'])->name('subcategories');
    Route::get('subcategory/create/{id}',[SubcategoryController::class,'create'])->name('create_subcategory');
    Route::post('subcategory/create/{id}',[SubcategoryController::class,'create'])->name('create_subcategory_post');
    Route::get('subcategory/edit/{id}',[SubcategoryController::class,'edit'])->name('edit_subcategory');
    Route::post('subcategory/edit/{id}',[SubcategoryController::class,'edit'])->name('edit_subcategory_post');
    Route::get('subcategory/delete/{id}',[SubcategoryController::class,'delete'])->name('delete_subcategory');
});





Route::group(['prefix'=>'sections'],function(){   
    Route::get('section/{id}',[SectionsController::class,'index'])->name('sections');
    Route::get('section/create/{id}',[SectionsController::class,'create'])->name('create_section');
    Route::post('section/create/{id}',[SectionsController::class,'create'])->name('create_section_post');
    Route::get('section/edit/{id}',[SectionsController::class,'edit'])->name('edit_section');
    Route::post('section/edit/{id}',[SectionsController::class,'edit'])->name('edit_section_post');
    Route::get('section/delete/{id}',[SectionsController::class,'delete'])->name('delete_section');
});


Route::group(["prefix"=>"AppDebugMonitor"],function(){
    Route::get("all",[AppWebMonitorController::class,'index'])->name('app_monitor');
    Route::get("specif/{id}",[AppWebMonitorController::class,'details'])->name('specific_app_monitor');
    Route::get("solve/{id}",[AppWebMonitorController::class,'solve'])->name('solve_app_monitor');
});



Route::group(["prefix"=>"orders"],function(){
    Route::get("all",[OrdersWebController::class,'index'])->name('orders');
    Route::get('/showOnMap/{lat}/{long}',[OrdersWebController::class,'showOnMap'])->name('showOnMap');
    Route::get("/updateStatus/{id}",[OrdersWebController::class,'updateStatus'])->name("update_order_status");
});




Route::group(["prefix"=>"notifications"],function(){
    Route::get("all",[NotificationsWebController::class,'all'])->name('all_notifications');
    Route::post("create",[NotificationsWebController::class,'create'])->name('create_notifications');
    Route::get("create",[NotificationsWebController::class,'create'])->name('create_notifications');
    Route::get("edit/{id}",[NotificationsWebController::class,'edit'])->name('edit_notifications');
    Route::post("edit/{id}",[NotificationsWebController::class,'edit'])->name('edit_notifications');
    Route::get("delete/{id}",[NotificationsWebController::class,'delete'])->name('delete_notifications');
});