<?php
include '../config/login.php';
session_start();
if(!isset($_SESSION['admin'])){
  header("location:index.php");
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Rekapitulasi Jurnal Ilmiah</title>
     <link rel="stylesheet" href="../assets/css/bootstrap.css">
     <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
   </head>
   <body>
     <div class="container">
       <table class="table table-responsive table-bordered">
         <tr>
           <td>no</td>
           <td>comment</td>
           <td>Judul</td>

         </tr>
         <?php
         $judul=$_GET['id'];
         $sql = "SELECT * FROM history where judul='$judul'";
         $re = $mysqli->query($sql);
         $i=1;
         while($row=$re->fetch_object()){
           echo "<tr><td>$i</td><td>$row->comment</td><td>$row->judul</td></tr>";
           $i++;
         }
          ?>
       </table>
     </div>
   </body>
 </html>
