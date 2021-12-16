<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hima Corps Inc. | Attendance Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{url('css/app.css')}}">
  </head>

  <body id="body" style= "background-image: url(https://images.pexels.com/photos/3771097/pexels-photo-3771097.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);">
    <div id="login-card" class="card">
      <div class="card-body">
        <div class="logo">
            <img src="{{url('/images/logo.png')}}" alt="Image"/>
          </div>
        <div class="title"> Welcome, Admin! </div>
        <div class="sub-title"> Please enter your username and password to continue. </div>

        <br>

        <form method="POST" action="{{ route('admin_login_auth') }}">
          @csrf
          <div class="form-group">
            <input type="username" class="form-control" id="email" placeholder="Username" name="username">
            <span class="error" style="color: red;">@error('username'){{ $message }} @enderror</span>
            <span class="error" style="color: red;">{{ Session::get('failUser') }}</span>
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
