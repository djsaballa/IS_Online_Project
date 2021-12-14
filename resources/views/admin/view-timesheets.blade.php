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
            <img class="text-center" src="https://scontent.fmnl9-3.fna.fbcdn.net/v/t1.15752-9/262305527_426710942357529_7743025437953405122_n.png?_nc_cat=106&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeEgv9Cm0JpyYTnYeLC-R2zHDIETr2mh02QMgROvaaHTZFI_uaU6uazdUddTvkmhKGk&_nc_ohc=QkeCIfvR54AAX_NyBQL&_nc_ht=scontent.fmnl9-3.fna&oh=7fd81b0deea6d100b1b480514230c18e&oe=61CDCBD3" alt="My test image">
          </div>
          <h5 style="text-align: center;">Attendance Management System</h5>
        </div>

        <ul class="lisst-unstyled components">
          <li>
            <a href="{{ route('admin_view_employees') }}" >
            <span><i class="fas fa-users" style="margin-left:30px;"></i></span> View Employees</a>
          </li>
          <li>
            <a href="{{ route('admin_todays_timesheet') }}">
            <span><i class="fas fa-calendar-day" style="margin-left:30px;"></i></span> Today's Timesheet</a>
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
            <button type="button" id="sidebarCollapse" class="btn btn-outline-info">
              <i class="fa fa-align-left"></i>
            </button>
            <div id="up">
              <span style="margin-left:-450px;"><i class="far fa-calendar-alt" style="margin-right:5px; font-size:19px"></i></span>View Timesheets</a>
            </div>	
            <div id="admin">
              <span> Administrator </span> <img style="width:25px; height:25px; " src="https://png.pngitem.com/pimgs/s/4-40070_user-staff-man-profile-user-account-icon-jpg.png" 
                alt="Avatar">
            </div>
          </div>
        </nav>

        <br><br>

        <div class="wrap">

          <h1>{{ $employee_info->getFirstLast() }}'s Timesheets</h1>
          
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