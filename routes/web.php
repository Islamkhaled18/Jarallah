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

use App\Http\Middleware\Language;

Route::get('/clear-cache', function() {
    Artisan::call('config:clear');
    return "Cache is cleared";
});



Route::get('/', function () {
    return view('site/index');
});





  Route::any('index', 'Site\HomeController@index');

Route::group(['namespace' => 'Site'], function() {

  Route::resource('/','SiteController');

  Route::get('site/contact', 'SiteController@getContact');
  Route::post('site/contact', 'SiteController@postContact');

  ################################## Start Register And Login Routes ######################################
    Route::post('site/register', 'SiteController@CreateNewRegester');
    Route::post('site/login', 'SiteController@postLogin');
    Route::post('logout', 'SiteController@logout')->name('logout');

  ################################## End Register And Login Routes   #######################################

  ################################## Start Product And offers Routes ######################################
  Route::get('site/product', 'SiteController@getProduct');
  Route::get('site/offers', 'SiteController@getOffers');
  Route::get('site/show_product/{id}', 'SiteController@getShow_Product');
  ################################## End Product And offers Routes   #######################################

  ################################## Start About_Us Routes ######################################
  Route::get('site/about_us', 'SiteController@getAbout_Us')->name('aboutUs');
  Route::get('site/conditions', 'SiteController@getConditions');
  Route::get('site/privacy_policy', 'SiteController@getPrivacy_policy');
  ################################## End About_Us Routes   #######################################

  ################################## Start getSearch Routes ######################################
  Route::get('site/research_results', 'SiteController@getSearch');
  Route::get('site/researchAdevanced_results', 'SiteController@getAdvancedSearch')->name('searchSearch');
  ################################## End getSearch Routes   #######################################

  ################################## Start products Routes ######################################
   Route::get('site/products', 'SiteController@getProducts');
   Route::get('site/show_product/{id}', 'SiteController@getShow_Product');
   Route::get('site/show_car_type/{id}', 'SiteController@getShow_carType');

  ################################## End products Routes   #######################################
   ########## Product Comment ######################################
  // Route::get('/site/show_product_comment/{id}','SiteController@showComment');
     Route::post('/site/show_product_comment/{id}','SiteController@storeComment')->name('comment.store');
   ########## End Of Product Comment ###############################

   //////////////////////////////////favouritelist //////////////////////////////////

   Route::get('site/my_profile/{id}','SiteController@getProfileDetails')->name('profile.index');
   Route::put('site/my_profile/{id}','SiteController@updateProfileDetails')->name('profile.update');
   Route::resource('site/addfav', 'FoveriteController');
});
