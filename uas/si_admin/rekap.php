<?php
include '../config/login.php';
session_start();
if(!isset($_SESSION['admin'])){
  header("location:../index.php");
}
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Program rekapitulasi dan rencana publikasi ilmiah Sistem Informasi</title>
     <link rel="stylesheet" href="../assets/css/bootstrap.css">
     <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
   </head>
   <body>
   <style>
   body{
     margin-top: 95px;
   }
   th{
     text-align: center;
   }
   #footer{
     bottom: 0;
     position: absolute;
   }

   .navbar{
     border-radius: 0;
     background-color: hsla(201, 84%, 46%, 0.86);
     border-color: hsla(201, 84%, 46%, 0.86);
     -webkit-box-shadow: 0px 10px 23px 2px rgba(0,0,0,0.42);
     -moz-box-shadow: 0px 10px 23px 2px rgba(0,0,0,0.42);
     box-shadow: 0px 10px 23px 2px rgba(0,0,0,0.42);
   }
   .navbar-default .navbar-nav > li > a{
     color: white;
   }
   .navbar-default .navbar-nav > li > a:hover{
     color: black;
     background-color: white;
   }
   .input-group{
     display: inline;
   }

   /*.navbar-default{
     background-color:rgb(42, 51, 46);
     border-color: rgb(42, 51, 46);
   }
   .navbar-default .navbar-nav > li > a{
     color: rgb(255, 240, 247);
   }*/
   .badge{
     background-color: #0fbf13;
   }
 </style>
     <div class="container">
       <nav class="navbar navbar-default navbar-fixed-top">
       <div class="container-fluid">
       <!-- Brand and toggle get grouped for better mobile display -->
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <!-- <a class="navbar-brand" href="#">Brand</a> -->
       </div>

       <!-- Collect the nav links, forms, and other content for toggling -->
       <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <ul class="nav navbar-nav">
         </ul>
         <ul class="nav navbar-nav navbar-right">
           <li><a href="index.php">HOME</a></li>
           <li><a href="rekap.php">Rekap</a></li>
           <li><a href="../aboutus.php">About US</a></li>
           <li class="dropdown">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="badge"></span> Login sebagai <?php echo $_SESSION['admin']; ?> <span class="caret"></span></a>
             <ul class="dropdown-menu">
               <li><a href="../logout.php"><i class="glyphicon glyphicon-log-in"></i> LogOut</a></li>
             </ul>
           </li>
         </ul>
       </div><!-- /.navbar-collapse -->
       </div><!-- /.container-fluid -->
       </nav>
       <div class="row">
         <div class="col-md-12">
           <table class="table table-border table-responsive text-center">
             <tr>
               <th>NO</th>
               <th>NAMA 1</th>
               <th>NAMA 2</th>
               <th>JUDUL</th>
               <th>DOSEN PEMBIMBING</th>
             </tr>
             <?php
             $i=1;
             $sql = "SELECT * FROM mahasiswa_uas, dosen where mahasiswa_uas.kode_dospem=dosen.kode and mahasiswa_uas.accepted='1'";
             $res = $mysqli->query($sql);
             while($row=$res->fetch_object()){
               echo "<tr>
                 <td>$i</td>
                 <td>$row->nama1</td>
                 <td>$row->nama2</td>
                 <td>$row->judul</td>
                 <td>$row->nama_dosen</td>
               </tr>";
               $i++;
             }
              ?>
           </table>
         </div>
       </div>
     </div>
     <div id="footer" class="text-center">
       <div class="container">
         <p class="text-muted  credit">Kelompok 3 - Stefanus Lintang Timur Aji Pamungkas</p>
       </div>
     </div>
     <script src="../assets/js/jquery.js"></script>
     <script src="../assets/js/bootstrap.min.js"></script>
   </body>
 </html>
