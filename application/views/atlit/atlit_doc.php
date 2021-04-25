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
        <h2>Atlit List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Email</th>
		<th>Namadepan</th>
		<th>Namabelakang</th>
		<th>Panggilan</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Primaryposision</th>
		<th>Secondaryposision</th>
		<th>Negara</th>
		<th>Provinsi</th>
		<th>Kabkota</th>
		<th>Club</th>
		<th>Profesi</th>
		<th>Alamat Provinsi</th>
		<th>Alamat Kabkota</th>
		<th>Alamat Kecamatan</th>
		<th>Alamat Desa</th>
		<th>Kodepos</th>
		<th>Rangking Nasional</th>
		<th>Rangking Provinsi</th>
		<th>Warna Sabuk</th>
		<th>Tinggi</th>
		<th>Berat</th>
		<th>Golongan Darah</th>
		<th>Foto</th>
		
            </tr><?php
            foreach ($atlit_data as $atlit)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $atlit->email ?></td>
		      <td><?php echo $atlit->namadepan ?></td>
		      <td><?php echo $atlit->namabelakang ?></td>
		      <td><?php echo $atlit->panggilan ?></td>
		      <td><?php echo $atlit->tanggal_lahir ?></td>
		      <td><?php echo $atlit->jenis_kelamin ?></td>
		      <td><?php echo $atlit->primaryposision ?></td>
		      <td><?php echo $atlit->secondaryposision ?></td>
		      <td><?php echo $atlit->negara ?></td>
		      <td><?php echo $atlit->provinsi ?></td>
		      <td><?php echo $atlit->kabkota ?></td>
		      <td><?php echo $atlit->club ?></td>
		      <td><?php echo $atlit->profesi ?></td>
		      <td><?php echo $atlit->alamat_provinsi ?></td>
		      <td><?php echo $atlit->alamat_kabkota ?></td>
		      <td><?php echo $atlit->alamat_kecamatan ?></td>
		      <td><?php echo $atlit->alamat_desa ?></td>
		      <td><?php echo $atlit->kodepos ?></td>
		      <td><?php echo $atlit->rangking_nasional ?></td>
		      <td><?php echo $atlit->rangking_provinsi ?></td>
		      <td><?php echo $atlit->warna_sabuk ?></td>
		      <td><?php echo $atlit->tinggi ?></td>
		      <td><?php echo $atlit->berat ?></td>
		      <td><?php echo $atlit->golongan_darah ?></td>
		      <td><?php echo $atlit->foto ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>