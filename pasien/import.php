<?php include_once '../_header.php'; ?>

<div class="row">
    <div class="col-lg-12">
        <h1>Import Data Pasien</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-bar-chart-o"></i> Data Pasien</li>
        </ol>
    </div>
</div><!-- /.row -->

<div class="col-md-8">
    <form action="proses.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="file">Import Data</label>
            <input type="file" class="form-control" name="file" id="file" required>
        </div>
        <div class="form-group">
            <button type="submit" name="import" value="Import" class="btn btn-primary pull-right">Import Data</button>
        </div>
        
    </form>
</div>
<?php include_once '../_footer.php'; ?>