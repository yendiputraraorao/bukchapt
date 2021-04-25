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
        <h2 style="margin-top:0px">Member Read</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Type Mobil</td><td><?php echo $type_mobil; ?></td></tr>
	    <tr><td>Kode Mesin</td><td><?php echo $kode_mesin; ?></td></tr>
	    <tr><td>Tahun</td><td><?php echo $tahun; ?></td></tr>
	    <tr><td>No Rangka</td><td><?php echo $no_rangka; ?></td></tr>
	    <tr><td>No Mesin</td><td><?php echo $no_mesin; ?></td></tr>
	    <tr><td>Plat Nomor</td><td><?php echo $plat_nomor; ?></td></tr>
	    <tr><td>Warna</td><td><?php echo $warna; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Pekerjaan</td><td><?php echo $pekerjaan; ?></td></tr>
	    <tr><td>Hp</td><td><?php echo $hp; ?></td></tr>
	    <tr><td>Email</td><td><?php echo $email; ?></td></tr>
	    <tr><td>Medsos</td><td><?php echo $medsos; ?></td></tr>
	    <tr><td>Foto Member</td><td><?php echo $foto_member; ?></td></tr>
	    <tr><td>Foto Unit</td><td><?php echo $foto_unit; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('member') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>