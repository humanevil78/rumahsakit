<?php include_once '../_header.php'; ?>

<div class="row">
    <div class="col-lg-12">
        <h1>Tambah Data Dokter</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-bar-chart-o"></i> Data Dokter</li>
        </ol>
    </div>
</div><!-- /.row -->

<div class="col-md-8">
    <form action="proses.php" method="post">
        <div class="form-group">
            <label for="namaDokter">Nama Dokter</label>
            <input type="text" class="form-control" name="namaDokter" id="namaDokter" placeholder="Nama Dokter.." required>
        </div>
        <div class="form-group">
            <label for="spesialis">Spesialis</label>
            <input type="text" class="form-control" name="spesialis" id="spesialis" placeholder="Spesialis.." required>
        </div>
        <div class="form-group">
            <label for="Alamat">Alamat</label>
            <textarea class="form-control" name="Alamat" id="Alamat" placeholder="Alamat.." required></textarea>
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