<?php
include '../config/login.php';
session_start();
if(!isset($_SESSION['admin'])){
  header("location:../index.php");
}
else{
$modal_id = $_POST['modal_id'];

$sql = "SELECT * FROM mahasiswa_uas where berkas='$modal_id'";
$result=$mysqli->query($sql) or die($mysqli->error);
while($row = $result->fetch_object()){
  echo $row->abstrak;
}
}

 ?>
