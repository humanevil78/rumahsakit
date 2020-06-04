<?php 
include_once '../_header.php'; 

if(isset($_POST['editDokter'])){
    $id = $_POST['editDokter'];
    $query = "SELECT * FROM tdokter WHERE id_dokter = '$id'";
    $data = queryGetData($query)[0];
} else {
    echo "<script>alert('Tidak ada yang mau di edit!')</script><script>window.location='index.php'</script>";
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1>Edit Data Dokter</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-bar-chart-o"></i> Data Doktert</li>
        </ol>
    </div>
</div><!-- /.row -->

<div class="col-md-8">
    <form action="proses.php" method="post">
        <input type="hidden" name="idDokter" value="<?= $data['id_dokter']; ?>" id="idObat">
        <div class="form-group">
            <label for="namaDokter">Nama Dokter</label>
            <input value="<?= $data['nama_dokter']; ?>" type="text" class="form-control" name="namaDokter" id="namaDokter" placeholder="Nama Dokter.." required>
        </div>
        <div class="form-group">
            <label for="spesialis">Spesialis</label>
            <input value="<?= $data['spesialis']; ?>" type="text" class="form-control" name="spesialis" id="spesialis" placeholder="Spesialis.." required>
        </div>
        <div class="form-group">
            <label for="Alamat">Alamat</label>
            <textarea class="form-control" name="Alamat" id="Alamat" placeholder="Alamat.." required><?= $data['alamat']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="noTelpon">Nomor Telepon</label>
            <input value="<?= $data['no_telp']; ?>" type="text" class="form-control" name="noTelpon" id="noTelpon" placeholder="Nomor telepon.." required>
        </div>
        <div class="form-group">
            <button type="submit" name="edit" value="Edit" class="btn btn-primary pull-right">Edit Data</button>
        </div>
    </form>
</div>



<?php include_once '../_footer.php'; ?>