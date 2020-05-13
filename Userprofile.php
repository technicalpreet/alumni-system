<?php session_start();
include 'db.php';
if (isset($_SESSION["name"]) && isset($_SESSION["branch"]) && isset($_SESSION["rollNo"])) {
    $uname = $_SESSION["name"];
    $branch = $_SESSION["branch"];
    $roll = $_SESSION["rollNo"];

    $qry = "SELECT * FROM student_details as s , job_details as a WHERE a.sid=s.sid and s.rollno='$roll'";

    $result = mysqli_query($con, $qry);
    if (mysqli_affected_rows($con) > 0) {

        $row = mysqli_fetch_array($result);
        $alumniID = $row["sid"];

        $name = $row["sname"];
        $pass = $row["password"];
        $mobile = $row["mobile"];
        $email = $row["email"];
        $batch = $row["batch"];
        $gender = $row["gender"];
        $image = $row["image"];
        $fname = $row["f_name"];
        $dob = $row["dob"];
        $address = $row["address"];
        $city = $row["city"];
        $state = $row["state"];
        $country = $row["country"];
        $pho = $row["image"];
        $jobType = $row["type"];
        $jobPlace = $row["job_place"];
        $jobtitle = $row["job_title"];
        $job_c = $row["job_company"];
        $startDate = $row["start_date"];
        $endDate = $row["end_date"];
        $package = $row["package"];
        $jobRole = $row["job_role"];
        $remark = $row["remark"];
    } else {
        echo "<p class='d-block btn-warning'>Failed to retrieve data !please add details first.</p>";
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
    <center>
        <div class="container">
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="accordion" id="accordionExample">

                        <div class="card ">
                            <div class="card-header bg-warning" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-block " style="color:#fff;background-color:#336699;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Personal Details
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">

                                <?php
                                $qry = "SELECT * FROM student_details as s , job_details as a WHERE a.sid=s.sid and s.rollno='$roll'";
                                $result = mysqli_query($con, $qry);
                                if (mysqli_affected_rows($con) > 0) {
                                    $row = mysqli_fetch_array($result);

                                    echo "  <div class='card-body'>
                                    <table class='table table-striped table-respomsive'>
                                   
                                   <tr>
                                            <td>Name:</td>
                                            <td>$row[0]</td>
                                        </tr>
                                        <tr>
                                            <td>Mobile:</td>
                                            <td>$row[4]</td>
                                        </tr>
                                        <tr>
                                            <td>Gender:</td>
                                            <td>$row[7]</td>
                                        </tr>
                                        <tr>
                                            <td>Father Name:</td>
                                            <td>$row[10]</td>
                                        </tr>
                                        <tr>
                                            <td>Date of birth:</td>
                                            <td>$row[11]</td>
                                        </tr>
                                    </table>
                                </div>";
                                }
                                ?>

                            </div>
                        </div>
                        <div class="card ">
                            <div class="card-header bg-warning" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-block " style="color:#fff;background-color:#336699;" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Login Details
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <table class="table table-striped table-respomsive">
                                        <tr>
                                            <td>User Name:</td>
                                            <td> <?php echo "$uname";  ?> </td>
                                        </tr>
                                        <tr>
                                            <td>PASSWORD</td>
                                            <td><input type="password" class="form-control" name="txtpass" value="<?php echo "$pass";  ?>"> </td>
                                        </tr>
                                        <tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-warning" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-block  collapsed" style="color:#fff;background-color:#336699;" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Job Details
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">

                                <?php
                                $qry = "SELECT * FROM student_details as s , job_details as a WHERE a.sid=s.sid and s.rollno='$roll'";
                                $result = mysqli_query($con, $qry);
                                if (mysqli_affected_rows($con) > 0) {
                                    $jobOrder = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>

                                        <div class="card-body">
                                            <table class="table table-striped table-respomsive">



                                                <?php
                                                echo " <h3>Job .$jobOrder.</h3>
                                            <tr>
                                                <td>Job Type:</td>
                                                <td>$row[19]</td>
                                            </tr>
                                            <tr>
                                                <td>Job Place</td>
                                                <td>$row[20]</td>
                                            </tr>
                                            <tr>
                                                <td>Job Title</td>
                                                <td>$row[21]</td>
                                            </tr>
                                            <tr>
                                                <td>Job Company</td>
                                                <td>$row[22]</td>
                                            </tr>
                                            <tr>
                                                <td>Start Date</td>
                                                <td>$row[23]</td>
                                            </tr>
                                            <tr>
                                                <td>End date</td>
                                                <td>$row[24]</td>
                                            </tr>
                                            <tr>
                                                <td>Package Annualy</td>
                                                <td>$row[25]</td>
                                            </tr>
                                            <tr>
                                                <td>Role in Job</td>
                                                <td>$row[26]</td>
                                            </tr>
                                            <tr>
                                                <td>Remarks</td>
                                                <td>$row[27]</td>
                                            </tr> 
                                           
                                           
                                       
                                    </table>
                                </div>   ";
                                                $jobOrder++;
                                            }
                                        }
                                        ?>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-header bg-warning" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block collapsed" type="button" style="color:#fff;background-color:#336699;" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Photos
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">

                                    <?php
                                    $qry = "SELECT * FROM student_details as s , job_details as a WHERE a.sid=s.sid and s.rollno='$roll'";
                                    $result = mysqli_query($con, $qry);
                                    if (mysqli_affected_rows($con) > 0) {
                                        $row = mysqli_fetch_array($result);

                                        echo " <div class='card-body'>
                                    <table class='table table-striped table-respomsive'>
                                   <tr>
                                                <td><img src='uploads/" . $image . "' class='img img-responsive img-fluid d-block' alt='image not uploades'></td>

                                            </tr>
                                        </table>
                                    </div>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header bg-warning" id="headingThree ">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block collapsed" type="button" style="color:#fff;background-color:#336699;" d a ta-tog g le="collapse" d a ta-tar g et="#collapseThree" a r ia-expan d ed="false" a r ia-contr o ls="collapseThr ee">
                                            Other Details
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseThree" c l ass="collapse" a ria-labell e dby="headingThree" d ata-pa r ent="#accordionExam ple">
                                    <div c lass="card- body">
                                        <p>Enter more details about you to help to reac h you! </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</body>

</html>