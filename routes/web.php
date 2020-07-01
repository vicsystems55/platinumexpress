<?php

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
    return view('welcome');
});

Route::get('/choose', 'ChooseRole@index');

Route::get('/reg', function () {
    return view('auth.registerType');
})->name('reg');

Route::get('/registerCompany', function () {
    return view('auth.registerCompany');
})->name('registerCompany');

Route::get('/registerRider', function () {
    return view('auth.registerRider');
})->name('registerRider');

Route::get('/registerCompany', function () {
    return view('auth.registerCompany');
})->name('registerCompany');

Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');

Route::get('/userPaySuccess', 'PaymentController@justpaid')->name('userPaySuccess');

Route::post('regPartnersPay', 'RegPartnerController@index')->name('regPartnersPay');


Auth::routes(['verify' => true]);

Route::get('/home', 'ChooseRole@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function(){

    Route::get('/', function () { return view('admin.home'); })->name('admin');
	Route::get('/accounts', function () { return view('admin.manage_accounts'); })->name('admin.accounts');
	Route::get('/partners', function () { return view('admin.partners_account'); })->name('admin.partners');
	Route::get('/gurantors', function () { return view('admin.gurantors_account'); })->name('admin.gurantors');
	Route::get('/staff', function () { return view('admin.staff_account'); })->name('admin.staff');
	Route::get('/reports', function () { return view('admin.reports'); })->name('admin.reports');
	Route::get('/settings', function () { return view('admin.settings'); })->name('admin.settings');
    
});



Route::group(['middleware' => ['auth','company', 'verified'], 'prefix' => 'company'], function(){

    Route::get('/', 'CompanyPageController@home')->name('company');
	Route::get('/profile', 'CompanyPageController@profile')->name('company.profile');
	Route::get('/portfolio', 'CompanyPageController@portfolio')->name('company.portfolio');
	Route::get('/notifications', 'CompanyPageController@notifications')->name('company.notifications');
	Route::get('/reports', 'CompanyPageController@reports')->name('company.reports');

    
});

Route::group(['middleware' => ['auth','user', 'verified'], 'prefix' => 'user'], function(){

    Route::get('/', 'UserPageController@home')->name('user');
	Route::get('/profile', 'UserPageController@profile')->name('user.profile');
	
	Route::get('/notifications', 'UserPageController@notifications')->name('user.notifications');
	Route::get('/wallet', 'UserPageController@wallet')->name('user.wallet');

    
});

Route::group(['middleware' => ['auth','rider'], 'prefix' => 'rider'], function(){

    Route::get('/', 'RiderPageController@home')->name('rider');
	Route::get('/profile', 'RiderPageController@profile')->name('rider.profile');
	
	Route::get('/notifications', 'RiderPageController@home')->name('rider.notifications');
	Route::get('/wallet', 'RiderPageController@home')->name('rider.wallet');

    
});







