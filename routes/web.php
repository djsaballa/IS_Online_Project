<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;


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

// ADMIN 
Route::get('/admin', function () {
    return view('/admin/login');
});
    // login auth
    Route::post('/admin-login-auth', [AdminController::class, 'loginAuth'])->name('admin_login_auth');
    // view employees
    Route::get('/admin-view-employees', [AdminController::class, 'viewEmployees'])->name('admin_view_employees');
    // view timesheets
    Route::get('/admin-view-timesheets/{employee_id}', [AdminController::class, 'viewTimesheets'])->name('admin_view_timesheets');
    // change password
    Route::get('/admin-change-password/{employee_id}', [AdminController::class, 'changePassword'])->name('admin_change_password');
    Route::post('/admin-update-password', [AdminController::class, 'updatePassword'])->name('admin_update_password');
    // today's timesheets
    Route::get('/admin-todays-timesheet', [AdminController::class, 'todaysTimesheet'])->name('admin_todays_timesheet');

// EMPLOYEE
Route::get('/', function () {
    return view('/employee/login');
});
     // login auth
     Route::post('/employee-login-auth', [EmployeeController::class, 'loginAuth'])->name('employee_login_auth');
     // view employees
     Route::get('/employee-view-timesheets', [EmployeeController::class, 'viewTimesheets'])->name('employee_view_timesheets');





