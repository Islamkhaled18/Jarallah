<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

define('PAGINATION_COUNT',25);
Route::group(['namespace' => 'Dashboard',  'prefix' => 'admin_panel'], function() {

  Route::get('login', 'LoginController@Login')->name('login');
  Route::post('login', 'LoginController@postLogin');

  Route::group(['middleware' => 'auth:admin'], function()
  {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

  ##################################### Start Settings Routes #######################################
    Route::resource('settings','SettingsController');
  ##################################### End Settings Routes #########################################
  
  
    ##################################### Start Users Routes ##########################################
    Route::resource('users', 'UsersController');
    Route::get('/users/{id}/delete', 'UsersController@destroy');
  ##################################### End Users Routes ############################################

  ##################################### Start Users Routes ##########################################
    Route::resource('admins', 'AdminsController');
    Route::get('/admins/{id}/delete', 'AdminsController@destroy');
  ##################################### End Users Routes ############################################

  ##################################### Start Users Routes ##########################################
    Route::resource('users', 'UsersController');
    Route::get('/users/{id}/delete', 'UsersController@destroy');
  ##################################### End Users Routes ############################################

  ##################################### Start Citys Routes ###########################################
    Route::resource('citys', 'CitysController');
    Route::get('/citys/{id}/delete', 'CitysController@destroy');
  ##################################### End Citys Routes ##############################################

  ##################################### Start About_Us Routes ###########################################
    Route::resource('about_us', 'About_UsController');
  ##################################### End About_Us Routes ##############################################

  ##################################### Start Car Type Routes ###########################################
    Route::resource('cars_type', 'Cars_TypeController');
    Route::get('/cars_type/{id}/delete', 'Cars_TypeController@destroy');
  ##################################### End Car Type Routes ##############################################

  ##################################### Start Car Type Routes ###########################################
    Route::resource('car_models', 'Car_ModelsController');
    Route::get('/car_models/{id}/delete', 'Car_ModelsController@destroy');
  ##################################### End Car Type Routes ##############################################

  ##################################### Start Years Routes ###########################################
    Route::resource('years', 'YearsController');
    Route::get('/years/{id}/delete', 'YearsController@destroy');
  ##################################### End Years Routes ##############################################



  ##################################### Start Offers Routes ###########################################
    Route::resource('ads', 'AdsController');
    Route::get('/ads/{id}/delete', 'AdsController@destroy');
    Route::post('ads/{id}/activate','AdsController@activate');
    Route::post('ads/{id}/deactivate','AdsController@deactivate');
    Route::get('ads/{id}/del_img','AdsController@del_img')->name('del_img');
    Route::resource('images', 'ImageController');
  ##################################### End Offers Routes ##############################################






  });
  });
