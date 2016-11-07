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
    <!--Github : github.com/lintangtimur-->

    <style type="text/css">
    .display-none{
      display: none;
    }
    </style>
    <div class="container">
      <div class="page-header">
        <h1>Input KTP</h1>
        <h4>Hasil liat dibawah FORM</h4>
      </div>
      <?php
      $kolom = array();
      $sql_show_column = "show columns from ktp";
      $res = $mysqli->query($sql_show_column);
      while($row = $res->fetch_object()){
        $kolom[] = $row->Field;
      }

      //Cek Apakah akan ada update
      if(isset($_GET['nik']) && isset($_GET['kode_camat'])){
        $nik = $_GET['nik'];
        $kode_camat = $_GET['kode_camat'];
        $sql = "select * from ktp,kecamatan where ktp.nik='$nik' and kecamatan.kode_kecamatan='$kode_camat'";
        $result = $mysqli->query($sql);

        //menyimpan variable ke dalam array
        while($row = $result->fetch_object()){
          foreach ($kolom as $var) {
            $data[] = array($var => $row->$var);
          }
        }
        //print_r($data); //Ngecek Data bentuk Array
        $ro = 'readonly';
      }else{//Jika tidak update
        $ro = null;
        $data = null;
      }

      if(isset($_GET['edit']) && $_GET['edit']==='true'){
        $value = "UPDATE";
      }else{
        $value = "SUBMIT";
      }
       ?>
      <!--Konten-->
      <form id="formKTP" method="post">
        <table class="table table-bordered table-responsive table-hover">
          <tr>
            <td>NIK</td>
            <td><input  class='form-control' type="text" maxlength="16" name="nik" <?php echo $ro;?> value="<?php echo $data[0]["nik"];?>"></td>
          </tr>
          <tr>
            <td>NAMA</td>
            <td><input type="text" name="nama" class='form-control' value="<?php echo $data[1]["nama"];?>"></td>
          </tr>
          <tr>
            <td>Tempat Lahir</td>
            <td><input type="text" name="tempat_lahir" class='form-control' value="<?php echo $data[2]["tempat_lahir"];?>"></td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td><input type="date" name="tgl_lahir" class='form-control' value="<?php echo $data[3]["tgl_lahir"];?>"></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td><input type="text" name="kelamin" class='form-control' value="<?php echo $data[4]["jenis_kelamin"];?>"></td>
          </tr>
          <tr>
            <td>Golongan Darah</td>
            <td><input type="text" name="goldar" class='form-control' value="<?php echo $data[5]["golongan_darah"];?>"></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><input type="text" name="alamat" class='form-control' value="<?php echo $data[6]["alamat"];?>"></td>
          </tr>
          <tr>
            <td>RT RW</td>
            <td><input type="text" name="rtrw" class='form-control' value="<?php echo $data[7]["rtrw"];?>"></td>
          </tr>
          <tr>
            <td>Kelurahan Desa</td>
            <td><input type="text" name="keldes" class='form-control' value="<?php echo $data[8]["keldes"];?>"></td>
          </tr>
          <tr>
            <td>Kode Kecamatan</td>
            <td><select class="form-control" name="kode_kecamatan">
              <option selected>PILIH</option>
              <?php
              $sql = 'select * from kecamatan';
              $result = $mysqli->query($sql);
              while($row = $result->fetch_object()){
                if($data[9]["kode_kecamatan"] === $row->kode_kecamatan){
                  echo "<option value='$row->kode_kecamatan' selected>$row->kode_kecamatan.$row->nama_kecamatan</option>";
                }else{
                  echo "<option value='$row->kode_kecamatan'>$row->kode_kecamatan</option>";
                }
              }
               ?>
            </select></td>
          </tr>
          <tr>
            <td>Agama</td>
            <td><input type="text" name="agama" class='form-control' value="<?php echo $data[10]["agama"];?>"></td>
          </tr>
          <tr>
            <td>Status Kawin</td>
            <td><input type="text" name="stkawin" class='form-control' value="<?php echo $data[11]["statuskawin"];?>"></td>
          </tr>
          <tr>
            <td>Pekerjaan</td>
            <td><input type="text" name="pekerjaan" class='form-control' value="<?php echo $data[12]["pekerjaan"];?>"></td>
          </tr>
          <tr>
            <td>KWN</td>
            <td><input type="text" name="kwn" class='form-control' value="<?php echo $data[13]["kwn"];?>"></td>
          </tr>
          <tr>
            <td>Berlaku</td>
            <td><input type="date" name="berlaku" class='form-control' value="<?php echo $data[14]["berlaku"];?>"></td>
          </tr>
          <tr>
            <td>Tanggal Ditandatangani</td>
            <td><input type="date" name="ttd" class='form-control' value="<?php echo $data[15]["tgl_ditandatangani"];?>"></td>
          </tr>
          <input type="hidden" name="hidden" value="<?php echo $value;?>">
          <tr>
            <td></td>
            <td><button type="submit" class="btn btn-success" name="submit"><?php echo $value;?></button></td>
          </tr>
        </table>
      </form>
    </div>

<div class="container-fluid">
  <div id="disini" class="table-responsive"></div>
</div>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
