<?php

use App\models\Navbar;

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

	// Redirect Home Page to Login Page
	Route::get('/', function () {
	return redirect()->route('login');
	 });

	Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');



// Dashboard Routes

Route::middleware(['auth'])->group(function () {

	// Route::get('/dashboard', 'Dashboard@index')->name('dashboard');
	Route::get('/dashboard/{any?}', 'Dashboard@index')->name('dashboard');

	Route::get('/navbar', 'NavbarsController@index');

	Route::get('/charges/checkUniqueCompany/{title}', 'ChargeController@checkUnique');
	Route::get('/charges/charges', 'ChargeController@fetchall');
	Route::get('/charges/checkUniqueCompanySame/{id}/{title}', 'ChargeController@checkUniqueSame');
	Route::post('/charges/editcharges/{id}', 'ChargeController@editcharges');

	Route::resource('/charges', 'ChargeController');
	Route::resource('/invoice', 'InvoiceController');

});

