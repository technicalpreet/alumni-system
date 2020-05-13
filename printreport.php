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
<h2>Alumni Records</h2>
<?php
if(isset($_REQUEST["btnsearch"]))
{
	
echo"<table class='table table-striped'>
<tr>
<td>Student Name</td>
<td>RollNo</td>
<td>Branch</td>
<td>Mobile</td>
<td>Email</td>
<td>Gender</td>
</tr>";
$val=$_REQUEST["txtname"];
include'db.php';
$qry="SELECT * FROM student_details WHERE sname LIKE '%$val%'";
$result=mysqli_query($con,$qry);

while($row=mysqli_fetch_array($result))
{
echo"<tr>
<td>".$row["sname"]."</td>
<td>".$row["rollno"]."</td>
<td>".$row["branch"]."</td>
<td>".$row["mobile"]."</td>
<td>".$row["email"]."</td>
<td>".$row["gender"]."</td>
</tr>";
	
	
}


echo"</table>";
}
?>
</body>
</html>