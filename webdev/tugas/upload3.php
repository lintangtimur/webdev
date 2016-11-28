<?php
//Create Connection
$mysqli = new mysqli("localhost","root","","8nov");
$TABLE_NAME = "asd";
$nama = basename($_FILES['berkas']['name']);
$imgData = addslashes(file_get_contents($_FILES['berkas']['tmp_name']));
$sql = "insert into $TABLE_NAME set nama='$nama', gambar='$imgData'";
if(!$result=$mysqli->query($sql)){
  echo $mysqli->error;
}
$mysqli->close();
 ?>
