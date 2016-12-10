<?php
session_start();
include 'config/login.php';

$user = $mysqli->real_escape_string($_POST['username']);
$pass = hash('sha1', $mysqli->real_escape_string($_POST['password']));

$sql = "SELECT * FROM users, t_role WHERE users.name='$user' and users.password='$pass' and t_role.id_role=users.id_role";
$result = $mysqli->query($sql);
$baris = $result->num_rows;

if($baris==1){
  while($row=$result->fetch_object()){
    if($row->name=='yoga' || $row->name=='hendra' || $row->name=='brenda' || $row->name=='ridwan'
    || $row->name=='erdhi' || $row->name=='bernardhi'
  ){
      $_SESSION['admin']=$row->name;
      if($row->name == 'yoga'){
        $_SESSION['dospem']='ADY';
      }
      if($row->name == 'hendra'){
        $_SESSION['dospem']='FXH';
      }
      if($row->name == 'brenda'){
        $_SESSION['dospem']='TBR';
      }
      if($row->name == 'ridwan'){
        $_SESSION['dospem']='RS';
      }
      if($row->name == 'erdhi'){
        $_SESSION['dospem']='EWN';
      }
      if($row->name == 'bernardhi'){
        $_SESSION['dospem']='BH';
      }
      header("location:si_admin/");
    }else{
      $_SESSION['user']=$row->name;
      header("location:home.php");
    }
  }
}else{
  $_SESSION['user']=null;
  $_SESSION['admin']=null;
  header("location:index.php");
}
 ?>
