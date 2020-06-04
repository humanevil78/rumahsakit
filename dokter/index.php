<?php include_once '../_header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Data Dokter</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-bar-chart-o"></i> Data Dokter</li>
        </ol>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-6">
    </div>
    <div class="col-lg-6">
        <a class="pull-right" href="<?= baseUrl('dokter/add.php'); ?>"><button class="btn btn-success">Tambah Data</i></button></a>
        <a class="pull-right" href="<?= baseUrl('dokter'); ?>"><button class="btn btn-warning"><i class="fa fa-refresh"></i></button></a>
    </div>
</div>
<form name="proses" method="post">
<div class="table-responsive" style="margin-top: 20px">
    <table class="table table-striped table-bordered table-hover" id="tableDokter">
        <thead>
            <tr>
                <th scope="col">
                    <center>
                        <input type="checkbox" name="select_all" id="select_all" value="">
                    </center>
                </th>
                <th scope="col">Nomor</th>
                <th scope="col">Nama Dokter</th>
                <th scope="col">Spesialis</th>
                <th scope="col">Alamat</th>
                <th scope="col">Spesialis</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = "SELECT * FROM tdokter";
            $datas = queryGetData($query);
            foreach ($datas as $data) :
            ?>
                <tr>
                    <td align="center">
                        <input type="checkbox" class="checked" name="checked[]" value="<?= $data['id_dokter']; ?>">
                    </td>
                    <td><?= $no++; ?></td>
                    <td><?= $data['nama_dokter']; ?></td>
                    <td><?= $data['spesialis']; ?></td>
                    <td><?= $data['alamat']; ?></td>
                    <td><?= $data['no_telp']; ?></td>
                    <td align="center">
                        <button name="editDokter" value="<?= $data['id_dokter']; ?>" onclick="edit()" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</form>
<div class="pull-right">
    <button class="btn btn-danger btn-sm" onclick="hapus()">Hapus</button>
</div>
<script>
    $(document).ready(function () {

        $('#tableDokter').DataTable({
            columnDefs: [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": [0,6]
                }
            ],
            order: [1, "asc"]
        });

        // saat checkbox dengan id select all di click
        $('#select_all').on('click', function () {
            // kondisi
            // jika checkbox select_all di ceklis
            if(this.checked){
                // maka setiap class yg bernama checked (each = setiap) 
                $('.checked').each(function () {
                    // menjadi ceklis
                    this.checked = true;
                });
            } else {
                    // menjadi tidak ceklis
                $('.checked').each(function () {
                    this.checked = false;
                });
            }
        });
        // saat checkbox dengan class checked di click
        $('.checked').on('click', function () {
            // kondisi
            // jika checkbox class checked yang di ceklis sama dengan jumlah checkbox pada class checked
            if($('.checked:checked').length == $('.checked').length){
                // maka
                // menjadi ceklis pada id select_alll
                $('#select_all').checked = true;
            } else {
                // menjadi tidak ceklis pada id select_alll
                $('#select_all').checked = true;
            }
        })
    });
    function edit(){
        document.proses.action = 'edit.php'
        document.proses.submit()
    }
    function hapus() {
        const conf = confirm('yakin hapus?');
        if(conf){
            document.proses.action = 'delete.php'
            document.proses.submit()
        }
    }
</script>
<?php include_once '../_footer.php'; ?>