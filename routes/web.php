<?php




Route::get('/', function () {
    return view('home.welcome');
})->middleware('guest');
Auth::routes();
Route::resource('welcomes','WelcomeController');
Route::resource('admins', 'AdminController');
Route::resource('users','UserController');
Route::get('/myview', 'UserController@myview');
Route::get('/change-password', 'UserController@changePassword');
Route::post('/change','UserController@update_pass');
Route::resource('applications', 'ApplicationController');
Route::get('applications-approved', 'ApplicationController@approved');
Route::get('/applications-unapproved', 'ApplicationController@unapproved');
Route::get('/applications-rejected', 'ApplicationController@rejected');



