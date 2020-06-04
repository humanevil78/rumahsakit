<?php 
    if (!isset($_POST['checked'])) {
        echo "<script>alert('Tidak ada yang di ceklis!')</script><script>window.location='index.php'</script>";
    } else{
        include_once '../_header.php';
        $checked = $_POST['checked'];
        foreach($checked as $chk) :
            $query = "DELETE FROM tdokter WHERE id_dokter = '$chk'";
            mysqli_query($con, $query);
            $res = mysqli_affected_rows($con);
        endforeach;

        if($res > 0){
            echo "<script>alert('Data berhasil dihapus!')</script><script>window.location='index.php'</script>";
        } else {
            echo "<script>alert('Data gagal dihapus!')</script><script>window.location='index.php'</script>";
        }
    }