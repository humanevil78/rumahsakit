<?php include_once '../_header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Tambah Data Poliklinik</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-bar-chart-o"></i> Data Obat</li>
        </ol>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <form action="" class="form-inline" method="post">
            <Span>
                <input type="number" name="totalData" value="<?= $_POST['totalData']; ?>" placeholder="Jumlah yg dinginkan" class="form-control" id="">
                <button type="submit" name="generate" class="btn btn-info">Generate</button>
            </Span>
        </form>
    </div>
    <div class="col-lg-6">
        <a class="pull-right" href="<?= baseUrl('poliklinik'); ?>"><button class="btn btn-warning">Kembali</i></button></a>
    </div>
</div>
<form action="proses.php" method="post">
    <?php if (isset($_POST['generate'])) : ?>
        <div class="table-responsive" style="margin-top: 20px">
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nomor</th>
                        <th scope="col">Nama Poli</th>
                        <th scope="col">Gedung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalData = $_POST['totalData'];
                    $i = 1;
                    for ($i; $i <= $totalData; $i++) :
                    ?>
                        <tr>
                            <input type="hidden" name="totalData" value="<?= $totalData; ?>">
                            <td><?= $i; ?></td>
                            <td><input type="text" class="form-control" name="nama-<?= $i; ?>"></td>
                            <td><input type="text" class="form-control" name="gedung-<?= $i; ?>"></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
        <button type="submit" value="Simpan" name="add" class="btn btn-primary pull-right">Tambah</button>
    <?php endif; ?>
</form>

<?php include_once '../_footer.php'; ?>