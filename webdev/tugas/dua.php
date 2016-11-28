<?php
session_start();

if(isset($_SESSION['user'])){
  if(!$_SESSION['user']=="1"){
    header("location:index.php");
  }
}else{
  header("location:index.php");
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DUA</title>
  </head>
  <body>
    <a href="satu.php">SATU</a>
    <a href="dua.php">DUA</a>
    <a href="tiga.php">TIGA</a>
    <a href="logout.php">LOG OUT</a>
    <form enctype="multipart/form-data" action="upload2.php" method="post">
      Choose a file to upload: <input type="file" name="berkas"><br>
      <input type="submit" name="" value="Upload File">
    </form>
  </body>
</html>
