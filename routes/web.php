<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeProfileController;

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

Route::get('/', [EmployeeProfileController::class, 'index'])->name('employee-profiles');
Route::get('/employee-profiles/create', [EmployeeProfileController::class, 'create']);
Route::post('/employee-profiles/create', [EmployeeProfileController::class, 'store']);
Route::patch('/employee-profiles/update/{id}', [EmployeeProfileController::class, 'update'])->name('employee.update');
Route::get('/employee-profiles/edit/{id}', [EmployeeProfileController::class, 'edit']);
Route::delete('/employee-profiles/delete/{id}', [EmployeeProfileController::class, 'delete'])->name('employee.delete');
