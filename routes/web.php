<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/staff', 'StaffController');
Route::get('/staff/destroy/{id}', 'StaffController@destroy')->name('s.destroy');


Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function(){
    Route::match(['get', 'post'], '/adminOnlyPage/', 'AdminController@index');

    Route::resource('/staff', 'StaffController');
    Route::get('/staff/destroy/{id}', 'StaffController@destroy')->name('s.destroy');

    Route::resource('/agent', 'AgentController');
    Route::get('/agent/destroy/{id}', 'AgentController@destroy')->name('a.destroy');

    Route::resource('/facility', 'FacilitiesController');
    Route::get('/facility/destroy/{id}', 'FacilitiesController@destroy')->name('f.destroy');

    Route::resource('/vehicleType', 'VehicleTypeController');
    Route::get('/vehicleType/destroy/{id}', 'VehicleTypeController@destroy')->name('v.destroy');

    Route::get('status{id}', 'HomeController@status')->name('status');
});
