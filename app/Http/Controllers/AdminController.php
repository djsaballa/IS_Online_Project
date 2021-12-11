<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\Timesheet;
use Carbon\Carbon;
use Session;


class AdminController extends Controller
{
    // login auth
    public function loginAuth(Request $request)
    {
        $request->validate ([
            'username' => 'required',
            'password' => 'required'
        ]);

        //check username
        if($request->username != "admin"){
            return back()->with('failUser','Incorrect username');
        }else{
            //check password
            if($request->password != "admin123"){
                return back()->with('failPass','Incorrect password');
            }else{
                return redirect(route('admin_view_employees')); 
            }
        }
    }

    // view employees
    public function viewEmployees()
    {
        $employees = Employee::all();
        return view(('admin.view-employees'), compact('employees'));
    }

    // change password
    public function changePassword($employee_id)
    {
        $employee = Employee::find($employee_id);
        $employee_info = Employee::where('id', $employee_id)->first();

        if (!is_null($employee)) {
            
            return view('admin.change-password', compact('employee_info'));
        } else {
            Session::flash('alert-warning', 'There is a problem in the resource that you are trying to access.');
            
            return redirect(route('admin_view_employees'));
        }
    }

    // update passsword
    public function updatePassword(Request $request)
    {
        {
            $request->validate([
                'new_password' => 'required|min:8',
                'new_confirm_password' => ['same:new_password'],
            ],
            [
                'new_password.required' => 'New Password is required',
                'new_confirm_password.required' => 'Confirm password is required',
                'new_confirm_password.same' => 'The passwords do not match',
            ]);
       
            $employee_id = $request->employee_id;
            if ($request->has('employee_id')) {

                $employee = Employee::where('id', $employee_id)->first();

                if (!is_null($employee)) {
                    $employee->update(['password'=> $request->new_password]);
                    Session::flash('alert-successful', 'Changed password successfully.');

                    return redirect(route('admin_view_employees'));
                } else { 
                    Session::flash('alert-unsuccessful', 'Password change is unsuccessful.');

                    return redirect(route('admin_view_employees'));
                }
            }
        }
    }

    // view timesheets
    public function viewTimesheets($employee_id)
    {
        $employee_info = Employee::where('id', '=', $employee_id)->first();
        $employee_timesheets = Timesheet::where('employee_id', $employee_id)->get();
        return view(('admin.view-timesheets'), compact('employee_timesheets', 'employee_info'));
    }

    // todays timesheets
    public function todaysTimesheet()
    {  
        $today = Carbon::now()->format("Y-m-d");
        $timesheets_today = Timesheet::where('date', "=", $today)->get(); 

        return view(('admin.todays-timesheet'), compact('timesheets_today'));
    }
}
