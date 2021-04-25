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
        <h2>Member List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Type Mobil</th>
		<th>Kode Mesin</th>
		<th>Tahun</th>
		<th>No Rangka</th>
		<th>No Mesin</th>
		<th>Plat Nomor</th>
		<th>Warna</th>
		<th>Alamat</th>
		<th>Pekerjaan</th>
		<th>Hp</th>
		<th>Email</th>
		<th>Medsos</th>
		<th>Foto Member</th>
		<th>Foto Unit</th>
		
            </tr><?php
            foreach ($member_data as $member)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $member->nama ?></td>
		      <td><?php echo $member->tempat_lahir ?></td>
		      <td><?php echo $member->tanggal_lahir ?></td>
		      <td><?php echo $member->type_mobil ?></td>
		      <td><?php echo $member->kode_mesin ?></td>
		      <td><?php echo $member->tahun ?></td>
		      <td><?php echo $member->no_rangka ?></td>
		      <td><?php echo $member->no_mesin ?></td>
		      <td><?php echo $member->plat_nomor ?></td>
		      <td><?php echo $member->warna ?></td>
		      <td><?php echo $member->alamat ?></td>
		      <td><?php echo $member->pekerjaan ?></td>
		      <td><?php echo $member->hp ?></td>
		      <td><?php echo $member->email ?></td>
		      <td><?php echo $member->medsos ?></td>
		      <td><?php echo $member->foto_member ?></td>
		      <td><?php echo $member->foto_unit ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>