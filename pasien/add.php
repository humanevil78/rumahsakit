<?php include_once '../_header.php'; ?>

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
        <div class="form-group">
            <label for="noIdentitas">Nomor Identitas</label>
            <input type="text" class="form-control" name="noIdentitas" id="noIdentitas" placeholder="Nomor Identitas" required>
        </div>
        <div class="form-group">
            <label for="namaPasien">Nama Pasien</label>
            <input type="text" class="form-control" name="namaPasien" id="namaPasien" placeholder="Nama Pasien.." required>
        </div>
        <div class="form-group">
            <label for="jenisKelamin">Jenis Kelamin</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="jenisKelamin" id="" value="L" checked> Laki-laki
                    <input type="radio" class="form-check-input" name="jenisKelamin" id="" value="P"> Perempuan
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat.." required></textarea>
        </div>
        <div class="form-group">
            <label for="noTelpon">Nomor Telepon</label>
            <input type="text" class="form-control" name="noTelpon" id="noTelpon" placeholder="Nomor telepon.." required>
        </div>
        <div class="form-group">
            <button type="submit" name="add" value="Simpan" class="btn btn-primary pull-right">Tambah Data</button>
        </div>
    </form>
</div>
<?php include_once '../_footer.php'; ?>