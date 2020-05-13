<?php session_start();
if(isset($_SESSION["name"]) && isset($_SESSION["uname"]) && isset($_SESSION["rollNo"]) && isset($_SESSION["branch"])) 
    $roll= $_SESSION["rollNo"];
    $name = $_SESSION["name"];
include 'db.php';
$qr="SELECT * FROM `student_details` WHERE sname='$name' and rollno='$roll'";
$result=mysqli_query($con,$qr);
if(mysqli_affected_rows($con)>0)
{
  $row=mysqli_fetch_array($result);
  $sid=$row["sid"];
}


if (isset($_SESSION["name"]) && isset($_SESSION["uname"]) && isset($_SESSION["rollNo"]) && isset($_SESSION["branch"])) 
{
  if (isset($_REQUEST["btnsubmit"])) {
    $roll= $_SESSION["rollNo"];
    $name = $_SESSION["name"];
    $type = $_REQUEST["txttype"];
    $job_place = $_REQUEST["txtjp"];
    $job_title = $_REQUEST["txtjobtitle"];
    $job_company = $_REQUEST["txtjc"];
    $start_date = $_REQUEST["txtstart"];
    $end_date = $_REQUEST["txtend"];
    $package = $_REQUEST["txtend"];
    $job_role = $_REQUEST["txtjobrole"];
    $remark = $_REQUEST["txtremark"];

    
    $qry = "INSERT INTO job_details (sid,type,job_place,job_title,job_company,start_date,end_date,package,job_role,remark) VALUES 
('$sid','$type','$job_place','$job_title','$job_company','$start_date','$end_date','$package','$job_role','$remark')";


    if (mysqli_query($con, $qry)) {
      echo "<script> alert('Record Saved'); </script>";
    } else {
      echo "Error" . mysqli_error($con);
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
  
    <?php include'UserSetup.php';  ?>
    <?php include 'MenuBarAlumni.php'; ?>

    <div id="wrapper">
      <h2>Alumni Profession</h2>
      <form name="studentform" action="job_details.php" method="POST">

        <div class="form-group">
          <label>Profession Type</label>
          <select name="txttype" class="form-control">
            <option value="Business">Business</option>
            <option value="Study">Study</option>
            <option value="Job">Job</option>
          </select>
        </div>



        <div class="form-group">
          <label>Job place</label>
          <input type="text" name="txtjp" class="form-control" value="" required>
        </div>

        <div class="form-group">
          <label>Job Title</label>
          <input type="text" name="txtjobtitle" class="form-control" value="" required>
        </div>

        <div class="form-group">
          <label>Job Company</label>
          <input type="text" name="txtjc" class="form-control" value="">
        </div>

        <div class="form-group">
          <label>Start</label>
          <input type="text" name="txtstart" class="form-control" value="" required>
        </div>



        <div class="form-group">
          <label>End</label>
          <input type="text" name="txtend" class="form-control" value="">
        </div>

        <div class="form-group">
          <label>Job role</label>
          <input type="text" name="txtjobrole" class="form-control" value="" required>
        </div>

        <div class="form-group">
          <label>Remark</label>
          <input type="text" name="txtremark" class="form-control" value="">
        </div>



        <div class="form-group">
          <input type="submit" name="btnsubmit" class="btn btn-success btn-lg" value="Save Record">
        </div>

      </form>
    </div>


  </body>

  </html>

<?php
} else {
  header("Location:index.php");
}
?>