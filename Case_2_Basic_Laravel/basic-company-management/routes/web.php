<?php

use App\Models\Company;
use GuzzleHttp\Psr7\Request;
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

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('/company', 'CompanyController');

    Route::resource('/company', 'CompanyController');
    Route::group(['prefix' => 'export', 'as' => 'export.'], function(){
        Route::get('/companies', 'ExportController@companies')->name('companies');
        Route::get('/employees', 'ExportController@employees')->name('employees');
    });
    
    Route::resource('/employee', 'EmployeeController');
    Route::post('/company/import', 'ImportController@company')->name('company.import');
    Route::post('/employee/import', 'ImportController@employee')->name('employee.import');
    Route::get('/get-companies', 'CompanyController@getCompanies');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
