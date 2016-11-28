<?php
$target_path = "uploads/";
$target_path = $target_path. basename($_FILES['berkas']['name']);
$asd = explode(".", $_FILES['berkas']['name']);
$ext = end($asd);
if($ext!="png"){
  echo "Harus PNG";
}else{
  if(move_uploaded_file($_FILES['berkas']['tmp_name'], $target_path)){
    echo "File has been uploaded<br>";
    echo "Tipe: ".$_FILES['berkas']['type']."<br>";
    $fileSize = $_FILES['berkas']['size']/1024;
    echo "Ukuran Bytes : ".$_FILES['berkas']['size']." Bytes<br>";
    echo "Ukuran Kb : ".$fileSize." Kb";
  }else{
    echo "There was an error uploading the file, please try again";
  }
}
 ?>
