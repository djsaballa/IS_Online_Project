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
    <link rel="stylesheet" href="{{url('css/attendance.css')}}">
	</head>

  <body>

    <div class="wrapper">

        <nav id="sidebar">

          <div class="sidebar-header">
            <div class="logo">
              <img class="text-center" src="https://scontent.fmnl9-3.fna.fbcdn.net/v/t1.15752-9/262305527_426710942357529_7743025437953405122_n.png?_nc_cat=106&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeEgv9Cm0JpyYTnYeLC-R2zHDIETr2mh02QMgROvaaHTZFI_uaU6uazdUddTvkmhKGk&_nc_ohc=QkeCIfvR54AAX_NyBQL&_nc_ht=scontent.fmnl9-3.fna&oh=7fd81b0deea6d100b1b480514230c18e&oe=61CDCBD3" alt="My test image">
            </div>
            <h5 style="text-align: center;">Admin Attendance Management System</h5>
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
              <span style="margin-left:-450px;"><i class="fas fa-user-clock" style="margin-right:5px; font-size:19px"></i></span>Take Attendance</a>
            </div>	
            <div id="admin">
              <span> Melrose Cortes </span> <img style="width:50px; height:30px; " src="https://image.pngaaa.com/583/3999583-middle.png" 
                alt="Avatar">
            </div>
          </div>
        </nav>

        <br><br>

          
        <div class="wrap">
            <h1>Saturday, December 12, 2021</h1>     
            <div style="margin-left: 100px;" id="input">
              <h5 style="text-align: left; margin-top: 20px; margin-bottom: 10px;">Start Working</h5>
              <span style="margin-left:20px;">
                <button type="button" class="btn btn-primary"  style="margin-left:12px;">Clock in</button>
                <button type="button" class="btn btn-success"  style="margin-left:12px;">Clock out</button>
              </span>
              <span class="left" style="margin-left: 150px;">
                <input type="time" id="timepicker1" >
                <input type="time" id="timepicker2" >
              </span>
            </div>

            <div style="margin-left: 100px;" id="input1">
              <h5 style="text-align: left; margin-top: 30px; margin-bottom: 10px;">Lunch Break</h5>
              <span id="span" style="margin-left:20px;"></span>
                <button type="button" class="btn btn-primary" style="margin-left:8px;">Lunch in</button>
                <button type="button" class="btn btn-success"  style="margin-left:8px;">Lunch out</button>
            </span>
              <span class="left" style="margin-left: 150px;">
                <input type="time" id="timepicker3" >
                <input type="time" id="timepicker4" >
              </span>
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