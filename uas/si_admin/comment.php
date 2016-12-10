<?php
session_start();
if(!isset($_SESSION['admin'])){
  header("location:index.php");
}else{
	$nama1=$_POST['nama1'];
$nama2=$_POST['nama2'];
$judul=$_POST['judul'];
$com = $_POST['comment'];
include ('../config/login.php');
$sql = "INSERT INTO history (comment,nama1,nam2,judul) VALUES ('$com','$nama1','$nama2','$judul')";
$res = $mysqli->query($sql);
header("location:index.php");
}


 ?>
