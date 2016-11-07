<?php
/*
  DRY => Dont Repeat Yourself
*/
include 'config/connection.php';
include 'config/table_config.php';
$sql = "show columns from ktp";
$result = $mysqli->query($sql);
$kolom = array();
$data = array();
while($row = $result->fetch_object()){
  $kolom[] = $row->Field;
}

/*GET INPUT FROM FORM*/
// foreach ($_POST as $key => $value) {
//   $data[] = "'".$value."'";
// }

foreach ($_POST as $key => $value) {
    $data2[] = "'".$value."'";
}
for ($i=0; $i <count($data2)-1 ; $i++) {
  $data3[] = $data2[$i];
}

$myKol = implode(",", array_values($kolom));
$myData = implode(",",array_values($data3));



function updateTable($mysqli,$kolom,$data3){
  $sql = "UPDATE ktp SET  $kolom[1]=$data3[1],
                          $kolom[2]=$data3[2],$kolom[3]=$data3[3],
                          $kolom[4]=$data3[4],$kolom[5]=$data3[5],
                          $kolom[6]=$data3[6],$kolom[7]=$data3[7],
                          $kolom[8]=$data3[8],$kolom[9]=$data3[9],
                          $kolom[10]=$data3[10],$kolom[11]=$data3[11],
                          $kolom[12]=$data3[12],$kolom[13]=$data3[13],
                          $kolom[14]=$data3[14],$kolom[15]=$data3[15]
                    WHERE nik=$data3[0]";
  $result = $mysqli->query($sql) or die($mysqli->error);
  showTable($mysqli, $kolom);
}

function insertTable($mysqli, $myKol, $myData){
  $sql = "INSERT INTO ktp ($myKol) VALUES($myData)";
  // echo $sql;
  $result = $mysqli->query($sql);
  if($result){}else{echo "ERROR".$mysqli->error;}
}
//Awal mula letak showTable dan printHeader

if($_POST['hidden']==="UPDATE"){
  updateTable($mysqli, $kolom, $data3);
}
else{
  insertTable($mysqli, $myKol, $myData);
  showTable($mysqli, $kolom);
}

/* DEBUG */
//insertTable($mysqli, $myKol, $myData);
//showTable($mysqli, $kolom);
//updateTable($mysqli, $kolom, $data)
 ?>
