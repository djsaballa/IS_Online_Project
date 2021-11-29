 <!DOCTYPE html>
    <html lang="en">

      <head>
        <title>Admin Login Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" />

        <style>
            
        #body {
            margin: 0;
            padding: 0;
            font-family: 'Open Sans';
            background-image: url(https://scontent.fsfs2-1.fna.fbcdn.net/v/t39.30808-6/262025739_3023929154512549_7443424912694815689_n.jpg?_nc_cat=109&ccb=1-5&_nc_sid=730e14&_nc_eui2=AeE-88OGaXHB48OgTEdls2FhcAmJeaBeLedwCYl5oF4t5wSzEQy2bnQTuQ0gp7oKhzV8tp-VIJnZWQzfF5i5a-sO&_nc_ohc=FOeIJ8Z_dAMAX9FdnxI&_nc_ht=scontent.fsfs2-1.fna&oh=2c5ff139643a83806feae3bb391ccbac&oe=61A7E1BD);
            background-repeat: no-repeat;
            background-size: cover;
        }

        #login-card {
            width: 400px;
            border-radius: 15px;
            margin: 100px auto;
            opacity: .9;


        }

        #email {
            border-radius: 2px;
            background-color: #FFF;
            border-color: #7BB9FA;
        }


        #btn {
            position: absolute;
            padding: 5px;
            margin: auto;
            align-items: center;
            border-radius: 5px;
        }

        h1,
        h5 {
            color: #25438C;
        }

        .logo {
            width: 250px;
            height: 220px;
            margin: 0 auto;
        }

        .logo img {
            width: 100%;
        }

        .sub-title,
        .title {
            text-align: center;
            color: #25438C;
        }

        .title {
            font-weight: bolder;
            font-size: 35px;
        }

        </style>

      </head>

      <body id="body">


        <div id="login-card" class="card">
          <div class="card-body">
            <div class="logo">
              <img class="text-center" src="https://scontent.fsfs2-1.fna.fbcdn.net/v/t39.30808-6/261847691_3023896437849154_1695749081921643359_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=730e14&_nc_eui2=AeFzSjLBQiqs7YkfzyjumihQcueJC-19iC1y54kL7X2ILWxEGEagQFzZ3SaA8JH5LB83dzrFRGDc-o4xIUyz6YH2&_nc_ohc=_4UyVzDQiVEAX-LD_7R&_nc_ht=scontent.fsfs2-1.fna&oh=db442c2a5385e11350c8f02e3e5aabaf&oe=61A97042" alt="My test image">
            </div>
            <div class="title"> Welcome Admin! </div>
            <div class="sub-title"> Please enter your email and password to continue </div>

            <br>
            <form action="/action_page.php">
              <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="email" placeholder="Password" name="pswd">
              </div>
              <button type="submit" id="button" class="btn btn-primary btn-block ">Submit</button>
              <br>
              <br>


            </form>
          </div>

        </div>

      </body>

    </html>
