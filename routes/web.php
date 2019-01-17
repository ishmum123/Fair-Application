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

Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
Route::resource('infos','InfoController');
Route::resource('welcomes','WelcomeController');
Route::resource('admins', 'AdminController');
Route::resource('users','UserController');
Route::resource('applications', 'ApplicationController');
Route::get('applications-processed', 'ApplicationController@processed');
Route::get('/applications-unprocessed', 'ApplicationController@unprocessed');
Route::get('/applications-rejected', 'ApplicationController@rejected');
//Route::get('/', 'DashboardController@empty');
Route::get('/', function () {
    return view('home.welcome');
})->middleware('guest');


