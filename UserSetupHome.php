<?php
  include 'db.php';
  if (isset($_SESSION["name"]) && isset($_SESSION["branch"])) {
    $sname = $_SESSION["name"];
  }
  $qry = "SELECT * FROM `student_details` WHERE sname='$sname';";
  // echo $qry;
  $result = mysqli_query($con, $qry);
  if (mysqli_affected_rows($con) > 0) {
    $row = mysqli_fetch_array($result);
    $email = $row[5];
    $pho = $row["image"];
    $uname = $row[8];
  } else
    echo "Error" . mysqli_error($con);
  ?>
<style>
      .btnHover
      {
        background-color:#336699;
        color:#fff;
      }
      .btnHover:hover
      {
        background-color:#0DAF6C;
        color:#fff;
      }
</style>
<DIV class="container-fluid mb-2" style="background-color:#336699;">
    <DIV class="row">
        <DIV class="col-md-8">
            <img style="float:left;width:80px;
      height:80px;
      padding-top:10px;
      padding-left: 10px;
      float:left;" class="d-none d-sm-block img img-responsive" src="images/logo2.png">
            <h1 class="" style=" color:#ffffff;
     margin-left: 20px;
     float:left;
     line-height:90px;">MCA Alumni Portal</h1>
        </DIV>
        <DIV class="col-md-4">
            <div class="dropdown mt-2" style="float:right;">
                <button class="btn dropdown-toggle btnHover" type="button" data-toggle="dropdown" aria-expanded="false">
                    <?php echo "<img class='rounded-circle mr-2' src='uploads/".$pho . "' width=50 height=50>"; ?><?php echo "Welcome<br>$sname"; ?>
                </button>
                <p>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-item">
                            <?php echo "<center><img class='rounded-circle' src='uploads/" . $pho . "' width=100 height=100></center>"; ?>
                            <p style="font-size:13px;">
                                <a href="https://www.gmail.com"><img src="images/emailrr.jpg"><?php echo "$email" ?></a><br>
                                <center><a href="index.php" class="btn btn-info">SingOut</a></center>
                            </p>
                        </div>
                    </div>
                </p>
            </div>
        </DIV>
    </DIV>
</DIV>