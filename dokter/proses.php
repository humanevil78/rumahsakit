<?php 
include_once '../_header.php';

// Get UUID from libs assets
use Ramsey\Uuid\Uuid;

if(isset($_POST['add'])){
    $value = $_POST['add'];
    $uuid = Uuid::uuid4();
    $nama = mysqli_real_escape_string($con, $_POST['namaDokter']);
    $spesialis = mysqli_real_escape_string($con, $_POST['spesialis']);
    $alamat = mysqli_real_escape_string($con, $_POST['Alamat']);
    $telpon = mysqli_real_escape_string($con, $_POST['noTelpon']);
    $query = "INSERT INTO tdokter (id_dokter, nama_dokter, spesialis, alamat, no_telp) VALUES ('$uuid', '$nama', '$spesialis', '$alamat', '$telpon')";
    mysqli_query($con, $query);
    $res = mysqli_affected_rows($con);
    var_dump($res);
}
if(isset($_POST['edit'])){
    $value = $_POST['edit'];
    $id = mysqli_real_escape_string($con, $_POST['idDokter']);
    $nama = mysqli_real_escape_string($con, $_POST['namaDokter']);
    $spesialis = mysqli_real_escape_string($con, $_POST['spesialis']);
    $alamat = mysqli_real_escape_string($con, $_POST['Alamat']);
    $telpon = mysqli_real_escape_string($con, $_POST['noTelpon']);
    $query = "UPDATE tdokter SET nama_dokter = '$nama', spesialis = '$spesialis', alamat = '$alamat', no_telp = '$telpon' WHERE id_dokter = '$id'";
    mysqli_query($con, $query);
    $res = mysqli_affected_rows($con);
    var_dump($res);
}
if($res>0){
    echo "<script>alert('Data Berhasil Di $value')</script><script>window.location='index.php'</script>";
} else {
    echo "<script>alert('Data Gagal Di $value')</script><script>window.location='index.php'</script>";
}