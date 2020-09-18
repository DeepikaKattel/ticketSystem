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



Route::get('/', 'BookTicketController@welcome');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sendMail', 'BookTicketController@store');

Route::get('/setLimit/{id}', 'PageController@setLimit')->name('set.setLimit');

Route::resource('/bookTicket', 'BookTicketController');
Route::get('/bookTicket/destroy/{id}', 'BookTicketController@destroy')->name('b.destroy');

Route::post('/bookTicket/check','BookTicketController@checkTicket');

Route::post('/tickets/check','TicketController@checkTicket');
Route::get('/tickets/book', 'TicketController@bookTicket');
Route::resource('tickets','TicketController');


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

    Route::resource('/vehicle', 'VehicleController');
    Route::get('/vehicle/destroy/{id}', 'VehicleController@destroy')->name('ve.destroy');

    Route::resource('/destination', 'DestinationController');
    Route::get('/destination/destroy/{id}', 'DestinationController@destroy')->name('de.destroy');

    Route::resource('/route', 'RouteController');
    Route::get('/route/destroy/{id}', 'RouteController@destroy')->name('r.destroy');

    Route::resource('/trip', 'TripController');
    Route::get('/trip/destroy/{id}', 'TripController@destroy')->name('t.destroy');

    Route::resource('/price', 'PriceController');
    Route::get('/price/destroy/{id}', 'PriceController@destroy')->name('p.destroy');

    Route::get('statusV{id}', 'VehicleController@status')->name('statusV');

    Route::get('statusd{id}', 'DestinationController@status')->name('statusd');

    Route::get('statusr{id}', 'RouteController@status')->name('statusr');

    Route::get('statust{id}', 'TripController@status')->name('statust');

    Route::get('statusb{id}', 'BookTicketController@status')->name('statusb');

    Route::get('status{id}', 'VehicleTypeController@status')->name('status');


});

Route::group(['middleware' => 'App\Http\Middleware\CustomerMiddleware'], function(){
    Route::match(['get', 'post'], '/customerOnlyPage/', 'CustomerController@index');
});
