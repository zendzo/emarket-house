<?php

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

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

	Route::get('/application-menus',[
		'as'	=>	'app.menu',
		'uses'	=>	'Admin\MenuController@index'
	]);
});

Route::resource('document', 'DocumentController');

Route::resource('angsuran', 'AngsuranController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
