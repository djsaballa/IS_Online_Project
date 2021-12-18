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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{url('css/password.css')}}">
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
          <span><i class="fas fa-users" style="margin-left:30px;"></i></span> View Employees</a>
        </li>
        <li>
          <a href="{{ route('admin_todays_timesheet') }}">
          <span><i class="fas fa-calendar-day" style="margin-left:30px;"></i></span> Today's Timesheet</a>
        </li>
        <li>
            <a href="{{ route('admin_contact_us') }}">
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
              <img style="width: 25px; height: 25px; margin-left: -450px;" src="https://www.iconpacks.net/icons/2/free-contact-icon-3018-thumb.png"><span style="margin-left: 5px;">Contact Us</span>
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
                    <span  style="color:white; font-weight: 500; font-size:larger;">Get in touch</span>
                </div>
                <div class="form">
                
                  <form >
                    <h6 style="margin-left: -70px; margin-right: -70px; margin-top: -15px; font-weight: bold; ">Questions, bug reports, feedback --- we&apos;re here for it all. Here&apos;s where you can reach us.</h6>
                    <div class="form-group">
                      <label for="fname" style="font-weight: bold; margin-top: 40px;">Email: <a href="mailto:siomai.corporation@gmail.com"> <span style="font-weight:lighter; margin-left: 20px;">siomai.corporation@gmail.com</span> </a> </label>
                    </div>
                    <div class="form-group">
                      <label for="fname" style="font-weight: bold;">Hotmail: <span style="font-weight:lighter; margin-left: 20px;">1900 1234</span></label>
                    </div>
                    <div class="form-group">
                      <label for="fname" style="font-weight: bold;">Social Media Accounts: <span style="margin-left: 10px; color: #3b5998;"><i class="fab fa-facebook-square" style="margin-right:5px; font-size:23px"></i> </span>
                        <span style=" margin-left: 3px; color: #00acee;"><i class="fab fa-twitter-square" style=" font-size:23px "></i> </span>
                      </label>
                    </div>
                         
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