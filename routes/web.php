<?php




Route::get('/', function () {
    return view('home.welcome');
})->middleware('guest');
Auth::routes();
Route::get('/myinfo','ProfileController@showMyInfo');
Route::get('/change-my-password','ProfileController@change_pass_form');
Route::patch('/myinfo','ProfileController@update_my_pass');
Route::resource('welcomes','WelcomeController');
Route::resource('admins', 'AdminController');
Route::resource('users','UserController');
Route::resource('applications', 'ApplicationController');
Route::get('/applications/filter/approved', 'ApplicationController@approved');
Route::get('/applications/filter/unapproved', 'ApplicationController@unapproved');
Route::get('/applications/filter/rejected', 'ApplicationController@rejected');



//DataTables Route
//Users
Route::get('/getUsersData', 'UserController@getUsersData');
Route::get('/getAdminsData','AdminController@getAdminsData');

//admin && users
Route::get('/getAllApplicationsData','ApplicationsDatatablesController@getAllApplicationsData');
Route::get('/getAllUnapprovedApplicationsData','ApplicationsDatatablesController@getAllUnapprovedApplicationsData');
Route::get('/getAllApprovedApplicationsData','ApplicationsDatatablesController@getAllApprovedApplicationsData');
Route::get('/getAllRejectedApplicationsData','ApplicationsDatatablesController@getAllRejectedApplicationsData');

//Super Admin
Route::get('/getAllDivisionalApplicationsData', 'ApplicationsDatatablesController@getAllDivisionalApplicationsData');
Route::get('/getAllNonDivisionalApplicationsData', 'ApplicationsDatatablesController@getAllNonDivisionalApplicationsData');
Route::get('/getAllDivisionalUnapprovedApplicationsData', 'ApplicationsDatatablesController@getAllDivisionalUnapprovedApplicationsData');
Route::get('/getAllNonDivisionalUnapprovedApplicationsData', 'ApplicationsDatatablesController@getAllNonDivisionalUnapprovedApplicationsData');
Route::get('/getAllDivisionalApprovedApplicationsData', 'ApplicationsDatatablesController@getAllDivisionalApprovedApplicationsData');
Route::get('/getAllNonDivisionalApprovedApplicationsData', 'ApplicationsDatatablesController@getAllNonDivisionalApprovedApplicationsData');
Route::get('/getAllDivisionalRejectedApplicationsData', 'ApplicationsDatatablesController@getAllDivisionalRejectedApplicationsData');
Route::get('/getAllNonDivisionalRejectedApplicationsData', 'ApplicationsDatatablesController@getAllNonDivisionalRejectedApplicationsData');


