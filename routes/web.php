<?php

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
require __DIR__ . '/auth.php';

Route::redirect('/','login');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::resource('/users', 'UserController');
    Route::resource('/clients', 'ClientController');
    Route::resource('/courts', 'CourtController');
    Route::resource('/services', 'ServiceController');
    Route::resource('/cases', 'CaseController');
    Route::resource('/case/payments', 'CasePaymentsController',['as' => 'case']);

});


