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
</head>

<body>
    
<div class="container-fluid" style="background-color:#336699;">
            <div class="row">
                <div class="col-md-12">
                    <div id="header">
                        <img src="images/logo2.png" class="d-none d-sm-block img img-responsive">
                        <h1 class="sitename">BIT Alumni System</h1>
                    </div>
                </div>
            </div>
        </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <h2 class="bg-info" style="color:#fff;font-family:geogia;text-align:center;">Head Of Departement's Login</h2>
                <form action="hodlogin.php" name="f1" method="post">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Enter Username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" value="Sign In" class="btn btn-success btn-lg d-block mx-auto">
                    </div>
                </form>
            </div>

            <div class="col-md-4">
            </div>
        </div>
    </div>


    <?php
    include 'db.php';
    if (isset($_REQUEST["login"])) {
        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];

        $q = "select * from hod_details where hod_username='" . $username . "' and hod_password='" . $password . "'";

        $result = mysqli_query($con, $q);
        $row = mysqli_fetch_array($result);

        if (mysqli_affected_rows($con) > 0) {

            $_SESSION["hodname"] = $row["hod_name"];
            $_SESSION["department"] = $row["department"];

            header("Location:hodhome.php");
        } else {
            echo "<p class='text-white bg-danger'>Invalid Username And Password</p>";
        }
    }
    ?>
    </div>
</body>

</html>