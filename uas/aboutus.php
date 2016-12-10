<?php
include 'config/login.php';
session_start();
if(isset($_SESSION['admin'])){
  $log = $_SESSION['admin'];
}else if(isset($_SESSION['user'])){
  $log = $_SESSION['user'];
}else{
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Program rekapitulasi dan rencana publikasi ilmiah Sistem Informasi</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  </head>
  <body>
    <style media="screen">
      body{
        background-color:rgb(49, 63, 105);
        color: white;
      }
      .credit{
        color: rgb(65, 251, 218);
      }
      #footer{
        bottom: 0;
        position: absolute;
      }
      body{
        margin-top: 95px;
      }
      th{
        text-align: center;
      }
      #footer{
        bottom: 0;
        position: absolute;
      }

      .navbar{
        border-radius: 0;
        background-color: hsla(201, 84%, 46%, 0.86);
        border-color: hsla(201, 84%, 46%, 0.86);
        -webkit-box-shadow: 0px 10px 23px 2px rgba(0,0,0,0.42);
        -moz-box-shadow: 0px 10px 23px 2px rgba(0,0,0,0.42);
        box-shadow: 0px 10px 23px 2px rgba(0,0,0,0.42);
      }
      .navbar-default .navbar-nav > li > a{
        color: white;
      }
      .navbar-default .navbar-nav > li > a:hover{
        color: black;
        background-color: white;
      }
    </style>
    <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="aboutus.php">About US</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="badge"></span> Login sebagai <?php echo $log; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php"><i class="glyphicon glyphicon-log-in"></i> LogOut</a></li>
          </ul>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
      <div class="page-header text-center">
        <h1>KELOMPOK 3</h1>
        <div class="row">
          <div class="col-md-12">
            <p>15.N1.0002 Adrianus Hermawan S</p>
            <p>15.N1.0015 Daniel Aditama S</p>
            <p>15.N1.0020 Stefanus Lintang Timur Aji P</p>
            <p>15.N2.0004 Andreas G. L</p>
            <p>15.N2.0011 Jonathan Wibowo</p>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div id="footer">
        <div class="container text-center">
          <p class="text-muted  credit">Kelompok 3 - Stefanus Lintang Timur Aji Pamungkas</p>
        </div>
      </div>
</footer>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
