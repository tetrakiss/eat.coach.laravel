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
Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['register' => false]);

/*
|--------------------------------------------------------------------------
| GitHub update Routes
|--------------------------------------------------------------------------
|
*/

Route::post('github/deploy', 'DeployController@deploy');


/*
|--------------------------------------------------------------------------
| Dynamic page Routes for guests
|--------------------------------------------------------------------------
|
*/

Route::resource('posts', 'PostsController', ['names' => [
    'index' => 'posts.user.index',
    'show' =>'posts.user.show'
]])->only([
    'index', 'show'
]);


/*
|--------------------------------------------------------------------------
| Common page Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/contacts', function() {
  return view('common.contacts');
});

Route::get('/about', function() {
  return view('common.about');
});

Route::get('/how', function() {
  return view('common.how');
});

Route::get('/sign_up', function() {
  return view('common.signup');
});




/*
|--------------------------------------------------------------------------
| Admin page Routes
|--------------------------------------------------------------------------
|
*/

Route::prefix('admin')->group(function(){

  Route::middleware(['auth'])->group(function () {

  Route::resource('customers', 'CustomersController');

  Route::resource('customers.children', 'ChildrenController');

  Route::resource('customers.comments', 'CommentsController');

  Route::resource('customers.appointments', 'AppointmentsController');

  Route::get("search","CustomersController@search");

  Route::resource('posts', 'PostsController');
  });

});
