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
    <link rel="stylesheet" href="{{url('css/password.css')}}">
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
              <button type="button" id="sidebarCollapse" class="btn btn-outline-info btn-up">
                <i class="fa fa-align-left"></i>
              </button>
            <div id="up">
              <span style="margin-left:-450px;"><i class="fas fa-lock"style="margin-right:5px; font-size:19px"></i></span>Change Password</a>
            </div>	
            <div id="admin">
              <span> Administrator </span> <img style="width:25px; height:25px; " src="https://png.pngitem.com/pimgs/s/4-40070_user-staff-man-profile-user-account-icon-jpg.png" 
                alt="Avatar">
            </div>
          </div>
        </nav>

        <br><br>

          
        <div class="wrap">
            <div class="box">
                <div > 
                    <span  style="color:white; font-weight: 500; font-size:larger;">Change Password</span>
                </div>
                @foreach ($errors->all() as $error)
                  <li class="text-danger text-md-center">{{ $error }}</li>
                @endforeach 
                <div class="form">
                    <form method="POST" action="{{ route('admin_update_password') }}">
                      @csrf
                      <input type="hidden" id="employee_id" name="employee_id" value="{{ $employee_info->getId() }}">

                        <div class="form-group">
                          <label for="fname" style="font-weight: bold;">Name: {{ $employee_info->getFirstLast() }}</label>
                        </div>
                        <div class="form-group">
                          <label for="fname" style="font-weight: bold;">New Password:</label>
                          <input type="username" class="form-control" id="new_password"  name="new_password">
                        </div>
                        <div class="form-group">
                          <label for="fname" style="font-weight: bold;">Confirm Password:</label>
                          <input type="password" class="form-control" id="new_confirm_password" name="new_confirm_password">
                        </div>
                        <button type="submit" id="button" class="btn btn-primary btn-block " >Update Password</button>
                           
                    </form>
                </div>
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