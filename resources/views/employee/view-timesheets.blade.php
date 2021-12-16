<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Hima Corps Inc. | Attendance Management System</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
			integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
			crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
			crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
			crossorigin="anonymous"></script>
			<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{url('css/timesheets.css')}}">
	</head>

  <body>

    <div class="wrapper">

      <nav id="sidebar">

        <div class="sidebar-header">
          <div class="logo">
            <img src="{{url('/images/logo.png')}}" alt="Image"/>
          </div>
          <h5 style="text-align: center;"> Attendance Management System</h5>
        </div>
        
        <ul class="lisst-unstyled components">
          <li>
            <a href="{{ route('employee_take_attendance', $employee_info->id) }}" >
            <span><i class="fas fa-user-clock" style="margin-left:30px;"></i></span> Take Attendance</a>
          </li>
          <li>
            <a href="{{ route('employee_view_timesheets', $employee_info->id) }}">
            <span><i class="fas fa-calendar-week" style="margin-left:30px; width: 10px; margin-right:10px;"></i></span> View Timesheets</a>
          </li>
        </ul>
        <div class="sidebar-bottom">	
          <div class="logout">
            <a href="/">
            <i class="fas fa-sign-out-alt" style="margin-left:30px; "></i> Logout</a>
          </div>
        </div>
      </nav>

      <div id="content">

        <nav class="navbar bg-light">
          <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-outline-info">
              <i class="fa fa-align-left"></i>
            </button>
            <div id="up">
              <span style="margin-left:-450px;"><i class="far fa-calendar-alt" style="margin-right:5px; font-size:19px"></i></span>View Timesheets</a>
            </div>	
            <div id="admin">
              <span> {{ $employee_info->getFirstLast() }} </span> <img style="width:50px; height:30px; " src="https://image.pngaaa.com/583/3999583-middle.png" 
                alt="Avatar">
            </div>
          </div>
        </nav>

        <br><br>
        
        @if (Session::has('alert-successful'))
            <div class="alert alert-success" role="alert" style="text-align:center;">{!! Session::get('alert-successful') !!}</div>
        @endif

        @if (Session::has('alert-unsuccessful'))
            <div class="alert alert-danger" role="alert" style="text-align:center;">{!! Session::get('alert-unsuccessful') !!}</div>
        @endif

        <div class="wrap">

          <h1>Timesheets</h1>
          
          <table id="table_id" class="display table">
            <thead>
              <tr>
                <th>Date </th>
                <th>Time in</th>
                <th>Lunch Start</th>
                <th>Lunch End</th>
                <th>Time out</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($employee_timesheets as $employee_timesheet)
              <tr>
                <td>{{ $employee_timesheet->date }}</td>
                <td>{{ $employee_timesheet->time_in }}</td>
                <td>{{ $employee_timesheet->lunch_start }}</td>
                <td>{{ $employee_timesheet->lunch_end }}</td>
                <td>{{ $employee_timesheet->time_out }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

      <script>

        $(document).ready(function () {
          $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
          });
        });

        $(document).ready( function () {
            $('#table_id').DataTable();
        } );

      </script>

  </body>

</html>