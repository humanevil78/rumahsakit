<?php include_once '../_header.php'; ?>

<div class="row">
    <div class="col-lg-12">
        <h1>Tambah Data Rekam Medis</h1>
        <ol class="breadcrumb">
            <li class="active"><i class="fa fa-bar-chart-o"></i> Data Rekam Medis</li>
        </ol>
    </div>
</div><!-- /.row -->

<div class="col-md-8">
    <form action="proses.php" method="post">
        <div class="form-group">
            <label for="pasien">Nama Pasien</label>
            <select name="pasien" id="pasien" class="form-control" required>
                <?php 
                    $data = queryGetData("SELECT * FROM tpasien");
                    foreach ($data as $data) :?>
                    <option value="<?=$data['id_pasien']?>"><?= $data['nama_pasien']; ?></option>
                <?php 
                    endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="dokter">Nama Dokter</label>
            <select name="dokter" id="dokter" class="form-control" required>
                <?php 
                    $data = queryGetData("SELECT * FROM tdokter");
                    foreach ($data as $data) :?>
                    <option value="<?=$data['id_dokter']?>"><?= $data['nama_dokter']; ?></option>
                <?php 
                    endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="poli">Nama Poliklinik</label>
            <select name="poli" id="poli" class="form-control" required>
                <?php 
                    $data = queryGetData("SELECT * FROM tpoli");
                    foreach ($data as $data) :?>
                    <option value="<?=$data['id_poli']?>"><?= $data['nama_poli']; ?></option>
                <?php 
                    endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal Periksa</label>
            <input type="date" value="<?= date("Y-m-d"); ?>" class="form-control" name="tanggal" id="tanggal" required>
        </div>
        <div class="form-group">
            <label for="keluhan">Keluhan</label>
            <textarea class="form-control" name="keluhan" id="keluhan" cols="30" rows="5" placeholder="Keluhan.." required></textarea>
        </div>
        <div class="form-group">
            <label for="diagnosa">Diagnosa</label>
            <textarea class="form-control" name="diagnosa" id="diagnosa" cols="30" rows="5" placeholder="Diagnosa.." required></textarea>
        </div>
        <div class="form-group">
            <label for="obat">Obat</label>
            <select name="obat[]" multiple id="obat" class="form-control" size="3">
                <?php 
                    $data = queryGetData("SELECT * FROM tobat");
                    foreach ($data as $data) :?>
                    <option value="<?=$data['id_obat']?>"><?= $data['nama_obat']; ?></option>
                <?php 
                    endforeach;
                ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" name="add" value="Simpan" class="btn btn-primary pull-right">Tambah Data</button>
        </div>
    </form>
</div>
<?php include_once '../_footer.php'; ?>