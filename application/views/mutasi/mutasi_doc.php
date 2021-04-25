<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Mutasi List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Atlit</th>
		<th>Id Dojang Lama</th>
		<th>Id Dojang Baru</th>
		<th>Surat Melepas</th>
		<th>Surat Menerima</th>
		<th>Scan Kk Baru</th>
		<th>Disetujui</th>
		
            </tr><?php
            foreach ($mutasi_data as $mutasi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mutasi->id_atlit ?></td>
		      <td><?php echo $mutasi->id_dojang_lama ?></td>
		      <td><?php echo $mutasi->id_dojang_baru ?></td>
		      <td><?php echo $mutasi->surat_melepas ?></td>
		      <td><?php echo $mutasi->surat_menerima ?></td>
		      <td><?php echo $mutasi->scan_kk_baru ?></td>
		      <td><?php echo $mutasi->disetujui ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>