<?php
$nama1=$_GET['nama1'];
$nama2=$_GET['nama2'];
$judul=$_GET['id'];
include '../config/login.php';
if($_GET['opt']=='1'){
  $sql = "UPDATE mahasiswa_uas SET accepted='1' WHERE nama1='$nama1' and nama2='$nama2' and judul='$judul'";
  $result = $mysqli->query($sql) or die($mysqli->error);
  header("location:index.php");
}else{
  $sql = "UPDATE mahasiswa_uas SET accepted='0' WHERE nama1='$nama1' and nama2='$nama2' and judul='$judul'";
  $result = $mysqli->query($sql) or die($mysqli->error);
  header("location:index.php");
}
 ?>
