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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/company', 'CompanyController');
Route::group(['prefix' => 'export', 'as' => 'export.'], function(){
    Route::get('/companies', 'ExportController@companies')->name('companies');
    Route::get('/employees', 'ExportController@employees')->name('employees');
});
Route::resource('/employee', 'EmployeeController');
Route::get('/dataforselect2', 'CompanyController@getdataforselect2')->name('dataforselect2');
