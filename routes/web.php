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
Route::get('pay', function ()
{
   return view('payments.yandex');
});
Route::get('qr-code', function ()
{
  //$qr='ST00012|Name=АО "ПФ "СКБ Контур"|PersonalAcc=40702810116260100181|BankName=УРАЛЬСКИЙ БАНК ПАО СБЕРБАНК|BIC=046577674|CorrespAcc=30101810500000000674|PayeeINN=6663003127|KPP=668601001|LastName=.|FirstName=.|MiddleName=.|PayerAddress=.|PersAcc=1993016789|Purpose=502712853694 Тогулев Арсений Евгеньевич 1993016789|SUM=140000';
$qr='ST00011|Name=ИП Тогулев Арсений Евгеньевич|PersonalAcc=40802810201500033987|BankName=Точка ПАО Банка «ФК Открытие» г. Москва|BIC=044525999|CorrespAcc=30101810845250000999|PayeeINN=502712853694|Purpose=оплата консультации|Sum=350000';
  //$qr='ST00012|Name=ИП Тогулев Арсений Евгеньевич|PersonalAcc=40802810201500033987|BankName=Точка ПАО Банка «ФК Открытие» г. Москва|BIC=044525999|CorrespAcc=30101810845250000999|PayeeINN=502712853694|KPP=.|LastName=.|FirstName=.|MiddleName=.|PayerAddress=.|PersAcc=1|Purpose=Оплата консультации 1|SUM=140000';

  //$qrData='ST00012|Name=ИП Тогулев Арсений Евгеньевич|PersonalAcc=40802810201500033987|BankName=Филиал Точка Публичного акционерного общества Банка «Финансовая Корпорация Открытие»|BIC=044525999|CorrespAcc=30101810845250000999|PayeeINN=502712853694|KPP=01001|LastName=Иванов|FirstName=Семен|MiddleName=Викторович|PayerAddress=Москва, Оболенский пер.10 стр1 |Purpose=Оплата консультации 1|Sum=350000';
//return QrCode::format('png')->errorCorrection('H')->size(400)->generate('Make me into a QrCode!');
  return QrCode::errorCorrection('H')->encoding('WINDOWS-1251')->size(400)->generate($qr);
});


Route::get('/', function () {
  if(!Auth::check()) {
    return redirect('posts');
  }else {
    return redirect('admin/customers');
  }
});
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
  if(!Auth::check()) {
    return redirect('posts');
  }else {
    return redirect('admin/customers');
  }
});

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

Route::get('/thx', function() {
  return view('common.thx');
});

Route::post("/contacts","ContactController@contactForm");
Route::post("/sign_up","ContactController@consultationRequest");

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
