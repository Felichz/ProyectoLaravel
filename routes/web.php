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

Route::resource('/expense_report', 'ExpenseReportController');

Route::get('/expense_report/{id}/confirmDelete', 'ExpenseReportController@confirmDelete');

Route::resource('/expense_report/{expense_report}/expense', 'ExpenseController', [
    'except' => [
        'index',
        'show'
    ]
]);

Route::get('/expense_report/{expense_report}/expense/{expense}/confirmDelete', 'ExpenseController@confirmDelete');