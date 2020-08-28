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
    return view('auth/login');
});
Route::get('index',function(){
    return view('layout/main');
});
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'VenderListController@index')->name('home')->middleware('auth');
Route::Resource('registration','RegistrationController')->middleware('auth');
// Route::Resource('dashboard','DashboardController')->middleware('auth');
Route::Resource('VenderListing','VenderListController')->middleware('auth');
ROute::post('/delete_vender/{id}','VenderListController@destroy')->name('delete_vender.destroy');
Route::Resource('Buyer','BuyerController')->middleware('auth');
Route::Resource('Seller','SellerController')->middleware('auth');
Route::Resource('Ledger','LedgerController')->middleware('auth');
Route::Resource('Profile','ProfileController')->middleware('auth');
Route::Resource('VenderAssign','VenderAssignController')->middleware('auth');
Route::Resource('EmployeeShop','EmployeeShopController')->middleware('auth');
Route::Resource('EmployeeList','EmployeeListController')->middleware('auth');
Route::Resource('EmployeeStatus','EmployeeStatusController')->middleware('auth');
Route::get('pdf/{id}','PdfMakerController@generate')->name('pdf')->middleware('auth');
Route::get('LedgerPdf','PdfMakerController@LedgerPdf')->name('LedgerPdf')->middleware('auth');

Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('permissions', 'PermissionController');
/* Route::get('pdf/{id}', function($id)
{
    return 'PdfMakerController@generate';
}); */
/* Route::get('dashboard',function(){
    return view('dashboard');
}); */
