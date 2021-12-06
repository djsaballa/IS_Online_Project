<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\Timesheet;
use Carbon\Carbon;


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
        return view('admin.view-employees');
    }

    // todays timesheets
    public function todaysTimesheet()
    {  
        $today = Carbon::now()->format("Y-m-d");
        $timesheets_today = Timesheet::where('date', "=", $today)->get(); 

        return view(('admin.todays-timesheet'), compact('timesheets_today'));
    }
}
