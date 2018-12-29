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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::post('github/deploy', 'DeployController@deploy');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function()
{

  Route::resource('customers', 'CustomersController');

  Route::resource('customers.children', 'ChildrenController');

  Route::resource('customers.comments', 'CommentsController');

  Route::resource('customers.appointments', 'AppointmentsController');

  Route::get("search","CustomersController@search");

});
