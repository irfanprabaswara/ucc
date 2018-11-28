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

// Route::prefix('kuisioner')->group(function () {
//     Route::get('/{informan?}', 'FrontKuisionerController@getKuisioner')->name('kuisioner');
// 	Route::post('/', 'FrontKuisionerController@submitKuisioner');
// });

Route::prefix('kuisioner')->group(function () {
    Route::get('/{informan?}', 'HomeController@tampilSurvey');
	Route::post('/{id}', 'HomeController@submitKuisioner');
});

Route::get('/', 'FrontPostingController@getIndex');
// Route::get('/', 'FrontPostingController@getIndex');
Route::get('/responses', 'FrontResponsesController@getResponses');
Route::get('/search', 'FrontPostingController@getSearch');
Route::get('/contact', 'FrontContactController@getContact');
Route::get('/about', 'FrontAboutController@getAbout');
Route::get('/gallery', 'FrontGalleryController@getIndex');
Route::get('/missing', 'MissingHandlerController@getIndex');
Route::get('/events/{filter?}', 'FrontEventsController@getEvents');
Route::get('/news/{category?}/{slug?}', 'FrontPostingController@getPost');

Route::get('pengelola/export/{type?}', 'BackgroundExportController@export');
Route::get('pengelola/toggle_show/', 'BackgroundToggleShowRespon@toggleShowRespon');

Route::post('/contact', 'FrontContactController@submitContact');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@getIndex')->name('afterlogin');
Route::get('/listIsiSurvey', 'HomeController@listIsiSurvey')->name('listIsiSurvey');
Route::get('/listHasilSurvey', 'HomeController@listHasilSurvey')->name('listHasilSurvey');
Route::get('tampilHasilSurvey/{id}','HomeController@tampilHasilSurvey');
Route::get('tampilSurvey/{id}','HomeController@tampilSurvey');
Route::get('/getmsg','AggrementController@index');