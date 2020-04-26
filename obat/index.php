<?php include_once '../_header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Data Obat</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-bar-chart-o"></i> Data Obat</li>
        </ol>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <form class="form-inline" action="" method="get">
            <input type="text" class="form-control" name="pencarian" placeholder="Pencarian..." id="pencarian">
            <button type="submit" name='hal' class="btn btn-primary"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="col-lg-6">
        <a class="pull-right" href="<?= baseUrl('obat/add.php'); ?>"><button class="btn btn-success">Tambah Data</i></button></a>
        <a class="pull-right" href="<?= baseUrl('obat'); ?>"><button class="btn btn-warning"><i class="fa fa-refresh"></i></button></a>
    </div>
</div>
<div class="table-responsive" style="margin-top: 20px">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $batas = 2;
            if (isset($_GET['hal'])) {
                $hal = $_GET['hal'];
            } else {
                $hal = '';
            }
            if (empty($hal)) {
                $posisi = 0;
                $hal = 1;
            } else {
                $posisi = ($hal - 1) * $batas;
            }
            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                if (isset($_GET['pencarian'])) {
                    $pencarian = trim(mysqli_real_escape_string($con, $_GET['pencarian']));
                } else {
                    $pencarian = '';
                }
                if ($pencarian != '') {
                    $query = "SELECT * FROM tobat WHERE nama_obat LIKE '%$pencarian%' LIMIT $posisi, $batas";
                    $queryJumlah = "SELECT * FROM tobat WHERE nama_obat LIKE '%$pencarian%'";
                    $no = $posisi + 1;
                } else {
                    $query = "SELECT * FROM tobat LIMIT $posisi, $batas";
                    $queryJumlah = "SELECT * FROM tobat";
                    $no = $posisi + 1;
                }
            } else {
                $query = "SELECT * FROM tobat LIMIT $posisi, $batas";
                $queryJumlah = "SELECT * FROM tobat";
                $no = $posisi + 1;
            }
            $dataObat = queryGetData($query);
            $jml = mysqli_num_rows(mysqli_query($con, $queryJumlah));
            foreach ($dataObat as $data) :
            ?>
                <tr>
                    <th><?= $no++; ?></th>
                    <td><?= $data['nama_obat']; ?></td>
                    <td><?= $data['ket_obat']; ?></td>
                    <td>
                        <a style="color: inherit" href="edit.php?id=<?= $data['id_obat']; ?>"><button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button></a>
                        <a style="color: inherit" onclick="return confirm('Yakin hapus?')" href="delete.php?id=<?= $data['id_obat']; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php if (isset($_GET['pencarian'])) : ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination pull-right">
            <?php
            $jumlahHal = ceil($jml / $batas);
            for ($i = 1; $i <= $jumlahHal; $i++) :
            ?>
                <?php if ($i == $hal) : ?>
                    <li class="page-item active"><a class="page-link" href="?pencarian=<?= $pencarian; ?>&hal=<?= $i; ?>"><?= $i; ?></a></li>
                <?php else : ?>
                    <li class="page-item"><a class="page-link" href="?pencarian=<?= $pencarian; ?>&hal=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>
        </ul>
    </nav>
<?php else : ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination pull-right">
            <?php
            $jumlahHal = ceil($jml / $batas);
            for ($i = 1; $i <= $jumlahHal; $i++) :
            ?>
                <?php if ($i == $hal) : ?>
                    <li class="page-item active"><a class="page-link" href="?hal=<?= $i; ?>"><?= $i; ?></a></li>
                <?php else : ?>
                    <li class="page-item"><a class="page-link" href="?hal=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php include_once '../_footer.php'; ?>