<?php include_once '../_header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Data Rekam Medis</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-bar-chart-o"></i> Data Rekam Medis</li>
        </ol>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-6">
    </div>
    <div class="col-lg-6">
        <a class="pull-right" href="<?= baseUrl('rekam/add.php'); ?>"><button class="btn btn-success">Tambah Data</i></button></a>
        <a class="pull-right" href="<?= baseUrl('rekam'); ?>"><button class="btn btn-warning"><i class="fa fa-refresh"></i></button></a>
    </div>
</div>
    <div class="table-responsive" style="margin-top: 20px">
        <table class="table table-striped table-bordered table-hover" id="tableRekamMedis">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Nama Dokter</th>
                    <th scope="col">Nama Poli</th>
                    <th scope="col">Tgl Periksa</th>
                    <th scope="col">Keluhan</th>
                    <th scope="col">Diagnosa</th>
                    <th scope="col">Obat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $query = "SELECT * FROM trekammedis 
                        JOIN tdokter ON trekammedis.id_dokter = tdokter.id_dokter
                        JOIN tpasien ON trekammedis.id_pasien = tpasien.id_pasien
                        JOIN tpoli ON trekammedis.id_poli = tpoli.id_poli";
                $data = queryGetData($query);
                foreach ($data as $d) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['nama_pasien']; ?></td>
                        <td><?= $d['nama_dokter']; ?></td>
                        <td><?= $d['nama_poli']; ?></td>
                        <td><?= $d['tgl_periksa']; ?></td>
                        <td><?= $d['keluhan']; ?></td>
                        <td><?= $d['diagnosa']; ?></td>
                        <td>
                            <?php $obat = queryGetData("SELECT * FROM trmobat JOIN tobat ON trmobat.id_obat = tobat.id_obat WHERE id_rm = '" . $d['id_rm'] . "'");
                            foreach ($obat as $o) : ?>
                                <?= $o['nama_obat'] . "<br>"; ?>
                            <?php endforeach; ?>
                        </td>
                        <td>
                        <a href="delete.php?id=<?= $d['id_rm']; ?>"><button name="delete" onclick="return confirm('yakin hapus?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<script>
    $(document).ready(function() {
        $('#tableRekamMedis').DataTable({
            columnDefs: [{
                "searchable": false,
                "orderable": false,
                "targets": 8
            }]
        });
    });
</script>
<?php include_once '../_footer.php'; ?>