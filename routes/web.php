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

Route::get('/', function() {
	return redirect()->route('login');
})->name('home');

Route::get('/login', 'UserController@login')->name('login');
Route::post('/authenticate', 'UserController@authenticate')->name('authenticate');
Route::get('/dashboard', 'PageController@redirectDashboard')->name('dashboard.redirect');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
	// LOGOUT
	Route::get('/logout', 'UserController@logout')->name('logout');

	// DASHBOARD
	Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');

	// Reservation
	Route::get('/client-profile', 'PageController@clientprofile')->name('client-profile');
	Route::get('/create-client-profile', 'PageController@createClientprofile')->name('create-client-profile');
	Route::get('/edit-client-profile', 'PageController@editClientprofile')->name('edit-client-profile');
	Route::get('/view-client-profile', 'PageController@viewClientprofile')->name('view-client-profile');
	Route::get('/edit-pet', 'PageController@editPetprofile')->name('edit-pet');
	Route::get('/view-pet', 'PageController@viewPetprofile')->name('view-pet');


	//---------------------SERVICES--------------------------//

	//Consultation
	Route::get('/consultation', 'ServicesController@consultation')->name('consultation');
	Route::get('/create-consultation', 'ServicesController@createConsultation')->name('create-consultation');
	Route::get('/view-consultation', 'ServicesController@viewConsultation')->name('view-consultation');
	Route::get('/edit-consultation', 'ServicesController@editConsultation')->name('edit-consultation');

	//VACCINATION
	Route::get('/vaccination', 'ServicesController@vaccination')->name('vaccination');
	Route::get('/create-vaccination', 'ServicesController@createVaccination')->name('create-vaccination');
	Route::get('/edit-vaccination', 'ServicesController@editVaccination')->name('edit-vaccination');
	Route::get('/view-vaccination', 'ServicesController@viewVaccination')->name('view-vaccination');

	//PETBOARDING
	Route::get('/boarding', 'ServicesController@boarding')->name('boarding');
	Route::get('/create-boarding', 'ServicesController@createBoarding')->name('create-boarding');
	Route::get('/edit-boarding', 'ServicesController@editBoarding')->name('edit-boarding');
	Route::get('/view-boarding', 'ServicesController@viewBoarding')->name('view-boarding');

	//PETGROOMING
	Route::get('/grooming', 'ServicesController@grooming')->name('grooming');
	Route::get('/create-grooming', 'ServicesController@createGrooming')->name('create-grooming');
	Route::get('/edit-grooming', 'ServicesController@editGrooming')->name('edit-grooming');
	Route::get('/view-grooming', 'ServicesController@viewGrooming')->name('view-grooming');


	// TRANSACTION
	Route::get('/products-order', 'transactionController@productsOrder')->name('products-order');
	Route::get('/create-products-order', 'transactionController@createproductsOrder')->name('create-products-order');
	Route::get('/view-products-order', 'transactionController@viewproductsOrder')->name('view-products-order');

	Route::get('/services', 'transactionController@services')->name('services');
	Route::get('/create-services', 'transactionController@createServices')->name('create-services');
	Route::get('/view-services', 'transactionController@viewServices')->name('view-services');

	
	// INVENTORY
	Route::get('/category', 'PageController@category')->name('category');
	Route::get('/create-category', 'PageController@createCategory')->name('create-category');
	Route::get('/view-category', 'PageController@viewCategory')->name('view-category');
	Route::get('/edit-category', 'PageController@editCategory')->name('edit-category');


    //Inventory product
	//Route::get('/view-product', 'PageController@viewProduct')->name('view-product');
	Route::get('/create-product', 'PageController@createProduct')->name('create-product');
	Route::get('/edit-product', 'PageController@editProduct')->name('edit-product');

	//APPOINTMENT
	Route::group(['prefix' => 'appointments'], function() {
		// Index
		Route::get('/', 'AppointmentController@index')->name('appointments.index');
		
		// Create
		Route::get('/create', 'AppointmentController@create')->name('appointments.create');
		
		// Edit
		Route::get('/{id}/edit', 'AppointmentController@edit')->name('appointments.edit');
		
		// Show
		Route::get('/{id}', 'AppointmentController@show')->name('appointments.show');
	});
	
	//REPORT
	Route::get('/report', 'PageController@report')->name('report');

	//SETTINGS
	Route::get('/settings', 'PageController@settings')->name('settings');

	//USERACCOUNT
	Route::get('/user-account', 'UserController@userAccount')->name('user-account');
	Route::get('/create-user-account', 'UserController@createuserAccount')->name('create-user-account');
	Route::get('/edit-user-account', 'UserController@edituserAccount')->name('edit-user-account');

	//CLIENTPANEL
	Route::get('/user', 'PageController@user')->name('user');
});