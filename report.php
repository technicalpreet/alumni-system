<?php session_start();
if(isset($_SESSION["hodname"]) && isset($_SESSION["department"]))
{
if(isset($_REQUEST["btnsubmit"]))
{
	$sid=$_SESSION["sid"];
	$type=$_REQUEST["txttype"];
	$job_place=$_REQUEST["txtjp"];
	$job_title=$_REQUEST["txtjobtitle"];
	$job_company=$_REQUEST["txtjc"];
	$start_date=$_REQUEST["txtstart"];
	$end_date=$_REQUEST["txtend"];
	$package=$_REQUEST["txtend"];
	$job_role=$_REQUEST["txtjobrole"];
	$remark=$_REQUEST["txtremark"];
	
include 'db.php';
$qry="INSERT INTO job_details (sid,type,job_place,job_title,job_company,start_date,end_date,package,job_role,remark) VALUES 
('$sid','$type','$job_place','$job_title','$job_company','$start_date','$end_date','$package','$job_role','$remark')";

//echo $qry;
if(mysqli_query($con,$qry))
{
	echo"<script> alert('Record Saved'); </script>";
}
else
{
	echo "Error".mysqli_error($con);
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
<?php include'menuBar.php'; ?>
<div id="wrapper">
<h2>Search Alumni Records</h2>

<form action="printreport.php" name="f1" method="post">
 <div class="form-group">
<label>Keyword</label>
<input  type="text"  name="txtname" placeholder="Enter Keyword" class="form-control" required>
</div>


<div class="form-group">
 <input type="submit" name="btnsearch" value="Search" class="btn btn-success btn-lg d-block mx-auto">
</div>
</form>

</div>

</body>
</html>
<?php
}
else
{
	header("Location:index.php");
}
