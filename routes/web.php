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

Auth::routes();

Route::get('/my-account', 'HomeController@index')->name('home');
Route::post('/update-account', 'HomeController@updateAccount')->name('update.account');
Route::get('/sendemail', 'SendZipController@sendEmail')->name('send-email');
Route::get('404',['as'=>'404','uses'=>'ErrorHandlerController@errorCode404']);

Route::group(['middleware' => ['guest'], 'as' => 'public.'], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'PageController@index']);

    Route::get('/about-nns', ['as' => 'about', 'uses' => 'PageController@about']);
    Route::get('/faqs', ['as' => 'faq', 'uses' => 'PageController@faq']);
    Route::get('/acknowledgement', ['as' => 'acknowledgement', 'uses' => 'PageController@acknowledgement']);
    Route::get('/sitemap', ['as' => 'sitemap', 'uses' => 'PageController@sitemap']);

    Route::get('/contact-us', ['as' => 'contact', 'uses' => 'PageController@contact']);
    Route::post('/contact/send', ['as' => 'send.email', 'uses' => 'SendEmailController@send']);

    
    Route::get('/facts-and-figures/{year}', ['as' => 'factsfigures', 'uses' => 'PageController@factsandfigures']);
    Route::get('/facts-and-figures-preview/{year}/{filename}', ['as' => 'ff-preview', 'uses' => 'PageController@factsandfigures_preview']);

    Route::get('/presentation/{year}', ['as' => 'presentation', 'uses' => 'PageController@presentation']);
    Route::get('/presentation-preview/{year}/{filename}', ['as' => 'presentation-preview', 'uses' => 'PageController@presentation_preview']);

    Route::get('/infographics/{year}/{group}', ['as' => 'brochure', 'uses' => 'PageController@brochure']);

    Route::get('/public-use-file/{pufyear}', ['as' => 'puf', 'uses' => 'PageController@puf']);
    Route::get('/public-use-file-preview/{id}/{year}', ['as' => 'puf-preview', 'uses' => 'PageController@puf_preview']);
    Route::get('/public-use-file-request/{id}/{year}', ['as' => 'puf-request', 'uses' => 'PageController@puf_request']);
    Route::get('/public-use-file-download/{year}/{filename}', ['as' => 'puf-download', 'uses' => 'PageController@puf_download']);
    Route::post('puf/request', 'PageController@pufSpecificVariable');

    Route::get('/{page_title}', ['as' => 'privacy', 'uses' => 'PageController@privacy']);

});
