<?php




Route::get('/', function () {
    return view('home.welcome');
})->middleware('guest');
Auth::routes();
Route::get('/myinfo','MyInfoController@showMyInfo');
Route::get('/change-my-password','MyInfoController@change_pass_form');
Route::patch('/myinfo','MyInfoController@update_my_pass');
Route::resource('welcomes','WelcomeController');
Route::resource('admins', 'AdminController');
Route::resource('users','UserController');
Route::resource('applications', 'ApplicationController');
Route::get('applications-approved', 'ApplicationController@approved');
Route::get('/applications-unapproved', 'ApplicationController@unapproved');
Route::get('/applications-rejected', 'ApplicationController@rejected');



