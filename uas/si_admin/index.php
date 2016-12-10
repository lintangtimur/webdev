<?php
  include '../config/login.php';
  session_start();
  if(!isset($_SESSION['admin'])){
    header("location:../index.php");
  }

  $us = $_SESSION['admin'];
  $sql = "SELECT COUNT(berkas) as TOTAL FROM mahasiswa_uas WHERE owner='$us'";
  $hasil = $mysqli->query($sql);
  // while($row = $hasil->fetch_object()){
  //   $final =
  // }
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="../assets/css/bootstrap.css">
     <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
     <title>Program rekapitulasi dan rencana publikasi ilmiah Sistem Informasi</title>
   </head>
   <body>
     <style>
     body{
       margin-top: 75px;
       background-color:rgb(49, 63, 105);
     }
     th{
       text-align: center;
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
     #footer{
       bottom: 0;
       position: absolute;
     }
     .credit{
       color: rgb(65, 251, 218);
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

     <div class="container-fluid">
       <div class="panel panel-success">
         <div class="panel-heading">
           <div class="panel-body">
             <table class="table table-responsive table-bordered table-hover text-center">
               <tr>
                 <th>NO</th>
                 <th>NAMA 1</th>
                 <th>NAMA 2</th>
                 <th>JUDUL</th>
                 <th>Tanggal</th>
                 <th>ABSTRAK</th>
                 <th>BERKAS</th>
                 <th width="100px">ACC</th>
                 <th>COMMENT</th>
                 <th>History</th>
                 <th>FINAL</th>
               </tr>
       <?php
       $dospem = $_SESSION['dospem'];
       $sql = "SELECT * FROM mahasiswa_uas  where kode_dospem='$dospem'";
       $result = $mysqli->query($sql);
       $i=1;
       while($row = $result->fetch_object()){
         if($row->accepted=='1'){
           $status = "<span class='label label-success'>Sudah</span>";
         }else{
           $status = "<span class='label label-warning'>Belum</span>";
         }
         echo "<tr>
              <td>$i</td>
              <td>$row->nama1</td>
              <td>$row->nama2</td>
              <td>$row->judul</td>
              <td>$row->tanggal</td>
              <td>
                  <button type='button' id='$row->berkas' class='btn btn-default openModal' aria-label='Left Align'>
                  <span class='glyphicon glyphicon-eye-open' aria-hidden='rue'> ViewAbstrak</span>
                </button>
              </td>
              <td data-toggle='tooltip' data-placement='top' title='$row->berkas'><a href='../uploads/$row->berkas'><i class='fa fa-file fa-3x' aria-hidden='true'></i></a></td>
              <td>
                <a href='accept.php?id=$row->judul&nama1=$row->nama1&nama2=$row->nama2&opt=0' class='btn btn-danger'><i class='fa fa-times' aria-hidden='true'></i></a>
                <a href='accept.php?id=$row->judul&nama1=$row->nama1&nama2=$row->nama2&opt=1' class='btn btn-success'><i class='fa fa-check-circle-o' aria-hidden='true'></i></a>
              </td>
              <td>
              <form class='form-group' action='comment.php' method='post'>
                <textarea class='form-control' name='comment'></textarea>
                <input type='hidden' name='nama1' value='$row->nama1'>
                <input type='hidden' name='nama2' value='$row->nama2'>
                <input type='hidden' name='judul' value='$row->judul'>
                <button type='submit'>ADD</button>
              </form>

              </td>
              <td><a href='history.php?id=$row->judul' class='btn btn-default btn-large'><i class='fa fa-history' aria-hidden='true'></i></a></td>
              <td>$status</td>
         </tr>";
         $i++;
       }
       ?>
       </table>
     </div>
     </div>
     </div>
     </div>
     <!--modal abtstrak-->
     <div class="modal fade bs-example-modal-lg" id="abstrak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
       <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
           <div class="modal-header">
               <h4>ABSTRAK</h4>
               <div class="modal-body"></div>
           </div>
         </div>
       </div>
     </div>

     <div id="footer">
       <div class="container text-center">
         <p class="text-muted  credit">Kelompok 3 - Stefanus Lintang Timur Aji Pamungkas</p>
       </div>
     </div>

     <script src="../assets/js/jquery.js"></script>
     <script src="../assets/js/bootstrap.min.js"></script>
     <script type="text/javascript">
     $('.openModal').click(function(e){
       var m = $(this).attr("id");
       $.ajax({
         url: 'viewAbstrak.php',
         type: 'post',
         data: {modal_id: m},
         dataType: 'html',
         success: function(ajaxData){
           $(".modal-body").html(ajaxData);
           $("#abstrak").modal('show');
         }
       });
     });
     </script>
   </body>
 </html>
