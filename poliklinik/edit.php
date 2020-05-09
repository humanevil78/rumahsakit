<?php if(!isset($_POST['checked'])){
    echo "<script>alert('Tidak ada yang di ceklis')</script><script>window.location='index.php'</script>";
} ?>
<?php include_once '../_header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Edit Data Poliklinik</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-bar-chart-o"></i> Data Poliklinik</li>
        </ol>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-6">
    </div>
    <div class="col-lg-6">
        <a class="pull-right" href="<?= baseUrl('poliklinik'); ?>"><button class="btn btn-warning">Kembali</i></button></a>
    </div>
</div>
<form action="proses.php" method="post">
    <?php if (isset($_POST['checked'])) : ?>
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
                    $i = 1;
                    $checked = $_POST['checked']; 
                    foreach ($checked as $chk) :
                        $query = "SELECT * FROM tpoli WHERE id_poli = '$chk'";
                        $data = queryGetData($query)[0];
                    ?>
                        <tr>
                            <input type="hidden" name="id[]" value="<?= $data['id_poli']; ?>">
                            <td><?= $i++; ?></td>
                            <td><input type="text" class="form-control" value="<?= $data['nama_poli']; ?>" name="nama[]"></td>
                            <td><input type="text" class="form-control" value="<?= $data['gedung']; ?>" name="gedung[]"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <button type="submit" value="Edit" name="edit" class="btn btn-primary pull-right">Edit</button>
    <?php endif; ?>
</form>

<?php include_once '../_footer.php'; ?>