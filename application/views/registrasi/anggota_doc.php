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
        <h2>Anggota List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Anggota</th>
		<th>Nama Anggota</th>
		<th>Jenis Kelamin</th>
		<th>Golongan Darah</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Type Mobil</th>
		<th>No Mesin</th>
		<th>No Rangka</th>
		<th>Tahun</th>
		<th>Plat Nomor</th>
		<th>Warna Mobil</th>
		<th>Pekerjaan</th>
		<th>Alamat</th>
		<th>Hp</th>
		<th>Email</th>
		<th>Medsos</th>
		<th>Foto Anggota</th>
		<th>Foto Unit</th>
		
            </tr><?php
            foreach ($anggota_data as $anggota)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $anggota->kode_anggota ?></td>
		      <td><?php echo $anggota->nama_anggota ?></td>
		      <td><?php echo $anggota->jenis_kelamin ?></td>
		      <td><?php echo $anggota->golongan_darah ?></td>
		      <td><?php echo $anggota->tempat_lahir ?></td>
		      <td><?php echo $anggota->tanggal_lahir ?></td>
		      <td><?php echo $anggota->type_mobil ?></td>
		      <td><?php echo $anggota->no_mesin ?></td>
		      <td><?php echo $anggota->no_rangka ?></td>
		      <td><?php echo $anggota->tahun ?></td>
		      <td><?php echo $anggota->plat_nomor ?></td>
		      <td><?php echo $anggota->warna_mobil ?></td>
		      <td><?php echo $anggota->pekerjaan ?></td>
		      <td><?php echo $anggota->alamat ?></td>
		      <td><?php echo $anggota->hp ?></td>
		      <td><?php echo $anggota->email ?></td>
		      <td><?php echo $anggota->medsos ?></td>
		      <td><?php echo $anggota->foto_anggota ?></td>
		      <td><?php echo $anggota->foto_unit ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>