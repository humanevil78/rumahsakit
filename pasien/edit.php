<?php include_once '../_header.php'; 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM tpasien WHERE id_pasien = '$id'";
    $data = queryGetData($query);
    if(empty($data)){
        echo "<script>alert('Tidak ada id seperti ini!')</script><script>window.location='index.php'</script>";
    }
    $data = $data[0];
} else {
    echo "<script>alert('Tidak ada yang mau di edit!')</script><script>window.location='index.php'</script>";
}
?>


<div class="row">
    <div class="col-lg-12">
        <h1>Tambah Data Pasien</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-bar-chart-o"></i> Data Pasien</li>
        </ol>
    </div>
</div><!-- /.row -->

<div class="col-md-8">
    <form action="proses.php" method="post">
        <input type="hidden" name="id" value="<?= $data['id_pasien']; ?>">
        <div class="form-group">
            <label for="noIdentitas">Nomor Identitas</label>
            <input type="text" class="form-control" name="noIdentitas" value="<?= $data['no_identitas']; ?>" id="noIdentitas" placeholder="Nomor Identitas" required>
        </div>
        <div class="form-group">
            <label for="namaPasien">Nama Pasien</label>
            <input type="text" class="form-control" name="namaPasien" value="<?= $data['nama_pasien']; ?>" id="namaPasien" placeholder="Nama Pasien.." required>
        </div>
        <div class="form-group">
            <label for="jenisKelamin">Jenis Kelamin</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenisKelamin" id="" value="L" <?= $data['jenis_kelamin']=='L' ? 'checked' : null ?> > Laki-laki
                    <input type="radio" class="form-check-input" name="jenisKelamin" id="" value="P" <?= $data['jenis_kelamin']=='P' ? 'checked' : null ?> > Perempuan
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat.." required><?= $data['alamat']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="noTelpon">Nomor Telepon</label>
            <input type="text" class="form-control" name="noTelpon" value="<?= $data['no_telp']; ?>" id="noTelpon" placeholder="Nomor telepon.." required>
        </div>
        <div class="form-group">
            <button type="submit" name="edit" value="Simpan" class="btn btn-primary pull-right">Edit Data</button>
        </div>
    </form>
</div>
<?php include_once '../_footer.php'; ?>