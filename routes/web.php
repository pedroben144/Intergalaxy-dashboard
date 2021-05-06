<?php

use App\Http\Controllers\WorkHoursController;
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

Route::get('/employees', [WorkHoursController::class, 'index'])->name('employees.index')->middleware('auth');
Route::get('/employees/create', [WorkHoursController::class, 'create'])->name('employees.ceate');
Route::post('/employees', [WorkHoursController::class, 'store'])->name('employees.store');
Route::get('/employees/hours', [WorkHoursController::class, 'indexAllHours'])->name('employees.indexTotalHours')->middleware('auth');
Route::get('/employees/hours/{period}', [WorkHoursController::class, 'showPeriodHours'])->name('employees.showHoursPerPeriod')->middleware('auth');
Route::get('/employees/{id}', [WorkHoursController::class, 'show'])->name('employees.show')->middleware('auth');
Route::get('/pdf/{email}', [WorkHoursController::class, 'createPDF'])->middleware('auth');

Route::delete('/employees/{id}', [WorkHoursController::class, 'destroy'])->name('employees.destroy')->middleware('auth');
Route::get('/employee-hours/{email}', [WorkHoursController::class, 'showAllFromEmployee'])->name('employees.showAllOfEmployee')->middleware('auth');

Auth::routes([
    'register' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
