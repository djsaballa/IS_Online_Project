<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Timesheet;
use Carbon\Carbon;
use Session;


class EmployeeController extends Controller
{
    // login auth
    public function loginAuth(Request $request)
    {
        $request->validate ([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $login_info = Employee::where('email', '=', $request->email)->first();
        $employee_id = $login_info->id;

        if(!$login_info){
            return back()->with('failEmail','Email not recognized');
        }else{
            //check password
            if($request->password != $login_info->password){
                return back()->with('failPass','Incorrect password');
            }else{
                return redirect(route('employee_view_timesheets', $employee_id));
            }
        }
    }

    // view timesheets
    public function viewTimesheets($employee_id)
    {
        $employee_info = Employee::where('id', '=', $employee_id)->first();
        $employee_timesheets = Timesheet::where('employee_id', $employee_id)->get();
        
        return view(('employee.view-timesheets'), compact('employee_timesheets', 'employee_info'));
    }

    // take attendance
    public function takeAttendance($employee_id)
    {
        $dt = Carbon::now('Asia/Manila');
        $date = $dt->format('Y-m-d');

        $today = $dt->format('l, F j,  Y');
        $employee_info = Employee::where('id', '=', $employee_id)->first();
        $timesheet = Timesheet::where('date', $date)->where('employee_id', $employee_id)->first();

        return view(('employee.take-attendance'), compact('timesheet', 'employee_info', 'today'));
    }

    // time in
    public function publishTimeIn(Request $request)
    {
        $employee_id = $request-> employeeId;
        $dt = Carbon::now('Asia/Manila');
        $date = $dt->format('Y-m-d');
        $time = $dt->format('H:i:s');

        $exist = Timesheet::where('date', $date)->where('employee_id', $employee_id)->first();

        if(is_null($exist)) {
            $timesheet = Timesheet::create([
                'employee_id' => $employee_id,
                'date' => $date,
                'time_in' => $time,
            ]);
            if($timesheet) {
                Session::flash('alert-successful', 'You have successfully timed in.');

                $today = $dt->format('l, F j,  Y');
                $employee_info = Employee::where('id', '=', $employee_id)->first();
                $employee_timesheets = Timesheet::where('employee_id', $employee_id)->get();

                return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today'));
            } else {
                Session::flash('alert-unsuccessful', 'Unsuccessfully timed in.');
    
                $today = $dt->format('l, F j,  Y');
                $employee_info = Employee::where('id', '=', $employee_id)->first();
                $employee_timesheets = Timesheet::where('employee_id', $employee_id)->get();

                return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today'));            
            }
        } else {
            Session::flash('alert-unsuccessful', 'You have already timed in.');

            $today = $dt->format('l, F j,  Y');
            $employee_info = Employee::where('id', '=', $employee_id)->first();
            $employee_timesheets = Timesheet::where('employee_id', $employee_id)->get();

            return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today'));        
        }
    }

    // time out
    public function publishTimeOut(Request $request) 
    {
        $employee_id = $request-> employeeId;
        $dt = Carbon::now('Asia/Manila');
        $date = $dt->format('Y-m-d');
        $time = $dt->format('H:i:s');

        $exist = Timesheet::where('date', $date)->where('employee_id', $employee_id)->first();
        $exist_time_in = $exist->getTimeIn();
        $exist_time_out = $exist->getTimeOut();

        $today = $dt->format('l, F j,  Y');
        $employee_info = Employee::where('id', '=', $employee_id)->first();
        $employee_timesheets = Timesheet::where('employee_id', $employee_id)->get();

        if(!is_null($exist_time_in)) {
            if(is_null($exist_time_out)) {
                $update = $exist->update(['time_out' => $time]);
                if($update) {
                    Session::flash('alert-successful', 'You have successfully timed out.');
                    return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today'));
                } else {
                    Session::flash('alert-unsuccessful', 'Unsuccessful time out.');    
                    return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today')); 
                }
            } else {
                Session::flash('alert-unsuccessful', 'You have already timed out.');
                return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today')); 
            }
        } else {
            Session::flash('alert-unsuccessful', 'You have not yet timed in.');
            return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today')); 
        }
    }

    // lunch start
    public function publishLunchStart(Request $request) 
    {
        $employee_id = $request-> employeeId;
        $dt = Carbon::now('Asia/Manila');
        $date = $dt->format('Y-m-d');
        $time = $dt->format('H:i:s');

        $exist = Timesheet::where('date', $date)->where('employee_id', $employee_id)->first();
        $exist_time_in = $exist->getTimeIn();
        $exist_lunch_start = $exist->getLunchStart();

        $today = $dt->format('l, F j,  Y');
        $employee_info = Employee::where('id', '=', $employee_id)->first();
        $employee_timesheets = Timesheet::where('employee_id', $employee_id)->get();

        if(!is_null($exist_time_in)) {
            if(is_null($exist_lunch_start)) {
                $update = $exist->update(['lunch_start' => $time]);
                if($update) {
                    Session::flash('alert-successful', 'You have successfully started your lunch break.');
                    return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today'));
                } else {
                    Session::flash('alert-unsuccessful', 'Unsuccessfully started your lunch break.');
                    return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today')); 
                }
            } else {
                Session::flash('alert-unsuccessful', 'You have already started your lunch break.');
                return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today')); 
            }
        } else {
            Session::flash('alert-unsuccessful', 'You have not yet timed in.');
            return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today')); 
        }
    }

    // lunch end
    public function publishLunchEnd(Request $request) 
    {
        $employee_id = $request-> employeeId;
        $dt = Carbon::now('Asia/Manila');
        $date = $dt->format('Y-m-d');
        $time = $dt->format('H:i:s');

        $exist = Timesheet::where('date', $date)->where('employee_id', $employee_id)->first();
        $exist_lunch_start = $exist->getLunchStart();
        $exist_lunch_end = $exist->getLunchEnd();

        $today = $dt->format('l, F j,  Y');
        $employee_info = Employee::where('id', '=', $employee_id)->first();
        $employee_timesheets = Timesheet::where('employee_id', $employee_id)->get();

        if(!is_null($exist_lunch_start)) {
            if(is_null($exist_lunch_end)) {
                $update = $exist->update(['lunch_end' => $time]);
                if($update) {
                    Session::flash('alert-successful', 'You have successfully ended your lunch break.');
                    return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today'));
                } else {
                    Session::flash('alert-unsuccessful', 'Unsuccessfully ended your lunch break.');
                    return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today')); 
                }
            } else {
                Session::flash('alert-unsuccessful', 'You have already ended your lunch break.');
                return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today')); 
            }
        } else {
            Session::flash('alert-unsuccessful', 'You have not yet timed in.');
            return view(('employee.view-timesheets'), compact('employee_info', 'employee_timesheets', 'today')); 
        }
    }

    // contact us
    public function contactUs($employee_id)
    {
        $employee_info = Employee::where('id', '=', $employee_id)->first();
        $employee_timesheets = Timesheet::where('employee_id', $employee_id)->get();
        
        return view(('employee.contact-us'), compact('employee_timesheets', 'employee_info'));
    }
}
