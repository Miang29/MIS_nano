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

Route::get('/', 'PageController@user')->name('home');
Route::get('/appointment', 'PageController@Appointment')->name('appointment');
Route::get('/services-offer', 'PageController@ServicesOffer')->name('services-offer');

Route::get('/login', 'UserController@login')->name('login');
Route::post('/authenticate', 'UserController@authenticate')->name('authenticate');
Route::get('/dashboard', 'PageController@redirectDashboard')->name('dashboard.redirect');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
	Route::get('/', 'PageController@redirectDashboard')->name('dashboard.redirect');

	// LOGOUT
	Route::get('/logout', 'UserController@logout')->name('logout');


	// DASHBOARD
	Route::get('/dashboard', 'PageController@dashboard')->name('dashboard');


	// CLIENT PROFILE
	Route::group(['prefix' => 'client-profile'], function () {
		// Index
		Route::get('/', 'ClientController@index')->name('client-profile');

		// Create
		Route::get('/create', 'ClientController@create')->name('client-profile.create');

		// Edit
		Route::get('/edit/{id}', 'ClientController@edit')->name('client-profile.edit');

		// Show
		Route::get('/view/{id}', 'ClientController@show')->name('client-profile.show');

		// Pet Edit
		Route::get('/view/{clientId}/pet/{id}/edit', 'ClientController@editPetProfile')->name('client-profile.pet.edit');

		// Pet Show
		Route::get('/view/{id}/pet', 'ClientController@showPetProfile')->name('client-profile.pet.show');
	});


	// TRANSACTION
	Route::group(['prefix' => 'products-order'], function () {
		//Index
		Route::get('/', 'transactionController@productsOrder')->name('products-order');

		//Create
		Route::get('/products.create', 'transactionController@createproductsOrder')->name('products.create');

		//Show
		Route::get('/products.view', 'transactionController@viewproductsOrder')->name('products.view');
	});


	//Service Transaction
	Route::group(['prefix' => 'service'], function () {
		//Index
		Route::get('/', 'transactionController@Service')->name('service');

		//Create
		Route::get('/service.create', 'transactionController@createServices')->name('service.create');

		//Show
		Route::get('/service.view', 'transactionController@viewServices')->name('service.view');
	});


	// INVENTORY
	Route::group(['prefix' => 'category'], function () {
		//Index
		Route::get('/', 'InventoryController@category')->name('category');

		//Create
		Route::get('/category.create', 'InventoryController@createCategory')->name('category.create');

		//View
		Route::get('/category.view', 'InventoryController@viewCategory')->name('category.view');

		//Edit
		Route::get('/category.edit', 'InventoryController@editCategory')->name('category.edit');

		//INVENTORY-PRODUCT
		//Index
		Route::get('/product.view', 'InventoryController@viewProduct')->name('product.view');

		//Create
		Route::get('/product.create', 'InventoryController@createProduct')->name('product.create');

		//Edit
		Route::get('/product.edit', 'InventoryController@editProduct')->name('product.edit');
	});

	// APPOINTMENT
	Route::group(['prefix' => 'appointments'], function () {
		// Index
		Route::get('/', 'AppointmentController@index')->name('appointments.index');

		// Create
		Route::get('/create', 'AppointmentController@create')->name('appointments.create');

		// Edit
		Route::get('/{id}/edit', 'AppointmentController@edit')->name('appointments.edit');

		// Show
		Route::get('/{id}', 'AppointmentController@show')->name('appointments.show');
	});

	//SERVICES
	Route::group(['prefix' => 'services'], function () {
		//Index
		Route::get('/', 'ServicesController@Services')->name('services.index');

		//Create
		Route::get('/create', 'ServicesController@create')->name('services.create');

		//Edit
		Route::get('/edit', 'ServicesController@edit')->name('services.edit');

		//Show
		Route::get('/show', 'ServicesController@show')->name('services.show');
	});

	//REPORT
	Route::get('/report', 'ReportController@report')->name('report.index');

	//SETTINGS
	Route::get('/settings', 'SettingsController@settings')->name('settings.index');


	//USERACCOUNT
	Route::group(['prefix' => 'usersaccount'], function () {
		//Index
		Route::get('/', 'UserController@userAccount')->name('user-account');

		//Create
		Route::get('/user.create', 'UserController@createuserAccount')->name('user.create');

		//Edit
		Route::get('/user.edit', 'UserController@edituserAccount')->name('user.edit');
	});
});