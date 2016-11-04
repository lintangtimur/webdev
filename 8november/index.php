<!DOCTYPE html>
<html>
<?php include 'config/connection.php'; ?>
  <head>
    <meta charset="utf-8">
    <title>Input KTP</title>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
  </head>
  <body>
    <style type="text/css">

    </style>
    <div class="container">
      <div class="page-header">
        <h1>Input KTP</h1>
      </div>
      <?php
      if(isset($_GET['nik']) && isset($_GET['kode_camat'])){
        $nik = $_GET['nik'];
        $kode_camat = $_GET['kode_camat'];
        $sql = "select * from ktp,kecamatan where ktp.nik='$nik' and ktp.kode_kecamatan='$kode_camat'";
        $result = $mysqli->query($sql);
        while($row = $result->fetch_object()){
          $nik =$row->nik;
          $camat = $row->kode_kecamatan;
        }
      }else{
        $nik = null;
        $camat = null;
      }
       ?>
      <!--Konten-->
      <form id="formKTP" method="post">
        <table class="table table-bordered table-responsive table-hover">
          <tr>
            <td>NIK</td>
            <td><input class='form-control' type="text" maxlength="16" name="nik" value="<?php echo $nik;?>"></td>
          </tr>
          <tr>
            <td>NAMA</td>
            <td><input type="text" name="nama" class='form-control'></td>
          </tr>
          <tr>
            <td>Tempat Lahir</td>
            <td><input type="text" name="tempat_lahir" class='form-control'></td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td><input type="date" name="tgl_lahir" class='form-control'></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td><input type="text" name="kelamin" class='form-control'></td>
          </tr>
          <tr>
            <td>Golongan Darah</td>
            <td><input type="text" name="goldar" class='form-control'></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" class='form-control'></td>
          </tr>
          <tr>
            <td>RT RW</td>
            <td><input type="text" name="rtrw" class='form-control'></td>
          </tr>
          <tr>
            <td>Kelurahan Desa</td>
            <td><input type="text" name="keldes" class='form-control'></td>
          </tr>
          <tr>
            <td>Kode Kecamatan</td>
            <td><select class="form-control" name="kode_kecamatan">
              <option selected>PILIH</option>
              <?php
              $sql = 'select * from kecamatan';
              $result = $mysqli->query($sql);
              while($row = $result->fetch_object()){
                if($camat === $row->kode_kecamatan){
                  echo "<option value='$row->kode_kecamatan' selected>$row->kode_kecamatan</option>";
                }else{
                  echo "<option value='$row->kode_kecamatan'>$row->kode_kecamatan</option>";
                }
              }
               ?>
            </select></td>
          </tr>
          <tr>
            <td>Agama</td>
            <td><input type="text" name="agama" class='form-control'></td>
          </tr>
          <tr>
            <td>Status Kawin</td>
            <td><input type="text" name="stkawin" class='form-control'></td>
          </tr>
          <tr>
            <td>Pekerjaan</td>
            <td><input type="text" name="pekerjaan" class='form-control'></td>
          </tr>
          <tr>
            <td>KWN</td>
            <td><input type="text" name="kwn" class='form-control'></td>
          </tr>
          <tr>
            <td>Berlaku</td>
            <td><input type="date" name="berlaku" class='form-control'></td>
          </tr>
          <tr>
            <td>Tanggal Ditandatangani</td>
            <td><input type="date" name="ttd" class='form-control'></td>
          </tr>

          <tr>
            <td></td>
            <td><button type="submit" class="btn btn-success">ADD</button></td>
          </tr>
        </table>
      </form>
    </div>

<div class="container">
  <div id="disini" class="table-responsive"></div>
</div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script>
    $(document).ready(function(){
      $('#formKTP').submit(function(event){
        event.preventDefault();
        $.ajax({
          type: 'POST',
          url : 'test.php',
          data : $('#formKTP').serialize()
        })
        .done(function(data){
          console.log(data);
          $('#disini').html(data);
        })
        .fail(function(data){
          console.log(data);
        });
      })
    })
    </script>
  </body>
</html>
