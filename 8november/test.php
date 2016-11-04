<?php
/*
  DRY => Dont Repeat Yourself
*/
include 'config/connection.php';
$sql = "show columns from ktp";
$result = $mysqli->query($sql);
$kolom = array();
$data = array();
while($row = $result->fetch_object()){
  $kolom[] = $row->Field;
}

/*GET INPUT FROM FORM*/
foreach ($_POST as $key => $value) {
  $data[] = "'".$value."'";
}
$myKol = implode(",", array_values($kolom));
$myData = implode(",",array_values($data));

function insertTable($mysqli, $mykol, $mydata){
  $sql = "INSERT INTO ktp ($mykol) VALUES($mydata)";
  $result = $mysqli->query($sql);
  if($result){}else{echo $mysqli->error;}
}
function showTable($mysqli,$kolom){
  $sql = "SELECT * FROM ktp, kecamatan WHERE ktp.kode_kecamatan=kecamatan.kode_kecamatan";
  $result = $mysqli->query($sql);
  echo "<table class='table table-responsive table-hover'>";
  print_header_table($kolom);
  $i=0;
  while($row = $result->fetch_object()){
    echo "<tr>";
    $i++;
    echo "<td>$i</td>";
    foreach ($kolom as $var) {
      if($var==='kode_kecamatan'){
        echo "<td>";
        echo $row->nama_kecamatan;
        echo "</td>";
      }else{
        echo "<td>";
        echo $row->$var;
        echo "</td>";
      }
    }
    echo "</tr>";
  }
  echo "</table>";
}
function print_header_table($kolom){
  echo "<tr><td>NO</td>";
  foreach ($kolom as $var) {
    if($var==='kode_kecamatan'){
      echo "<td><b>KECAMATAN</b></td>";
    }else{
      $th =strtoupper($var);
      echo "<td><b>$th</b></td>";
    }
  }
  echo "<td>OPTION</></tr>";
}

// insertTable($mysqli, $myKol, $myData);
showTable($mysqli, $kolom);
 ?>
