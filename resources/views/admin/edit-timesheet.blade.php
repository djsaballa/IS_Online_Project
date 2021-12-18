<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Hima Corps Inc. | Attendance Monitoring Systemt</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
			integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
			crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
			crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
			crossorigin="anonymous"></script>		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{url('css/edit-timesheet.css')}}">
	</head>

  <body>

    <div class="wrapper">

        <nav id="sidebar">

          <div class="sidebar-header">
            <div class="logo">
              <img src="{{url('/images/logo.png')}}" alt="Image"/>
            </div>
            <h5 style="text-align: center;">Attendance Management System</h5>
          </div>
          
          <ul class="lisst-unstyled components">
            <li>
              <a href="{{ route('admin_view_employees') }}" >
              <span><i class="fas fa-user-clock" style="margin-left:30px;"></i></span> Take Attendance</a>
            </li>
            <li>
              <a href="{{ route('admin_todays_timesheet') }}">
              <span><i class="fas fa-calendar-week" style="margin-left:30px; width: 10px; margin-right:10px;"></i></span> View Timesheets</a>
            </li>
            <li>
              <a href="#Today's Timesheet">
              <span><i class="fas fa-phone-square-alt" style="margin-left:30px;"></i></span> Contact Us</a>
            </li>
          </ul>
          <div class="sidebar-bottom">	
            <div class="logout">
              <a href="/admin/login">
              <i class="fas fa-sign-out-alt" style="margin-left:30px; "></i> Logout</a>
            </div>
          </div>
        </nav>

      <div id="content">

        <nav class="navbar bg-light">
            <div class="container-fluid">
              <button type="button" id="sidebarCollapse" class="btn btn-outline-info btn-up">
                <i class="fa fa-align-left"></i>
              </button>
            <div id="up">
              <span style="margin-left:-450px;"><i class="fas fa-edit" style="margin-right:5px; font-size:19px"></i></span>Edit Timesheet</a>
            </div>	
            <div id="admin">
              <span> Administrator </span> <img style="width:25px; height:25px; " src="https://png.pngitem.com/pimgs/s/4-40070_user-staff-man-profile-user-account-icon-jpg.png" 
                alt="Avatar">
            </div>
          </div>
        </nav>

        <br><br>

         
        <div class="wrap">
          <h1>Edit Timesheet</h1> 
          <div class="form-center">
              <form method="POST" action="{{ route('admin_update_timesheet') }}" style="margin-left: 250px;"> 
                @csrf
                <input type="hidden" id="employeeId" name="employeeId" value="{{ $employee_id }}" >
                <input type="hidden" id="timesheetId" name="timesheetId" value="{{ $timesheet_data->id }}" >

                  <div class="form-group row" >
                    <label for="staticEmail" class="col-sm-2 col-form-label" style="font-weight: bold;">Name: </label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="name" name="name" value="{{ $employee_name }}" >
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" style="font-weight: bold;">Date</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="date" name="date" style="width:250px;" value="{{ $timesheet_data->date }}"> 
                    </div>
                    <p class="error text-md-center" style="color: red;">@error('date'){{ $message }} @enderror</p>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" style="font-weight: bold; ;">Time&nbsp;in</label>
                    <div class="col-sm-10">
                      <input type="time" class="form-control" id="timeIn" name="timeIn" style="width:250px; " value="{{ $timesheet_data->time_in }}">
                    </div>
                    <p class="error text-md-center" style="color: red;">@error('timeIn'){{ $message }} @enderror</p>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" style="font-weight: bold;">Lunch&nbsp;Start</label>
                    <div class="col-sm-10"> 
                      <input type="time" class="form-control" id="lunchStart" name="lunchStart" style="width:250px; " value="{{ $timesheet_data->lunch_start }}">
                    </div>
                    <p class="error text-md-center" style="color: red;">@error('lunchStart'){{ $message }} @enderror</p>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-2 col-form-label" style="font-weight: bold;">Lunch&nbsp;End</label>
                    <div class="col-sm-10">
                      <input type="time" class="form-control" id="lunchEnd" name="lunchEnd" style="width:250px;" value="{{ $timesheet_data->lunch_end }}">
                    </div>
                    <p class="error text-md-center" style="color: red;">@error('lunchEnd'){{ $message }} @enderror</p>
                  </div>

                  <div class="form-group row ">
                    <label  class="col-sm-2 col-form-label" style="font-weight: bold;">Time&nbsp;out</label>
                    <div class="col-sm-10">
                      <input type="time" class="form-control" id="timeOut" name="timeOut" style="width:250px;" value="{{ $timesheet_data->time_out }}">
                    </div>
                    <p class="error text-md-center" style="color: red;">@error('timeOut'){{ $message }} @enderror</p>
                  </div>
                  <a href="{{ route('admin_view_timesheets', $employee_id) }}">
                    <button type="button"  class="btn btn-Secondary button1 ">Cancel</button>
                  </a>
                  <button type="submit"  class="btn btn-primary button  ">Save</button>
              </form>
            </div>
        </div>
      </div>
    </div>

      <script>

        $(document).ready(function () {
          $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
          });
        });
        
      </script>

  </body>

</html>