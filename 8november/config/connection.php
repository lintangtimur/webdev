<?php
$HOST = 'localhost';
$USER = 'root';
$PASSWORD = '';
$DBNAME = '8nov';
$mysqli = new mysqli($HOST,$USER,$PASSWORD,$DBNAME);
try {
  if($mysqli){
    
  }
} catch (Exception $e) {
  echo "Error: ".$e->getMessage();
}

 ?>
