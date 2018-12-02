<?php

Route::get('/', 'FrontEndController@home')->middleware('guest');

Route::get('/perumahan/{perumahan}', 'FrontEndController@showPerumahan')
->name('perumahan.show')
->middleware('guest');

Route::get('/rumah/{rumah}', 'FrontEndController@showRumah')
->name('rumah.show')
->middleware('guest');

// Administrator Sections
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'administrator'], function(){

	Route::get('/',[
		'as'	=>	'dashboard',
		'uses'	=>	'Admin\AdministratorController@index'
	]);

	Route::resource('user', 'UserController');
	
	Route::resource('perumahan', 'PerumahanController');

	Route::resource('rumah', 'RumahController');

	Route::resource('role', 'Admin\RoleController');

	Route::resource('type-rumah', 'RumahTypeController');

	Route::resource('type-document', 'DocumentTypeController');

	Route::resource('photo-rumah', 'UploadPhotoRumahController');

	Route::post('booking/rumah', 'BookingRumahController@booking')->name('booking.rumah');

	Route::post('verified/{id}', 'PaidVerificationController@verifiedPayment')->name('paid.angsuran');

	Route::get('send/to-all', 'SendPaymentNotificationController@sendToAll')->name('send.all');

	Route::get('send/to/{id}', 'SendPaymentNotificationController@sendTo')->name('send.to');

	// Route::get('/application-menus',[
	// 	'as'	=>	'app.menu',
	// 	'uses'	=>	'Admin\MenuController@index'
	// ]);
});

Route::resource('document', 'DocumentController');

Route::resource('angsuran', 'AngsuranController');

Route::get('user/rumah/{rumah}', 'RumahController@userShow')->name('user.rumah.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
