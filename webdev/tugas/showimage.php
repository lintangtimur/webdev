<?php
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$mysqli = new mysqli("localhost","root","","8nov");
$sql = "select * from asd where id=$id";
$result = $mysqli->query($sql);
while ($row = $result->fetch_object()) {
  echo '<img src="data:img/jpeg;base64,'.base64_encode($row->gambar).'"/>';
}
 ?>
