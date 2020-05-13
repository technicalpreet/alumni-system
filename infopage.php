<?php session_start();
if(isset($_SESSION["name"]) && isset($_SESSION["uname"]) && isset($_SESSION["branch"]) && isset($_SESSION["rollNo"])) 
{
    $uname=$_SESSION["uname"];
    $name = $_SESSION["name"];
    $branch= $_SESSION["branch"];
    $roll = $_SESSION["rollNo"];
}
if(isset($_REQUEST["btnsubmit"]))
 {
    $sname = $_REQUEST["aname"];
    $semail = $_REQUEST["txtmail"];
    $sbatch = $_REQUEST["txtbatch"];
    $srno = $_REQUEST["txtrno"];
    $sphno = $_REQUEST["txtphno"];
    $sfathername = $_REQUEST["txtfname"];
    $sgender = $_REQUEST["gender"];
    $sdob = $_REQUEST["txtdob"];
    $saddr = $_REQUEST["txtaddr"];
    $scity = $_REQUEST["txtcity"];
    $sstate = $_REQUEST["txtstate"];
    $scountry = $_REQUEST["txtcountry"];
    $source = $_FILES["upfile"]["tmp_name"];
    $target = "uploads/". $_FILES["upfile"]["name"];
    $imagename = $_FILES["upfile"]["name"];
    if(move_uploaded_file($source, $target))
     {
        include 'db.php';
        $qry="UPDATE `student_details` SET `rollno`='$roll',`sname`='$sname',`branch`='$branch',`mobile`='$sphno',`email`='$semail',`batch`='$sbatch',`gender`='$sgender',`username`='$uname',`f_name`='  $sfathername',`dob`='$sdob',`address`='$saddr',`city`='$scity',`state`='$sstate',`country`='$scountry',`image`='$imagename' WHERE rollno='$roll'";
        //$qry = "INSERT INTO student_details(sname,email,batch,rollno,mobile,f_name,gender,dob,address,city,state,country,image) VALUES('$sname','$semail','$sbatch','$srno','$sphno','$sfathername','$sgender','$sdob','$saddr','$scity','$sstate','$scountry','$imagename')";
     //   echo $qry;
        if (mysqli_query($con, $qry))
            echo "<script> alert('Record Saved'); </script>";
        else
            echo "Error" . mysqli_error($con);
    }
     else
        echo "<div class='alert alert-success' role='alert'><p>Failed To Save Details!</p>
        <hr>
        <p class='mb-0'>Please check wheather you have entered valid data or not.</p>
      </div>
    </div>
  </div>";
}
?>


<?php 
include 'db.php';
if(isset($_SESSION["name"]) && isset($_SESSION["branch"]) && isset($_SESSION["rollNo"]))
 {
    $uname = $_SESSION["name"];
    $branch= $_SESSION["branch"];
    $roll = $_SESSION["rollNo"];
    $qry = "SELECT * FROM `student_details` WHERE rollno='$roll'";
    
    //echo "$qry";
    $result=mysqli_query($con, $qry);
    if(mysqli_affected_rows($con)>0) 
    {
        $row = mysqli_fetch_array($result);
        $alumniID=$row["sid"];
        //echo"$alumniID";
        $mobile = $row["mobile"];
        $email = $row["email"];
        $batch = $row["batch"];
        $gender = $row["gender"];
        $fname = $row["f_name"];
        $dob = $row["dob"];
        $address = $row["address"];
        $city = $row["city"];
        $state = $row["state"];
        $country = $row["country"];
        $pho = $row["image"];
    } 
    else
     {
        echo "<p class='d-block alert'>Failed to retrieve data</p>";
    }
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

<head>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Alumni System</title>
</head>

<body>
    
    <?php include 'UserSetup.php';  ?>

    <?php include 'MenuBarAlumni.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h3 class="display-5 d-block bg-info" style="text-align:center;">ALUMNI INFORMATION</h3><br>

                <form name="alumniform" method="POST" enctype="multipart/form-data" action="infopage.php">


                    <div class="form-group ">
                        <label for="inputAddress">Alumni Id:</label>
                        <input type="text" class="form-control" id="inputAddress" value="<?php echo "$alumniID"; ?>" >
                    </div>

                    <div class="form-group ">
                        <label for="inputAddress">Name:</label>
                        <input type="text" name="aname" class="form-control" id="inputAddress" value="<?php echo "$name"; ?>" placeholder="<?php echo "$sname"; ?>">
                    </div>

                    <div class="form-group ">
                        <label for="inputEmail4">Email Address</label>
                        <input type="email" class="form-control" name="txtmail" id="inputEmail4" value="<?php echo "$email"; ?>" placeholder="<?php echo "$email"; ?>">
                    </div>


                    <div class="form-group">
                        <label for="inputAddress">Batch</label>
                        <input type="text" class="form-control" name="txtbatch" id="inputAddress" value="<?php echo "$batch"; ?>" placeholder="<?php echo "$batch"; ?>">
                    </div>


                    <div class="form-group ">
                        <label for="inputAddress">Roll No.</label>
                        <input type="text" class="form-control" name="txtrno" id="inputAddress" value="<?php echo "$roll"; ?>" placeholder="<?php echo "$roll"; ?>">
                    </div>


                    <div class="form-group ">
                        <label for="inputAddress">Contact No.</label>
                        <input type="text" class="form-control" name="txtphno" id="inputAddress" value="<?php echo "$mobile"; ?>" placeholder="<?php echo "$mobile"; ?>">
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Father's Name</label>
                        <input type="text" class="form-control" name="txtfname" id="inputAddress" value="<?php echo "$fname"; ?>" placeholder="<?php echo "$fname"; ?>">
                    </div>


                    <div class="form-group">
                        <label>Gender </label>
                        <Input type="radio" name="gender" value="M" checked>Male
                        <Input type="radio" name="gender" value="F">Female
                    </div>

                    <div class="form-group">DOB
                        <input type="date" name="txtdob" value="<?php echo "$dob"; ?>">
                    </div>

                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" name="txtaddr" id="inputAddress" value="<?php echo "$address"; ?>" placeholder="<?php echo "$address"; ?>">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">City</label>
                        <input type="text" class="form-control" name="txtcity" id="formGroupExampleInput" value="<?php echo "$city"; ?>" placeholder="<?php echo "$city"; ?>">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">State</label>
                        <input type="text" class="form-control" name="txtstate" id="formGroupExampleInput" value="<?php echo "$state"; ?>" placeholder="<?php echo "$state"; ?>">

                    </div>
                    <div class="form-group ">
                        <label for="formGroupExampleInput">Country</label>
                        <input type="text" class="form-control" name="txtcountry" id="formGroupExampleInput" value="<?php echo "$country"; ?>" placeholder="<?php echo "$country"; ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload Image</label>
                        <input type="file" name="upfile" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div>
                        <label>Uploaded Photo</label>
                        <p class="d-block"><?php echo "<img src='uploads/" . $pho . "' alt='image not uploades' width=100 height=100>"; ?></p>
                    </div>
                    <center><button type="submit" class="btn btn-primary form-group " name="btnsubmit">Save And Update</button></center>

                </form>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>
</body>

</html>