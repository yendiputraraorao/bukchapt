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
        <h2 style="margin-top:0px">Atlit Read</h2>
        <table class="table">
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Namadepan</td><td><?php echo $namadepan; ?></td></tr>
	    <tr><td>Namabelakang</td><td><?php echo $namabelakang; ?></td></tr>
	    <tr><td>Panggilan</td><td><?php echo $panggilan; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Primaryposision</td><td><?php echo $primaryposision; ?></td></tr>
	    <tr><td>Secondaryposision</td><td><?php echo $secondaryposision; ?></td></tr>
	    <tr><td>Negara</td><td><?php echo $negara; ?></td></tr>
	    <tr><td>Provinsi</td><td><?php echo $provinsi; ?></td></tr>
	    <tr><td>Kabkota</td><td><?php echo $kabkota; ?></td></tr>
	    <tr><td>Club</td><td><?php echo $club; ?></td></tr>
	    <tr><td>Profesi</td><td><?php echo $profesi; ?></td></tr>
	    <tr><td>Alamat Provinsi</td><td><?php echo $alamat_provinsi; ?></td></tr>
	    <tr><td>Alamat Kabkota</td><td><?php echo $alamat_kabkota; ?></td></tr>
	    <tr><td>Alamat Kecamatan</td><td><?php echo $alamat_kecamatan; ?></td></tr>
	    <tr><td>Alamat Desa</td><td><?php echo $alamat_desa; ?></td></tr>
	    <tr><td>Kodepos</td><td><?php echo $kodepos; ?></td></tr>
	    <tr><td>Rangking Nasional</td><td><?php echo $rangking_nasional; ?></td></tr>
	    <tr><td>Rangking Provinsi</td><td><?php echo $rangking_provinsi; ?></td></tr>
	    <tr><td>Warna Sabuk</td><td><?php echo $warna_sabuk; ?></td></tr>
	    <tr><td>Tinggi</td><td><?php echo $tinggi; ?></td></tr>
	    <tr><td>Berat</td><td><?php echo $berat; ?></td></tr>
	    <tr><td>Golongan Darah</td><td><?php echo $golongan_darah; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('atlit') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>