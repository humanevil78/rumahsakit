<?php include_once '../_header.php'; ?>

<div class="row">
    <div class="col-lg-12">
        <h1>Data Obat</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-bar-chart-o"></i> Data Obat</li>
        </ol>
    </div>
</div><!-- /.row -->

<div class="col-md-8">
    <form action="proses.php" method="post">
        <div class="form-group">
            <label for="namaObat">Nama Obat</label>
            <input type="text" class="form-control" name="namaObat" id="namaObat" placeholder="Nama Obat.." required>
        </div>
        <div class="form-group">
            <label for="ketObat">Keterangan Obat</label>
            <textarea class="form-control" name="ketObat" id="ketObat" placeholder="Keterangan Obat.." required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="add" value="Simpan" class="btn btn-primary pull-right">Tambah Data</button>
        </div>
        
    </form>
</div>



<?php include_once '../_footer.php'; ?>