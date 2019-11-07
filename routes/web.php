<?php

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
    return view("auth.Login");
});
Route::post('Adminlogin','iauthadmin@Getlogin');

Route::get('Dashboard','iauthadmin@index');
Route::get('Category','CategoryController@Returnview');
Route::post('getcategory','CategoryController@CheckCategory');
Route::post('StoreCategory','CategoryController@store');
Route::get('Categorylist','CategoryController@index');
Route::get('Stock','StockController@ReturnView');
Route::resource('Category','CategoryController'); 
Route::post('getpcategory','CategoryController@show');
Route::post('updatecategory','CategoryController@updatecategory');
Route::post('deletecategory','CategoryController@destroy');
Route::get('categorylist','CategoryController@category')->name('categorylist');
Route::get('CategoryExport', 'CategoryController@export')->name('ExcelCategoryExport');

