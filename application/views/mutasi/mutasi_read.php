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
        <h2 style="margin-top:0px">Mutasi Read</h2>
        <table class="table">
	    <tr><td>Id Atlit</td><td><?php echo $id_atlit; ?></td></tr>
	    <tr><td>Id Dojang Lama</td><td><?php echo $id_dojang_lama; ?></td></tr>
	    <tr><td>Id Dojang Baru</td><td><?php echo $id_dojang_baru; ?></td></tr>
	    <tr><td>Surat Melepas</td><td><?php echo $surat_melepas; ?></td></tr>
	    <tr><td>Surat Menerima</td><td><?php echo $surat_menerima; ?></td></tr>
	    <tr><td>Scan Kk Baru</td><td><?php echo $scan_kk_baru; ?></td></tr>
	    <tr><td>Disetujui</td><td><?php echo $disetujui; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mutasi') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>