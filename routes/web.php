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

 //Route::get('/', function () {
  //  return view('welcome');
 //});
 
	Auth::routes();
 

Route::get('/', 'PostsController@index');



Route::get('/home', 'HomeController@index')->middleware('admin');

Route::resource('admin','UsersController');

Route::resource('survey','SurveysController');

Route::resource('user','PostsController');

Route::resource('userrole','UserroleController');

Route::post('/processajax','AjaxController@processajax');

Route::post('/processajaxunapprove','AjaxController@processajaxunapp');

Route::get('/approved', 'AdminpagesController@approved');

Route::get('/unapproved', 'AdminpagesController@unapproved');

Route::resource('adminuser','AdminuserController');

 


