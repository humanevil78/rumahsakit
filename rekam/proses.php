<?php 
include_once '../_header.php';

// Get UUID from libs assets
use Ramsey\Uuid\Uuid;

if(isset($_POST['add'])){
    $value = $_POST['add'];
    $uuid = Uuid::uuid4();
    $pasien = mysqli_real_escape_string($con, $_POST['pasien']);
    $dokter = mysqli_real_escape_string($con, $_POST['dokter']);
    $poli = mysqli_real_escape_string($con, $_POST['poli']);
    $tanggal = mysqli_real_escape_string($con, $_POST['tanggal']);
    $keluhan = mysqli_real_escape_string($con, $_POST['keluhan']);
    $diagnosa = mysqli_real_escape_string($con, $_POST['diagnosa']);
    
    $query = "INSERT INTO trekammedis (id_rm, id_pasien, id_dokter, id_poli, tgl_periksa, keluhan, diagnosa) VALUES ('$uuid', '$pasien', '$dokter', '$poli', '$tanggal', '$keluhan', '$diagnosa')";
    mysqli_query($con, $query) or mysqli_error($con);

    $obat = $_POST['obat'];
    foreach ($obat as $o) {
        $query = "INSERT INTO trmobat (id_rm, id_obat) VALUES ('$uuid', '$o')";
        mysqli_query($con, $query) or mysqli_error($con);
    }

    $res = mysqli_affected_rows($con);
    
}     
if($res>0){
    echo "<script>alert('Data Berhasil Di $value')</script><script>window.location='index.php'</script>";
} else {
    echo "<script>alert('Data Gagal Di $value')</script><script>window.location='index.php'</script>";
}