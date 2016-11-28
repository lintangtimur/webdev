<?php
//Cek User sudah login apa belum
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
    <title>SATU</title>
  </head>
  <body>
    <?php
    //Cek apakah variable ID sudah ada (?)
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    $decid = base64_decode($id);
    $mysqli = new mysqli("localhost","root","","8nov");
    $sql = "select * from asd where id='$decid'";
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_object()) {
      echo '<img src="data:img/jpeg;base64,'.base64_encode($row->gambar).'"width="290" height="290"/>';
    }
     ?>
     <br>
    <a href="satu.php">SATU</a>
    <a href="dua.php">DUA</a>
    <a href="tiga.php">TIGA</a>
    <a href="logout.php">LOG OUT</a>
    <br>
     <table border=1>
       <tr>
         <th>NAMA</th>
         <th>LINK</th>
       </tr>
       <?php

       //Iterate data dari table 'asd'
         $mysqli = new mysqli("localhost","root","","8nov");
         $sql = "select * from asd";
         $result = $mysqli->query($sql);
         while($row = $result->fetch_object()){
          $id64 = base64_encode($row->id);
          echo "<tr>
                <td>$row->nama</td>
                <td><a href='satu.php?id=$id64'>SHOW IMAGE</a></td>
          </tr>";
         }
        ?>
     </table>
  </body>
</html>
