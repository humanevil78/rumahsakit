<?php 
include_once '../_header.php';

// Get UUID from libs assets
use Ramsey\Uuid\Uuid;

if(isset($_POST['add'])){
    $value = $_POST['add'];
    $uuid = Uuid::uuid4();
    $noIdentitas = mysqli_real_escape_string($con, $_POST['noIdentitas']);
    $nama = mysqli_real_escape_string($con, $_POST['namaPasien']);
    $jenisKelamin = mysqli_real_escape_string($con, $_POST['jenisKelamin']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
    $telpon = mysqli_real_escape_string($con, $_POST['noTelpon']);
    mysqli_query($con,"SELECT * FROM tpasien WHERE no_identitas = '$noIdentitas'");
    $idValidasi = mysqli_affected_rows($con);
    if ($idValidasi > 0) {
        echo "<script>alert('Nomor identitas sudah terdaftar!')</script><script>window.location='index.php'</script>";
    } else {
        $query = "INSERT INTO tpasien (id_pasien, no_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES ('$uuid', $noIdentitas, '$nama', '$jenisKelamin', '$alamat', '$telpon')";
        mysqli_query($con, $query);
        $res = mysqli_affected_rows($con);
    }
} else
if(isset($_POST['edit'])){
    $value = $_POST['edit'];
    $id =  mysqli_real_escape_string($con, $_POST['id']);
    $noIdentitas = mysqli_real_escape_string($con, $_POST['noIdentitas']);
    $nama = mysqli_real_escape_string($con, $_POST['namaPasien']);
    $jenisKelamin = mysqli_real_escape_string($con, $_POST['jenisKelamin']);
    $alamat = mysqli_real_escape_string($con, $_POST['alamat']);
    $telpon = mysqli_real_escape_string($con, $_POST['noTelpon']);
    mysqli_query($con,"SELECT * FROM tpasien WHERE no_identitas = '$noIdentitas' and id_pasien != '$id' ");
    $idValidasi = mysqli_affected_rows($con);
    if ($idValidasi > 0) {
        echo "<script>alert('Nomor identitas sudah terdaftar!')</script><script>window.location='index.php'</script>";
    } else {
        $query = "UPDATE tpasien SET no_identitas = '$noIdentitas', nama_pasien = '$nama', jenis_kelamin = '$jenisKelamin', alamat = '$alamat', no_telp = '$telpon' WHERE id_pasien = '$id'";
        mysqli_query($con, $query);
        $res = mysqli_affected_rows($con);
    }
} else
if(isset($_POST['import'])){
    $value = $_POST['import'];
    $file = $_FILES['file']['name'];
    $ekstensi = explode(".", $file);
    $fileName = "file-".round(microtime(true)).".".end($ekstensi);
    $sumber = $_FILES['file']['tmp_name'];
    $targetDir = "../_file/";
    $targetFile = $targetDir.$fileName;
    $upload = move_uploaded_file($sumber, $targetFile);
    
    $obj = PHPExcel_IOFactory::load($targetFile);
    $allData = $obj->getActiveSheet()->toArray(null, true, true, true);

    $query = "INSERT INTO tpasien (id_pasien, no_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES";
    for($i = 3; $i <= count($allData); $i++){
        $uuid = Uuid::uuid4();
        $no_id = $allData[$i]['A'];
        $nama = $allData[$i]['B'];
        $jk = $allData[$i]['C'];
        $alamat = $allData[$i]['D'];
        $telp = $allData[$i]['E'];
        $query .= " ('$uuid', '$no_id', '$nama', '$jk', '$alamat', '$telp'),";
    }
    $query = substr($query, 0, -1);
    
    mysqli_query($con, $query) or die (mysqli_error($con));

    if($upload){
        $res = 1;
        unlink($targetFile);
    }
}    
if($res>0){
    echo "<script>alert('Data Berhasil Di $value')</script><script>window.location='index.php'</script>";
} else {
    echo "<script>alert('Data Gagal Di $value')</script><script>window.location='index.php'</script>";
}