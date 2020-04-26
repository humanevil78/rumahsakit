<?php 
include_once '../_header.php';

// Get UUID from libs assets
use Ramsey\Uuid\Uuid;

if(isset($_POST['add'])){
    $value = $_POST['add'];
    $uuid = Uuid::uuid4();
    $nama = mysqli_real_escape_string($con, $_POST['namaObat']);
    $ket = mysqli_real_escape_string($con, $_POST['ketObat']);
    $query = "INSERT INTO tobat (id_obat, nama_obat, ket_obat) VALUES ('$uuid', '$nama', '$ket')";
    mysqli_query($con, $query);
    $res = mysqli_affected_rows($con);
    var_dump($res);
}
if(isset($_POST['edit'])){
    $value = $_POST['edit'];
    $id = mysqli_real_escape_string($con, $_POST['idObat']);
    $nama = mysqli_real_escape_string($con, $_POST['namaObat']);
    $ket = mysqli_real_escape_string($con, $_POST['ketObat']);
    $query = "UPDATE tobat SET nama_obat = '$nama', ket_obat = '$ket' WHERE id_obat = '$id'";
    mysqli_query($con, $query);
    $res = mysqli_affected_rows($con);
    var_dump($res);
}
if($res>0){
    echo "<script>alert('Data Berhasil Di $value')</script><script>window.location='index.php'</script>";
} else {
    echo "<script>alert('Data Gagal Di $value')</script><script>window.location='index.php'</script>";
}