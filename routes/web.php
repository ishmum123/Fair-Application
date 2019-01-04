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
//Route::post('/sendmail', function(\Illuminate\Http\Request $request, \Illuminate\Mail\Mailer $mailer){
//    $mailer
//    ->to($request->input('mail'))
//    ->send(new \App\Mail\mymail($request->input('text')));
//    return redirect('/dashboard');
//})->name('sendmail');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::resource('infos','InfoController');
Route::resource('admins', 'AdminController');
Route::resource('users','UsersController')->middleware('auth');
Route::resource('applications', 'ApplicationController')->middleware('auth');
Route::get('applications-processed', 'ApplicationController@processed');
Route::get('/applications-unprocessed', 'ApplicationController@unprocessed')->middleware('auth');
Route::get('/applications-rejected', 'ApplicationController@rejected')->middleware('auth');
Route::get('/', function () {
    return view('home.welcome');
});


