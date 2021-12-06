<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hima Corps Inc. | Attendance Monitoring System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{url('css/app.css')}}" >
  </head>

  <body id="body" style="background-image: url(https://images.pexels.com/photos/323705/pexels-photo-323705.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);">
    <div id="login-card" class="card">
      <div class="card-body">
        <div class="logo">
            <img class="text-center" src="https://scontent.fmnl9-3.fna.fbcdn.net/v/t1.15752-9/262305527_426710942357529_7743025437953405122_n.png?_nc_cat=106&ccb=1-5&_nc_sid=ae9488&_nc_eui2=AeEgv9Cm0JpyYTnYeLC-R2zHDIETr2mh02QMgROvaaHTZFI_uaU6uazdUddTvkmhKGk&_nc_ohc=QkeCIfvR54AAX_NyBQL&_nc_ht=scontent.fmnl9-3.fna&oh=7fd81b0deea6d100b1b480514230c18e&oe=61CDCBD3" alt="My test image">
        </div>
        <div class="title"> Welcome </div>
        <div class="sub-title"> Please enter your email and password to continue </div>

        <br>
        
        <form method="POST" action="{{ route('employee_login_auth') }}">
          @csrf
          <div class="form-group">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            <span class="error" style="color: red;">@error('email'){{ $message }} @enderror</span>
            <span class="error" style="color: red;">{{ Session::get('failEmail') }}</span>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            <span class="error" style="color: red;">@error('password'){{ $message }} @enderror</span>
            <span class="error" style="color: red;">{{ Session::get('failPass') }}</span>
          </div>
          <button type="submit" id="button" class="btn btn-primary btn-block ">Submit</button>
            <br>
            <br>
        </form>

      </div>
    </div>
  </body>    
</html> 
