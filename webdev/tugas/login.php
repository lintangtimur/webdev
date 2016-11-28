<?php
session_start();

// if(!isset($_SESSION['user'])){
//   if(!$_SESSION['user']=='1'){
//     header("location:index.php");
//   }
// }

if($_SERVER['REQUEST_METHOD']=="POST"){
	$mysqli = new mysqli("localhost","root","","8nov");
	//PASSWORD = qwerty
	$user = $mysqli->real_escape_string($_POST['username']) ;
	$pass = hash("sha512", $mysqli->real_escape_string($_POST['password']));

	$sql="select * from users where username='$user' and password='$pass'";
	$result = $mysqli->query($sql);
	$baris = $result->num_rows;

	if($baris==1){
		$_SESSION['user']="1"; //LINTANG
		while($row = $result->fetch_object()){
			echo "Welcome ".$row->username."<br>";
			echo "<p><a href='satu.php'>SATU</a></p>";
			echo "<p><a href='dua.php'>DUA</a></p>";
			echo "<p><a href='tiga.php'>TIGA</a></p>";
			echo "<p><a href='logout.php'>LogOut</a></p>";
		}
	}else{
		$_SESSION['user']="0"; //LINTANG
			echo "GAGAL";
		}
}else{
	header("location:index.php");
}

?>
