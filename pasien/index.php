<?php include_once '../_header.php'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1>Data Pasien</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-bar-chart-o"></i> Data Pasien</li>
        </ol>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="col-lg-6">
    </div>
    <div class="col-lg-6">
        <a class="pull-right" href="<?= baseUrl('pasien/add.php'); ?>"><button class="btn btn-success">Tambah Data</i></button></a>
        <a class="pull-right" href="<?= baseUrl('pasien/import.php'); ?>"><button class="btn btn-primary">Import</i></button></a>
        <a class="pull-right" href="<?= baseUrl('pasien'); ?>"><button class="btn btn-warning"><i class="fa fa-refresh"></i></button></a>
    </div>
</div>
<div class="table-responsive" style="margin-top: 20px">
    <table class="table table-striped table-bordered table-hover" id="tableDokter">
        <thead>
            <tr>
                <th scope="col">Nomor Identitas</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#tableDokter').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "pasien_data.php",
            scrollY : '250px',
            dom : 'Bfrtip',
            buttons : [
                {
                    extend : 'pdf',
                    oriented : 'potrait',
                    pageSize : 'Legal',
                    title : 'Data Pasien',
                    download : 'open'
                },
                'csv', 'excel', 'print', 'copy'
            ],
            columnDefs: [{
                "searchable": false,
                "orderable": false,
                "targets": 5,
                "render": function(data, type, row) {
                    var btn = `
                    <center>
                    <a href="edit.php?id=${data}"><button class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button></a>
                    <a onclick="return confirm('Yakin hapus?')" href="delete.php?id=${data}"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
                    </center>`;
                    return btn;
                }
            }]
        });

    });
</script>
<?php include_once '../_footer.php'; ?>