    <?php session_start(); ?>

    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

        <title>Alumni System</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <style>
            * {
                padding: 0px;
                margin: 0px;
            }
        </style>
    </head>

    <body>


        <div class="container-fluid" style="background-color:#336699;">
            <div class="row">
                <div class="col-md-12">
                    <div id="header">
                        <img src="images/logo2.png" class="d-none d-sm-block img img-responsive">
                        <h1 class="sitename">Alumni System</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <h2 class="bg-info" style="color:#fff;font-family:geogia;text-align:center;">Alumni Login</h2>
                    <form action="index.php" name="f1" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Enter Username" class="form-control pl-5" style="background-image: url('images/userlogor.png'); background-repeat: no-repeat;background-position:left center;" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter Password" class="form-control pl-5" style="background-image: url('images/passeordLogo1.png'); background-repeat: no-repeat;background-position:left center;" required>
                        </div>
                        <center>
                            <div class="form-group">
                                <input type="submit" name="login" value="Sign In" class="btn btn-success btn-lg mt-3">
                                <a href="student_details.php" class="btn btn-success btn-lg mt-3">Registration</a>
                            </div>
                        </center>
                    </form>
                </div>

                <div class="col-md-4">
                </div>
            </div>
        </div>

    </body>

    </html>
    <?php
    include 'db.php';
    if (isset($_REQUEST["login"])) {
        $user = $_REQUEST["username"];
        $pass = $_REQUEST["password"];

        $q = "SELECT * from student_details where username='$user' and password='$pass'";

        $result = mysqli_query($con, $q);

        if (mysqli_affected_rows($con) > 0) {
            //echo "ankii";
            $row = mysqli_fetch_array($result);
            $_SESSION["name"] = $row["sname"];
            $_SESSION["uname"] = $row["username"];
            $_SESSION["branch"] = $row["branch"];
            $_SESSION["rollNo"]=$row["rollno"];
            header("Location:home.php");
        } else
         {
            echo "<p class='text-white bg-danger'>Invalid Username And Password</p>";
        }
    }
    ?>