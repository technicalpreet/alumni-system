<?php session_start();
if (isset($_SESSION["name"]) && isset($_SESSION["uname"]) && isset($_SESSION["rollNo"]) && isset($_SESSION["branch"])) 
{
      $uname = $_SESSION["name"];
    $branch = $_SESSION["branch"];
    $roll = $_SESSION["rollNo"];
    $name = $_SESSION["name"];
}
?>


<?php
    include 'db.php';
    $jid = $_REQUEST["txtJobID"];
    $qry = "SELECT * FROM `job_details` WHERE jobid='$jid'";
    if ($result = mysqli_query($con, $qry))
     {
        $row = mysqli_fetch_array($result);
        $j=$row["jobid"];
        $jobType = $row["type"];
        $jobPlace = $row["job_place"];
        $jobtitle = $row["job_title"];
        $job_c = $row["job_company"];
        $startDate = $row["start_date"];
        $endDate = $row["end_date"];
        $package = $row["package"];
        $jobRole = $row["job_role"];
        $remark = $row["remark"];
    }
     else {
        echo "<p class='d-block btn-warning'>Failed to retrieve data !please add details first.</p>";
   }
?>


<?php
  if(isset($_REQUEST["btnUpdate"])) 
  {  
    $jid=$_REQUEST["txtHidJobid"];
    $type = $_REQUEST["txttype"];
    $job_place = $_REQUEST["txtjp"];
    $job_title = $_REQUEST["txtjobtitle"];
    $job_company = $_REQUEST["txtjc"];
    $start_date = $_REQUEST["txtstart"];
    $end_date = $_REQUEST["txtend"];
    $package = $_REQUEST["txtPackage"];
    $job_role = $_REQUEST["txtjobrole"];
    $remark = $_REQUEST["txtremark"];
    include'db.php';
    $qr="UPDATE `job_details` SET `type`='$type',`job_place`='$job_place',`job_title`='$job_title',`job_company`='$job_company',`start_date`='$start_date',`end_date`='$end_date',`package`='$package',`job_role`='$job_role',`remark`='$remark' WHERE jobid='$jid'";
    //echo"$qr";
   // $qry = "INSERT INTO job_details (sid,type,job_place,job_title,job_company,start_date,end_date,package,job_role,remark) VALUES ('$sid','$type','$job_place','$job_title','$job_company','$start_date','$end_date','$package','$job_role','$remark')";

    if(mysqli_query($con, $qr)) 
    {
      echo "<script> alert('Record Saved'); </script>";
    } else
     {
      echo "Error" . mysqli_error($con);
    }
  }
?>


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
    <?php include 'UserSetup.php';  ?>

    <?php include 'MenuBarAlumni.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form name="studentform" action="UpdateJobDetails.php" method="POST">

                    <div class="form-group">
                        <label class="d-block bg-info mt-3" style="color:#fff;text-align:center;">Select Job id to Update</label>
                        <select class="form-control" name="txtJobID">
                            <?php
                            include 'db.php';
                            $qry = "SELECT * FROM student_details as s , job_details as a WHERE a.sid=s.sid and s.rollno='$roll'";
                            $result = mysqli_query($con, $qry);
                            if (mysqli_affected_rows($con) > 0) {
                                while ($row = mysqli_fetch_array($result)) {

                                    echo "<option value='" . $row["jobid"] . "'>" . $row["jobid"] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <center> <button type="submit" name="btnFetch" class="btn btn btn-success">Fetch Data</button></center>
                    <h2 class="d-block bg-info mt-3" style="text-align:center;">Retrieved Record of job id:<?php echo "$j"; ?> </h2>
                    <input type="text" name="txtHidJobid" class="form-control" value="<?php echo "$j"; ?>">
                    <h2 class="d-block bg-info mt-3" style="text-align:center;">Update Alumni Job details </h2>

                    <div class="form-group">
                        <label>Profession type</label>
                        <select name="txttype" value="<?php echo "$jobType"; ?>" class="form-control">
                            <option value="Business">Business</option>
                            <option value="Study">Study</option>
                            <option value="Job">Job</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Job place</label>
                        <input type="text" name="txtjp" class="form-control" value="<?php echo "$jobPlace"; ?>">
                    </div>

                    <div class=" form-group">
                        <label>Job Title</label>
                        <input type="text" name="txtjobtitle" class="form-control" value="<?php echo "$jobtitle"; ?>">
                    </div>

                    <div class="form-group">
                        <label>Job Company</label>
                        <input type="text" name="txtjc" class="form-control" value="<?php echo "$job_c"; ?>">
                    </div>

                    <div class="form-group">
                        <label>Start</label>
                        <input type="text" name="txtstart" class="form-control" value="<?php echo "$startDate"; ?>">
                    </div>

                    <div class="form-group">
                        <label>End</label>
                        <input type="text" name="txtend" class="form-control" value="<?php echo "$endDate"; ?>">
                    </div>

                    <div class="form-group">
                        <label>Package Annualy</label>
                        <input type="text" name="txtPackage" class="form-control" value="<?php echo "$package"; ?>">
                    </div>

                    <div class="form-group">
                        <label>role of job</label>
                        <input type="text" name="txtjobrole" class="form-control" value="<?php echo "$jobRole"; ?>">
                    </div>

                    <div class="form-group">
                        <label>Remarks</label>
                        <input type="text" name="txtremark" class="form-control" value="<?php echo "$remark"; ?>">
                    </div>



                    <div class="form-group">
                        <center><input type="submit" name="btnUpdate" class="btn btn-success btn-lg" value="Update Record"></center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

