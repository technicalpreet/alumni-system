
<?php
if (isset($_REQUEST["btnsubmit"])) {
  $username = $_REQUEST["txtusername"];
  $password = $_REQUEST["txtpassword"];
  $rollno = $_REQUEST["txtrollno"];
  $sname = $_REQUEST["txtname"];
  $branch = $_REQUEST["txtbranch"];
  $batch = $_REQUEST["txtbatch"];
  $mobile = $_REQUEST["txtmobile"];
  $email = $_REQUEST["txtemail"];
  $gender = $_REQUEST["gender"];
  $dob = $_REQUEST["txtdob"];
  $fname = $_REQUEST["txtfname"];
  $addr = $_REQUEST["txtaddr"];
  $city = $_REQUEST["txtcity"];
  $state = $_REQUEST["txtstate"];
  $country = $_REQUEST["txtcountry"];

  $source = $_FILES["upfile"]["tmp_name"];
  $target = "uploads/" . $_FILES["upfile"]["name"];
  $imagename = $_FILES["upfile"]["name"];

  if (move_uploaded_file($source, $target)) {
    include 'db.php';
    $qry = "INSERT INTO student_details (username,password,rollno,sname,branch,batch,mobile,email,gender,dob,f_name,address,city,state,country,image) VALUES
 ('$username','$password','$rollno','$sname','$branch','$batch','$mobile','$email','$gender','$dob','$fname','$addr','$city','$state','$country','$imagename')";

    if (mysqli_query($con, $qry)) {
      echo "<script> alert('Record Saved'); </script>";
      header("location:index.php");
    } else {
      echo "Error" . mysqli_error($con);
    }
  } else {
    echo "<h1>Error in Uploading File</h1>";
  }
}

?>
<!doctype html>
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
  <div id="header">
    <img src="images/logo2.png">
    <h1 class="sitename">BIT Alumni System</h1>
  </div>

  <div class="container">
    <div class="row mt-1">
      
      <div class="col-md-12">
        <center>
          <h2 class="bg-info">Alumni Details Form</h2>
        </center>
        <form name="studentform" action="student_details.php" enctype="multipart/form-data" method="POST">
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="txtusername" class="form-control" value="" placeholder="Enter Username" required>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" name="txtpassword" class="form-control" value="" placeholder="Enter Password" required>
          </div>

          <div class="form-group">
            <label>Rollno</label>
            <input type="text" name="txtrollno" class="form-control" value="" placeholder="Enter Roll No." required>
          </div>

          <div class="form-group">
            <label>Alumni Name</label>
            <input type="text" name="txtname" class="form-control" value="" placeholder="Enter Name." required>
          </div>

          <div class="form-group">
            <label>Branch</label>
            <input type="text" name="txtbranch" class="form-control" value="" placeholder="Enter Branch" required>
          </div>


          <div class="form-group">
            <label for="inputAddress">Batch</label>
            <input type="text" class="form-control" name="txtbatch" id="inputAddress" placeholder="Enter Batch year" required>
          </div>


          <div class="form-group">
            <label>Mobile</label>
            <input type="number" name="txtmobile" class="form-control" value="" placeholder="Enter Mobile Number" required>
          </div>

          <div class="form-group">
            <label>Email</label>
            <input type="email" name="txtemail" class="form-control" value="" placeholder="Enter Email Address" required>
          </div>

          <div class="form-group">
            <label>Gender </label>
            <Input type="radio" name="gender" value="M" checked>Male
            <Input type="radio" name="gender" value="F">Female
          </div>

          <div class="form-group">DOB
            <input type="date" name="txtdob" value="">
          </div>


          <div class="form-group">
            <label for="inputAddress">Father's Name</label>
            <input type="text" class="form-control" name="txtfname" id="inputAddress" placeholder="Enter father's name">
          </div>

          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" name="txtaddr" id="inputAddress" placeholder="Enter Address">
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">City</label>
            <input type="text" class="form-control" name="txtcity" id="formGroupExampleInput" placeholder="Enter City">
          </div>

          <div class="form-group">
            <label for="formGroupExampleInput">State</label>
            <input type="text" class="form-control" name="txtstate" id="formGroupExampleInput" placeholder="Enter State">

          </div>
          <div class="form-group ">
            <label for="formGroupExampleInput">Country</label>
            <input type="text" class="form-control" name="txtcountry" id="formGroupExampleInput" placeholder="Enter Country">
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">Upload Image</label>
            <input type="file" name="upfile" class="form-control-file" id="exampleFormControlFile1">
          </div>
          
          <center>
          <div class="form-group">
            <input type="submit" name="btnsubmit" class="btn btn-success btn-lg" value="Save Details">
            <a href="index.php" class="btn btn-success  btn-lg">Login Now</a>
            <input type="reset" name="btncancel" class="btn btn-danger btn-lg" value="Cancel">
          </div>
          </center>
        </form>
      </div>

      
    </div>
  </div>

</body>

</html>