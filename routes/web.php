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
    return view('index');
});
Route::get('/news', 'Controller@news')->name('news');
Route::get('/contact', 'Controller@contact')->name('contact');
Route::get('/about-us', 'Controller@aboutUs')->name('aboutUs');
Route::get('/reviews', 'Controller@reviews')->name('reviews');

Route::post('/send','Controller@send')->name('send');
Route::post('/backCall','Controller@backCall')->name('backCall');
Route::post('/question','Controller@question')->name('question');
Route::post('/sendReview','Controller@sendReview')->name('sendReview');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('appProcessing/{id}','HomeController@appProcessing')->name('appProcessing');
Route::get('callProcessing/{id}','HomeController@callProcessing')->name('callProcessing');


Route::post('/addApp','HomeController@addApp')->name('addApp');


Route::get('updateApp/{id}','HomeController@updateApp')->name('updateApp');
Route::post('updateApp/{id}','HomeController@updateAppSubmit')->name('updateAppSubmit');


Route::get('/adler', 'Controller@adler')->name('adler');
Route::get('/alupka', 'Controller@alupka')->name('alupka');
Route::get('/alushta', 'Controller@alushta')->name('alushta');
Route::get('/anapa', 'Controller@anapa')->name('anapa');
Route::get('/armyansk', 'Controller@armyansk')->name('armyansk');
Route::get('/bahchisaray', 'Controller@bahchisaray')->name('bahchisaray');
Route::get('/dzhankoj', 'Controller@dzhankoj')->name('dzhankoj');
Route::get('/dzhubga', 'Controller@dzhubga')->name('dzhubga');
Route::get('/evpatoria', 'Controller@evpatoria')->name('evpatoria');
Route::get('/feodosia', 'Controller@feodosia')->name('feodosia');
Route::get('/gelendzhik', 'Controller@gelendzhik')->name('gelendzhik');
Route::get('/kerch', 'Controller@kerch')->name('kerch');
Route::get('/krasnoperekopsk', 'Controller@krasnoperekopsk')->name('krasnoperekopsk');
Route::get('/lipetsk', 'Controller@lipetsk')->name('lipetsk');
Route::get('/mineral', 'Controller@mineral')->name('mineral');
Route::get('/sevastopol', 'Controller@sevastopol')->name('sevastopol');
Route::get('/shchelkino', 'Controller@shchelkino')->name('shchelkino');
Route::get('/simferopol', 'Controller@simferopol')->name('simferopol');
Route::get('/sochi', 'Controller@sochi')->name('sochi');
Route::get('/sudak', 'Controller@sudak')->name('sudak');
Route::get('/tuapse', 'Controller@tuapse')->name('tuapse');
Route::get('/yalta', 'Controller@yalta')->name('yalta');
Route::get('/saki', 'Controller@saki')->name('saki');
