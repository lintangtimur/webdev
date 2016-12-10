<?php
session_start();
if(!isset($_SESSION['user'])){
  header("location:index.php");
}
else{
  include 'config/login.php';
$user = $_SESSION['user'];
$nama1 = $_POST['nama1'];
$nama2 = $_POST['nama2'];
$dospem = $mysqli->real_escape_string($_POST['dospem']);
$judul = $mysqli->real_escape_string($_POST['judul']);
$tgl = $mysqli->real_escape_string($_POST['tanggal']);
$abstrak = $mysqli->real_escape_string($_POST['abstrak']);
$file = $mysqli->real_escape_string($_FILES['berkas']['name']);
$file_size = $_FILES['berkas']['size'];
$folder = "uploads/";
$file_loc = $_FILES['berkas']['tmp_name'];

move_uploaded_file($file_loc, $folder.$file);
$sql = "INSERT INTO mahasiswa_uas set nama1='$nama1', nama2='$nama2', kode_dospem='$dospem', judul='$judul', tanggal='$tgl',abstrak='$abstrak', berkas='$file', file_size='$file_size', owner='$user'";
if($mysqli->query($sql)){
  showTable($mysqli,$user);
  $mysqli->close();
}else{
  echo $mysqli->error;
}

}
function showTable($mysqli,$user){
  $sql = "SELECT * FROM mahasiswa_uas,dosen where owner='$user' AND mahasiswa_uas.kode_dospem=dosen.kode";
  $result =$mysqli->query($sql);
  $i=1;
  echo "
  <table class='table table-bordered table-hover table-responsive text-center'>
          <tr>
            <th>NO</th>
            <th width='200px'>NAMA 1</th>
            <th width='200px'>NAMA 2</th>
            <th>Dosen Pembimbing</th>
            <th>Judul</th>
            <th width='100'>Tanggal</th>
            <th>Comment</th>
            <th>STATUS</th>
            <th>Upload Revisi</th>
            <th>Option</th>
          </tr>
  ";
  while($row=$result->fetch_object()){
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
}
?>
