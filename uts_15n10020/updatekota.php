<?php
require_once('config.php');
$mysqli = openConnection();
$kodekota = $_POST['kodekota'];
$kota = $_POST['kota'];
$id = $_POST['id'];
$sql = "update kota_15n10020 set kodekota='$kodekota', kota='$kota' where kodekota='$id'";
if($mysqli->query($sql)){
  $query = "select * from kota_15n10020";
  $result = $mysqli->query($query) or die ("Query Salah");
  echo "<h1>Hasil Update</h1>";
  echo "<table class='table table-hover table-bordered table-responsive'>
    <tr>
      <th>No</th>
      <th>Kode kota</th>
      <th>Kota</th>
    </tr>";
  if($result){
    $i =0;
    while($row = $result->fetch_object()){
      $i++;
      echo "<tr>
              <td>$i</td>
              <td>$row->kodekota</td>
              <td>$row->kota</td>
            </tr>";
    }
  }
}else{
  echo "GAGAL UPDATE BOS<br>";
  echo $mysqli->error;
}
$mysqli->close();
 ?>
