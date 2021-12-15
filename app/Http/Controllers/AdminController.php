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

    // delete timesheet
    public function deleteTimesheet(Request $request)
    {
        $delete = Timesheet::find($request->id)->delete();   
        if ($delete) {
            Session::flash('alert-succesful', 'Timesheet has been successfully deleted.');
            return response()->json("success");
        } else {
            Session::flash('alert-unsuccesful', 'An error has occurred, timesheet has not been deleted.');
            return response()->json("no success");
        }
    }

    // edit timesheet
    public function editTimesheet($id)
    {   
        $timesheet_data = Timesheet::find($id);
        $employee_id = Timesheet::find($id)->employee->getId();
        $employee_name = Timesheet::find($id)->employee->getFirstLast();

        return view('admin.edit-timesheet', compact('timesheet_data', 'employee_id', 'employee_name'));
    }

    // update timesheet
    public function updateTimesheet(Request $request)
    {   
        $request->validate([
            'date' => 'nullable|date_format:Y-m-d',
            'timeIn' => 'nullable|date_format:H:i:s',
            'timeOut' => 'nullable|date_format:H:i:s',
            'lunchStart' => 'nullable|date_format:H:i:s',
            'lunchEnd' => 'nullable|date_format:H:i:s',
        ],
        [
            'date.date_format' => 'Incorrect date format, the format must be as follows: YYYY-MM-DD',
            'timeIn.date_format' => 'Incorrect time format for Time In, the format must be as follows: HH:MM:SS',
            'timeOut.date_format' => 'Incorrect time format for Time Out, the format must be as follows: HH:MM:SS',
            'lunchStart.date_format' => 'Incorrect time format for Lunch Start, the format must be as follows: HH:MM:SS',
            'lunchEnd.date_format' => 'Incorrect time format for Lunch End, the format must be as follows: HH:MM:SS',
        ]);
        $timesheet_date = $request->date;
        $time_in = $request->timeIn;
        $time_out = $request->timeOut;
        $lunch_start = $request->lunchStart;
        $lunch_end = $request->lunchEnd;
        $timesheet_update = [
            'timesheet_date' => $timesheet_date,
            'time_in' => $time_in,
            'time_out' => $time_out,
            'lunch_start' => $lunch_start,
            'lunch_end' => $lunch_end,
        ];
        $employee_id = $request->employeeId;
        $timesheet_id = $request->timesheetId;

        if(!is_null($timesheet_id && $employee_id)) {
            $timesheet = Timesheet::find($timesheet_id);

            $timesheet->update($timesheet_update);
            if($timesheet->update($timesheet_update)) {
                Session::flash('alert-succesful', 'Timesheet has been successfully edited.');
                
                return redirect(route('admin_view_timesheets', $employee_id));        
            } else {
                Session::flash('alert-succesful', 'An error has occurred, timesheet has not been edited.');

                return redirect(route('admin_view_timesheets', $employee_id));        
            }
        } else {
            Session::flash('alert-succesful', 'An error has occurred, timesheet has not been edited.');

            return redirect(route('admin_view_timesheets', $employee_id));        
        }
    }

    // todays timesheets
    public function todaysTimesheet()
    {  
        $today = Carbon::now('Asia/Manila')->format("Y-m-d");
        $timesheets_today = Timesheet::where('date', "=", $today)->get(); 

        return view(('admin.todays-timesheet'), compact('timesheets_today'));
    }
}
