<?php 
if(!isset($_POST['checked'])){
    echo "<script>alert('Tidak ada yang di ceklis')</script><script>window.location='index.php'</script>";
} else {
include_once '../_header.php';
$checked = $_POST['checked'];
foreach($checked as $chk){
mysqli_query($con, "DELETE FROM tpoli WHERE id_poli = '$chk'");
}
$res = mysqli_affected_rows($con);
if($res > 0){
    echo "<script>alert('Data Berhasil Di Hapus')</script><script>window.location='index.php'</script>";
} else {
    echo "<script>alert('Data Gagal Di Hapus')</script><script>window.location='index.php'</script>";
}
}