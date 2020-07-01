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

Route::get('/registerPartners', function () {
    return view('auth.registerPartners');
})->name('registerPartners');

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



Route::group(['middleware' => ['auth','partner', 'verified'], 'prefix' => 'partners'], function(){

    Route::get('/', 'PartnersPageController@home')->name('partners');
	Route::get('/profile', 'PartnersPageController@profile')->name('partners.profile');
	Route::get('/portfolio', 'PartnersPageController@portfolio')->name('partners.portfolio');
	Route::get('/notifications', 'PartnersPageController@notifications')->name('partners.notifications');
	Route::get('/reports', 'PartnersPageController@reports')->name('partners.reports');

    
});

Route::group(['middleware' => ['auth','user', 'verified'], 'prefix' => 'user'], function(){

    Route::get('/', 'UserPageController@home')->name('user');
	Route::get('/profile', 'UserPageController@profile')->name('user.profile');
	Route::get('/loan', 'UserPageController@loans')->name('user.loans');
	Route::get('/notifications', 'UserPageController@notifications')->name('user.notifications');
	Route::get('/wallet', 'UserPageController@wallet')->name('user.wallet');

    
});

Route::group(['middleware' => ['auth','gurantor'], 'prefix' => 'gurantor'], function(){

    Route::get('/', function () { return view('gurantor.home'); })->name('gurantor');
	Route::get('/profile', function () { return view('gurantor.profile'); })->name('gurantor.profile');
	Route::get('/loan', function () { return view('gurantor.loans'); })->name('gurantor.loans');
	Route::get('/notifications', function () { return view('gurantor.notifications'); })->name('gurantor.notifications');
	Route::get('/wallet', function () { return view('gurantor.wallet'); })->name('gurantor.wallet');

    
});







