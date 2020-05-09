<?php 
include_once '../_header.php';

// Get UUID from libs assets
use Ramsey\Uuid\Uuid;

if(isset($_POST['add'])){
    $value = $_POST['add'];
    for($i = 1 ; $i <= $_POST['totalData']; $i++){
        $uuid = Uuid::uuid4();
        $nama = mysqli_real_escape_string($con, $_POST['nama-'.$i]);
        $gedung = mysqli_real_escape_string($con, $_POST['gedung-'.$i]);
        $query = "INSERT INTO tpoli (id_poli, nama_poli, gedung) VALUES ('$uuid', '$nama', '$gedung')";
        mysqli_query($con, $query);
    }
    $res = mysqli_affected_rows($con);
}
if(isset($_POST['edit'])){
    $value = $_POST['edit'];
    for($i = 0; $i < count($_POST['id']) ; $i++){
        $id = mysqli_real_escape_string($con, $_POST['id'][$i]);
        $nama = mysqli_real_escape_string($con, $_POST['nama'][$i]);
        $gedung = mysqli_real_escape_string($con, $_POST['gedung'][$i]);
        $query = "UPDATE tpoli SET nama_poli = '$nama', gedung = '$gedung' WHERE id_poli = '$id'";
        mysqli_query($con, $query);
    }
    $res = mysqli_affected_rows($con);
}
if($res>0){
    echo "<script>alert('Data Berhasil Di $value')</script><script>window.location='index.php'</script>";
} else {
    echo "<script>alert('Data Gagal Di $value')</script><script>window.location='index.php'</script>";
}