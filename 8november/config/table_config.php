<?php
/*
  Berguna untuk menampilkan table
  Males ngetik
  Cuma buat table aja
*/
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
    echo "<td><a href=index.php?nik=$row->nik&kode_camat=$row->kode_kecamatan&edit=true>EDIT</a>
          <div class='product-id display-none'>$row->nik</div>
          <div class='btn btn-danger delete-btn'>Delete</div></td>
    ";
    echo "</tr>";
  }
  echo "</table>";
}
function print_header_table($kolom){
  echo "<tr><td><b>NO</b></td>";
  foreach ($kolom as $var) {
    if($var==='kode_kecamatan'){
      echo "<td><b>KECAMATAN</b></td>";
    }else{
      $th =strtoupper($var);
      echo "<td><b>$th</b></td>";
    }
  }
  echo "<td><b>OPTION</b></td></tr>";
}
 ?>
