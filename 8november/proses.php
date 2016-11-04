<?php
include 'config/connection.php';
function print_header_table(){
echo "<tr>
    <td>No</td>
    <td>NIK</td>
    <td>Nama</td>
    <td>Tempat Lahir</td>
    <td>Tanggal Lahir</td>
    <td>Jenis Kelamin</td>
    <td>Golongan Darah</td>
    <td>Alamat</td>
    <td>RT-RW</td>
    <td>Kelurahan-Desa</td>
    <td>kecamatan</td>
    <td>agama</td>
    <td>Status kawin</td>
    <td>Pekerjaan</td>
    <td>KWN</td>
    <td>BERLAKU</td>
    <td>TTD</td>
    <td>OPTION</td>
  </tr>";
}
$nik = htmlspecialchars($_POST['nik']);
$nama = htmlspecialchars($_POST['nama']);
$tmlahir = htmlspecialchars($_POST['tempat_lahir']);
$tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
$jenis_kelamin = htmlspecialchars($_POST['kelamin']);
$goldar = htmlspecialchars($_POST['goldar']);
$alamat = htmlspecialchars($_POST['alamat']);
$rtrw = htmlspecialchars($_POST['rtrw']);
$keldes = htmlspecialchars($_POST['keldes']);
$kecamatan = htmlspecialchars($_POST['kode_kecamatan']);
$agama = htmlspecialchars($_POST['agama']);
$stkawin = htmlspecialchars($_POST['stkawin']);
$pekerjaan = htmlspecialchars($_POST['pekerjaan']);
$kwn = htmlspecialchars($_POST['kwn']);
$berlaku = htmlspecialchars($_POST['berlaku']);
$ttd = htmlspecialchars($_POST['ttd']);
$sql1 = "SHOW columns FROM ktp";
$hasil = $mysqli->query($sql1);
$sql = "INSERT INTO ktp(nik,nama,tempat_lahir,tgl_lahir,jenis_kelamin,
  golongan_darah, alamat, rtrw,keldes,kode_kecamatan,
  agama,statuskawin,pekerjaan,kwn,
  berlaku,tgl_ditandatangani)
  VALUES ('$nik', '$nama', '$tmlahir', '$tgl_lahir', '$jenis_kelamin',
      '$goldar', '$alamat', '$rtrw', '$keldes', '$kecamatan', '$agama', '$stkawin',
      '$pekerjaan','$kwn', '$berlaku', '$ttd')";
$data = array();
if($mysqli->query($sql)){
  $query = "select * from ktp,kecamatan where ktp.kode_kecamatan=kecamatan.kode_kecamatan";
  $result = $mysqli->query($query);
  echo "<table class='table table-responsive table-hover'>";
  print_header_table();
  $i =0;
  while($row = $result->fetch_object()){
    $i++;
    $link = "nik=$row->nik&kode_camat=$row->kode_kecamatan";
    $encode = base64_encode($link);
    echo "<tr>
            <td>$i</td>
            <td>$row->nik</td>
            <td>$row->nama</td>
            <td>$row->tempat_lahir</td>
            <td>$row->tgl_lahir</td>
            <td>$row->jenis_kelamin</td>
            <td>$row->golongan_darah</td>
            <td>$row->alamat</td>
            <td>$row->rtrw</td>
            <td>$row->keldes</td>
            <td>$row->nama_kecamatan</td>
            <td>$row->agama</td>
            <td>$row->statuskawin</td>
            <td>$row->pekerjaan</td>
            <td>$row->kwn</td>
            <td>$row->berlaku</td>
            <td>$row->tgl_ditandatangani</td>
            <td>
              <a href=index.php?$encode class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></a>

            </td>
          </tr>
          </table>
    ";
  }
}else{
  $data['lapor']= $mysqli->error;
  echo json_encode($data);
}

 ?>
