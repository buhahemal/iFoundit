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

Route::get('/',function(){
    return view("Client.Home"); 
});
Route::get('Adminlogin', function () {
    return view("auth.Login"); 
});
Route::get('login','usercontroller@login');
Route::get('Lostitemlistal/{Id}','usercontroller@SpecifcItem');
Route::get('Lostitemlistal','usercontroller@AllItemLost');
Route::post('Serachuser','usercontroller@Searchuser');
Route::post('Adminlogin','iauthadmin@Getlogin');
Route::post('UserLogin','usercontroller@UserLogin');
Route::post('UserRegister','usercontroller@UserRegisterD');
Route::get('UserRegister','usercontroller@UserRegister');
Route::get('searchproduct','usercontroller@searchproduct');
Route::post('verifycode','usercontroller@verification');

 

Route::group(['middleware'=>'UserLoginCheck'],function () {
Route::post('UpUserRegister','usercontroller@UpUserRegister');
Route::post('getemailid','Itemcontroller@getemailid');
Route::get('UserProfile','usercontroller@UserProfile');
Route::post('claimaccept','Itemcontroller@claimaccept');
Route::post('notificationupdate','Itemcontroller@notificationupdate');
Route::post('checknotification','Itemcontroller@checknotification');
Route::post('claimuser','Itemcontroller@claimuser');
Route::post('UserItemFound','Itemcontroller@UserItemFound');
Route::get('FoundItem','Itemcontroller@FoundItem');
Route::get('Userlogout','usercontroller@Userlogout');
Route::get('categorygetall','CategoryController@categorygetall');
Route::get('Category','CategoryController@Returnview');
Route::get('Categorylist','CategoryController@index');
Route::get('Stock','StockController@ReturnView');

});





/* Admin Route */
Route::group(['middleware'=>'AdminLoginCheck'],function () {
    Route::get('Dashboard','iauthadmin@index');
    Route::get('logout','iauthadmin@destroy');
    Route::post('AdminPostLoseitem','Itemcontroller@AdminPostLoseitem');
    Route::get('pcatlist','CategoryController@pcatlist')->name('pcatlist');
    Route::get('categorylist','CategoryController@category')->name('categorylist');
    Route::get('CategoryExport', 'CategoryController@export')->name('ExcelCategoryExport');
    Route::get('ProductExport','admincontroller@ProductExportExcel')->name('ProductExport');
    Route::resource('Category','CategoryController');
    Route::resource('Products','admincontroller'); 
    Route::post('getpcategory','CategoryController@show');
    Route::post('updatecategory','CategoryController@updatecategory');
    Route::post('getcategory','CategoryController@CheckCategory');
    Route::post('deletecategory','CategoryController@destroy');
    Route::post('StoreCategory','CategoryController@store');
    Route::get('adproductslist','Itemcontroller@aditem');

});
