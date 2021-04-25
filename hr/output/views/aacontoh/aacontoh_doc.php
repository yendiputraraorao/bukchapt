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
        <h2>Aacontoh List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Foto Barang</th>
		<th>Stok</th>
		
            </tr><?php
            foreach ($aacontoh_data as $aacontoh)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $aacontoh->nama ?></td>
		      <td><?php echo $aacontoh->foto_barang ?></td>
		      <td><?php echo $aacontoh->stok ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>