<?php
  include 'config/login.php';
  session_start();
  if(!isset($_SESSION['user'])){
    header("location:index.php");
  }
  $us = $_SESSION['user'];
  $sql = "SELECT COUNT(berkas) as TOTAL FROM mahasiswa_uas WHERE owner='$us'";
  $hasil = $mysqli->query($sql);
  if($hasil){
    while($row = $hasil->fetch_object()){
      $jumlah_berkas = $row->TOTAL;
      if($jumlah_berkas==0){
        $jumlah_berkas = null;
        $dospem=null;
      }
    }
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
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

      .credit{
        color: rgb(65, 251, 218);
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
      .btn{
        text-decoration: none;
        color: #fff;
        background-color: #26a69a;
        text-align: center;
        letter-spacing: .5px;
        transition: .2s ease-out;
        cursor: pointer;
        border-radius: 0px;
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
        <li><a href="aboutus.php">About US</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="badge"><?php echo $jumlah_berkas; ?></span> Login sebagai <?php echo $_SESSION['user']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout.php"><i class="glyphicon glyphicon-log-in"></i> LogOut</a></li>
          </ul>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <!-- Main Content-->
    <div class="container">
      <div class="main_container">
        <div class="col-md-12 left-col">
          <div class="panel panel-primary" >
            <div class="panel-heading"  data-toggle="collapse" data-target="#showPanel"><i class="fa fa-plus-square" aria-hidden="true"></i> Click To Show</div>
            <div class="panel-body collapse" id="showPanel">
              <!--  Form untuk mahasiswa-->
              <div class="row">
                <div class="col-md-8">
                  <!--FORM -->
                  <form class="form-horizontal" id="inputForm" action="input.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="control-label col-md-4">Nama1:</label>
                        <div class="col-md-8">
                        <div class="input-group input-field">
                          <input type="text" class="form-control" required value="" name="nama1"placeholder="Masukkan nama">
                      </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-4">Nama2:</label>
                        <div class="col-md-8">
                        <div class="input-group">
                          <input type="text" class="form-control" required value="" name="nama2"placeholder="Masukkan nama">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-4">Dosen pembimbing :</label>
                      <div class="col-md-8">
                        <div class="input-group">
                          <select class="form-control" name="dospem" required>
                            <option selected="" value="">Pilih</option>
                            <?php
                            $sql = "SELECT * from dosen";
                            $result = $mysqli->query($sql);
                            while($row = $result->fetch_object()){
                              if($dospem==$row->kode){
                                echo "<option value='$row->kode' selected>$row->nama_dosen</option>";
                              }else{
                                echo "<option value='$row->kode'>$row->nama_dosen</option>";
                              }
                          }
                          // $mysqli->close();
                          ?>
                          </select>
                        </div>
                      </div>
                  </div>



                  <div class="form-group">
                    <label class="control-label col-md-4">Judul:</label>
                      <div class="col-md-8">
                      <div class="input-group">
                    <input type="text" class="form-control" value="" required name="judul"placeholder="Masukkan judul">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Tanggal:</label>
                    <div class="col-md-8">
                    <div class="input-group">
                      <input type="date" class="form-control" required value="" name="tanggal">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-4">Abstrak:</label>
                    <div class="col-md-8">
                    <div class="input-field">
                      <textarea name="abstrak" class="form-control" required rows="8" cols="80"></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-group">
              	   <label class="control-label col-md-4">Laporan Ilmiah:</label>
                    <div class="col-md-8">
                      <div class="input-group">
                        <input type="file" name="berkas" required accept=".doc,.docx,.xml,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                   </div>
                 </div>
              </div>


                </div>
              </div> <!--End Row col md 4-->
            </div>
            <div class="panel-footer">
              <div class="form-group">
                <div class="col-md-offset-2">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </div>
                </form>
            </div>
        </div> <!--Panel Primary end tag-->
        </div>
      </div>

    </div>

    <!--Untuk Hasil Input akan tampil disini-->
    <div class="container-fluid">
      <div class="panel panel-success">
        <div class="panel-body" id="hasil">
          <table class="table table-bordered table-hover table-responsive text-center">
        <tr>
          <th>NO</th>
          <th width="150px">NAMA 1</th>
          <th width="150px">NAMA 2</th>
          <th width="200px">Dosen Pembimbing</th>
          <th width="200px">Judul</th>
          <th width="100">Tanggal</th>
          <th>Comment</th>
          <th>STATUS</th>
          <th>Upload Revisi</th>
          <th>Option</th>
        </tr>
      <?php
      $user = $_SESSION['user'];
      $sql3 = "SELECT * FROM mahasiswa_uas,dosen where owner='$user' AND mahasiswa_uas.kode_dospem=dosen.kode";
      $result3 = $mysqli->query($sql3);
      $i =1;
      $folder = "uploads/";

      while($row = $result3->fetch_object()){
        if($row->accepted=='1'){
          $status = "<span class='label label-success'>Sudah</span>";
        }else{
          $status = "<span class='label label-warning'>Belum</span>";
        }
        echo "<tr>
                <td>$i</td><td>$row->nama1</td><td>$row->nama2</td><td>$row->nama_dosen</td>
                <td>$row->judul</td><td>$row->tanggal</td>
                <td><a href='view.php?judul=$row->judul' class='btn btn-default'>Lihat</a></td>
                <td>$status</td>

                <td>
                  <form class='form-horizontal' id='inputRevisi' action='uploadRevisi.php' method='post' enctype='multipart/form-data'>
                    <input type='file' name='berkas2' required accept='.doc,.docx,.xml,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document'>
                    <input type='hidden' name='judulRev' value='$row->judul'>
                </td>
                <td>
                <button type='submit' class='btn btn-success'>Submit</button>
              </form>
                </td>
        </tr>";
        $i++;
      }

       ?>
          </table>
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

    <!-- <div class="footer">
       <div class="container narrow row-fluid">
          <div class="span4">
            Program rekapitulasi dan rencana publikasi ilmiah Sistem Informasi
          </div>
          <div class="span3">
            Kelompok 3 - Lintang
          </div>

       </div>
    </div> -->
    <div id="footer">
      <div class="container text-center">
        <p class="text-muted  credit">Kelompok 3 - Stefanus Lintang Timur Aji Pamungkas</p>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script> -->
    <script>
$(document).ready(function(){
  $("#showPanel").on("hide.bs.collapse", function(){
    $(".panel-heading").html('<i class="fa fa-plus-square" aria-hidden="true"></i> Click to Show');
  });
  $("#showPanel").on("show.bs.collapse", function(){
    $(".panel-heading").html('<i class="fa fa-minus-square" aria-hidden="true"></i> Click to Hide');
  });

  $('[data-toggle="tooltip"]').tooltip();
  $('.openModal').click(function(e){
    var m = $(this).attr("id");
    $.ajax({
      url: 'viewAbstrak.php',
      type: 'get',
      data: {modal_id: m},
      dataType: 'html',
      success: function(ajaxData){
        $(".modal-body").html(ajaxData);
        $("#abstrak").modal('show');
      }
    });
  });


  $("form#inputForm").submit(function(){
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: 'input.php',
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
            $("#hasil").html(data);
          },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
  });
});
</script>
  </body>
</html>
