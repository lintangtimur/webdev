<?php
include 'config/connection.php';
include 'config/table_config.php';

$sql = "show columns from ktp";
$result = $mysqli->query($sql);
$kolom = array();
$data = array();
while($row = $result->fetch_object()){
  $kolom[] = $row->Field;
}
function delete($mysqli,$nik){
  $sql = "DELETE FROM ktp where nik=$nik";
  $result = $mysqli->query($sql) or die($mysqli->error);
}

if(isset($_POST['id'])){
  $nik = $_POST['id'];
  delete($mysqli, $nik);
  showTable($mysqli, $kolom);
}

 ?>
