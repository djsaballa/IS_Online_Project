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
    // edit timesheet
    Route::get('/edit-timesheet/{id}', [AdminController::class, 'editTimesheet'])->name('admin_edit_timesheet');
    Route::post('/update-timesheet', [AdminController::class, 'updateTimesheet'])->name('admin_update_timesheet');
    // delete timesheet
    Route::post('/admin-delete-timesheet', [AdminController::class, 'deleteTimesheet'])->name('admin_delete_timesheet');
    // change password
    Route::get('/admin-change-password/{employee_id}', [AdminController::class, 'changePassword'])->name('admin_change_password');
    Route::post('/admin-update-password', [AdminController::class, 'updatePassword'])->name('admin_update_password');
    // today's timesheets
    Route::get('/admin-todays-timesheet', [AdminController::class, 'todaysTimesheet'])->name('admin_todays_timesheet');
    // contact us
    Route::get('/admin-contact-us', [AdminController::class, 'contactUs'])->name('admin_contact_us');


// EMPLOYEE
Route::get('/', function () {
    return view('/employee/login');
});
     // login auth
     Route::post('/employee-login-auth', [EmployeeController::class, 'loginAuth'])->name('employee_login_auth');
     // view employees
     Route::get('/employee-view-timesheets/{employee_id}', [EmployeeController::class, 'viewTimesheets'])->name('employee_view_timesheets');
     // take attendance
     Route::get('/employee-take-attendance/{employee_id}', [EmployeeController::class, 'takeAttendance'])->name('employee_take_attendance');
        // time in
        Route::post('/employee-time-in/{employee_id}', [EmployeeController::class, 'publishTimeIn'])->name('employee_time_in');
        // time out
        Route::post('/employee-time-out/{employee_id}', [EmployeeController::class, 'publishTimeOut'])->name('employee_time_out');
        // lunch start
        Route::post('/employee-lunch-start/{employee_id}', [EmployeeController::class, 'publishLunchStart'])->name('employee_lunch_start');
        // lunch end
        Route::post('/employee-lunch-end/{employee_id}', [EmployeeController::class, 'publishLunchEnd'])->name('employee_lunch_end');
    // contact us
    Route::get('/employee-contact-us/{employee_id}', [EmployeeController::class, 'contactUs'])->name('employee_contact_us');

