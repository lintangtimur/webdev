<?php
session_start();
include 'config/login.php';
if(!isset($_SESSION['user'])){
  header("location:index.php");
}
$judul = $_POST['judulRev'];
$file = $mysqli->real_escape_string($_FILES['berkas2']['name']);
$file_size = $_FILES['berkas2']['size'];
$folder = "uploads/";
$file_loc = $_FILES['berkas2']['tmp_name'];
move_uploaded_file($file_loc, $folder.$file);
$sql = "call up($file,$judul)";
$mysqli->query($sql);
header("location:home.php");



 ?>
