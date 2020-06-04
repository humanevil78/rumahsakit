<?php 
include_once '../_header.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM tpasien WHERE id_pasien = '$id'";
    mysqli_query($con, $query);
    $res = mysqli_affected_rows($con);
    if($res > 0){
        echo "<script>alert('Data Berhasil Dihapus')</script><script>window.location='index.php'</script>";
    } else {
        echo "Id tidak ada";
    }
} else {
    echo 'Delete gagal';
}
?>