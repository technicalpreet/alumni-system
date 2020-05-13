<?php session_start();
if(isset($_SESSION["name"]) && isset($_SESSION["branch"])) {
  ?>
  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Alumni System</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type="text/css">
      #social {
        float: right;
        color: #000000;
        padding-right: 40px;
        font-style: italic;
        font: bolder;
        font-size: 20px;
      }

      #social p {
        text-align: center;
      }

      #social ul {
        list-style-type: none;
      }

      #social ul li {
        float: left;
      }

      #social ul li i {
        margin: 0px 10px 0px 10px;
      }

      #social ul li a:hover {
        color: #000000;
        background-color: #ffffff;
        cursor: pointer;
        box-shadow: 1px 1px 10px #666666;
      }

      .sliderleft {
        position: fixed;
        width: 50px;
        height: 305px;
        float: left;
        margin-top: 15%;
        background-color: #0daf6c;
      }

      .sliderleft p {
        font-weight: 1px;
        font-size: 14px;
        color: rgb(255, 249, 249);
        padding: 3px;
      }

      .sliderleft ul {
        list-style: none;
      }

      .sliderleft ul li {
        font-size: 24px;
        color: rgb(255, 255, 255);
        background-color: #0daf6c;
        margin-top: 2px;
        text-align: center;
        line-height: 50px;
        margin-right: 4px;
      }

      .sliderleft ul li:hover {
        color: #1b72d4;
        background-color: rgb(186, 195, 212);

      }

      /*   #header img {
            height: 100px;
            width: 100px;
            line-height: 20px;
          } */
    </style>
  </head>

  <body>

    <?php include'include\floatingicons.php' ?>

    <?php include'UserSetupHome.php';  ?>
    <?php include'MenuBarAlumni.php'; ?>

    <div id="wrapper">
      <h2>Welcome Alumni <?php echo $_SESSION["name"]; ?> from <?php echo $_SESSION["branch"]; ?></h2>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
              <div class="carousel-item">
                <img src="bit6.jpg" alt="Chicago" width="1300" height="500">
              </div>
              <div class="carousel-item">
                <img src="bit4.jpg" alt="Chicago" width="1300" height="500">
              </div>

              <div class="carousel-item">
                <img src="bit5.jpg" alt="Chicago" width="1300" height="500">
              </div>

              <div class="carousel-item active">
                <img src="bit1.jpg" alt="Los Angeles" width="1300" height="500">
              </div>
              <div class="carousel-item">
                <img src="bit2.jpg" alt="Chicago" width="1300" height="500">
              </div>
              <div class="carousel-item">
                <img src="bit3.jpg" alt="New York" width="1300" height="500">
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div>
        </div>
      </div>
    </div>



    <?php include 'include/footer.php';  ?>

  </body>

  </html>
<?php
} else {
  header("Location:index.php");
}
