<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Timesheet;

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
                return redirect(route('employee_view_timesheets'), compact('employee_id'));
            }
        }
    }

    // view timesheets
    public function viewTimesheets()
    {
        return view('employee.view-timesheets');
    }
}
