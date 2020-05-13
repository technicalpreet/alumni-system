<?php session_start();
if(isset($_SESSION["hodname"]) && isset($_SESSION["department"]))
{
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
<h2>Welcome Head <?php echo $_SESSION["hodname"]; ?></h2>


</div>
</body>
</html>
<?php
}
else
{
	header("Location:hodlogin.php");
}
?>