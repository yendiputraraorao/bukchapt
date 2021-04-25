<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Atlit <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Namadepan <?php echo form_error('namadepan') ?></label>
            <input type="text" class="form-control" name="namadepan" id="namadepan" placeholder="Namadepan" value="<?php echo $namadepan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Namabelakang <?php echo form_error('namabelakang') ?></label>
            <input type="text" class="form-control" name="namabelakang" id="namabelakang" placeholder="Namabelakang" value="<?php echo $namabelakang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Panggilan <?php echo form_error('panggilan') ?></label>
            <input type="text" class="form-control" name="panggilan" id="panggilan" placeholder="Panggilan" value="<?php echo $panggilan; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Primaryposision <?php echo form_error('primaryposision') ?></label>
            <input type="text" class="form-control" name="primaryposision" id="primaryposision" placeholder="Primaryposision" value="<?php echo $primaryposision; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Secondaryposision <?php echo form_error('secondaryposision') ?></label>
            <input type="text" class="form-control" name="secondaryposision" id="secondaryposision" placeholder="Secondaryposision" value="<?php echo $secondaryposision; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Negara <?php echo form_error('negara') ?></label>
            <input type="text" class="form-control" name="negara" id="negara" placeholder="Negara" value="<?php echo $negara; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Provinsi <?php echo form_error('provinsi') ?></label>
            <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kabkota <?php echo form_error('kabkota') ?></label>
            <input type="text" class="form-control" name="kabkota" id="kabkota" placeholder="Kabkota" value="<?php echo $kabkota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Club <?php echo form_error('club') ?></label>
            <input type="text" class="form-control" name="club" id="club" placeholder="Club" value="<?php echo $club; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Profesi <?php echo form_error('profesi') ?></label>
            <input type="text" class="form-control" name="profesi" id="profesi" placeholder="Profesi" value="<?php echo $profesi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Provinsi <?php echo form_error('alamat_provinsi') ?></label>
            <input type="text" class="form-control" name="alamat_provinsi" id="alamat_provinsi" placeholder="Alamat Provinsi" value="<?php echo $alamat_provinsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Kabkota <?php echo form_error('alamat_kabkota') ?></label>
            <input type="text" class="form-control" name="alamat_kabkota" id="alamat_kabkota" placeholder="Alamat Kabkota" value="<?php echo $alamat_kabkota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Kecamatan <?php echo form_error('alamat_kecamatan') ?></label>
            <input type="text" class="form-control" name="alamat_kecamatan" id="alamat_kecamatan" placeholder="Alamat Kecamatan" value="<?php echo $alamat_kecamatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Desa <?php echo form_error('alamat_desa') ?></label>
            <input type="text" class="form-control" name="alamat_desa" id="alamat_desa" placeholder="Alamat Desa" value="<?php echo $alamat_desa; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kodepos <?php echo form_error('kodepos') ?></label>
            <input type="text" class="form-control" name="kodepos" id="kodepos" placeholder="Kodepos" value="<?php echo $kodepos; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Rangking Nasional <?php echo form_error('rangking_nasional') ?></label>
            <input type="text" class="form-control" name="rangking_nasional" id="rangking_nasional" placeholder="Rangking Nasional" value="<?php echo $rangking_nasional; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Rangking Provinsi <?php echo form_error('rangking_provinsi') ?></label>
            <input type="text" class="form-control" name="rangking_provinsi" id="rangking_provinsi" placeholder="Rangking Provinsi" value="<?php echo $rangking_provinsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Warna Sabuk <?php echo form_error('warna_sabuk') ?></label>
            <input type="text" class="form-control" name="warna_sabuk" id="warna_sabuk" placeholder="Warna Sabuk" value="<?php echo $warna_sabuk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tinggi <?php echo form_error('tinggi') ?></label>
            <input type="text" class="form-control" name="tinggi" id="tinggi" placeholder="Tinggi" value="<?php echo $tinggi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Berat <?php echo form_error('berat') ?></label>
            <input type="text" class="form-control" name="berat" id="berat" placeholder="Berat" value="<?php echo $berat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Golongan Darah <?php echo form_error('golongan_darah') ?></label>
            <input type="text" class="form-control" name="golongan_darah" id="golongan_darah" placeholder="Golongan Darah" value="<?php echo $golongan_darah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
        </div>
	    <input type="hidden" name="id_atlit" value="<?php echo $id_atlit; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('atlit') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>