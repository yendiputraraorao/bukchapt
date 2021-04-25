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
        <h2 style="margin-top:0px">Pelatih List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('pelatih/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('pelatih/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('pelatih'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
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
		<th>Action</th>
            </tr><?php
            foreach ($pelatih_data as $pelatih)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $pelatih->email ?></td>
			<td><?php echo $pelatih->namadepan ?></td>
			<td><?php echo $pelatih->namabelakang ?></td>
			<td><?php echo $pelatih->panggilan ?></td>
			<td><?php echo $pelatih->tanggal_lahir ?></td>
			<td><?php echo $pelatih->jenis_kelamin ?></td>
			<td><?php echo $pelatih->primaryposision ?></td>
			<td><?php echo $pelatih->secondaryposision ?></td>
			<td><?php echo $pelatih->negara ?></td>
			<td><?php echo $pelatih->provinsi ?></td>
			<td><?php echo $pelatih->kabkota ?></td>
			<td><?php echo $pelatih->club ?></td>
			<td><?php echo $pelatih->profesi ?></td>
			<td><?php echo $pelatih->alamat_provinsi ?></td>
			<td><?php echo $pelatih->alamat_kabkota ?></td>
			<td><?php echo $pelatih->alamat_kecamatan ?></td>
			<td><?php echo $pelatih->alamat_desa ?></td>
			<td><?php echo $pelatih->kodepos ?></td>
			<td><?php echo $pelatih->rangking_nasional ?></td>
			<td><?php echo $pelatih->rangking_provinsi ?></td>
			<td><?php echo $pelatih->warna_sabuk ?></td>
			<td><?php echo $pelatih->tinggi ?></td>
			<td><?php echo $pelatih->berat ?></td>
			<td><?php echo $pelatih->golongan_darah ?></td>
			<td><?php echo $pelatih->foto ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('pelatih/read/'.$pelatih->id_pelatih),'Read'); 
				echo ' | '; 
				echo anchor(site_url('pelatih/update/'.$pelatih->id_pelatih),'Update'); 
				echo ' | '; 
				echo anchor(site_url('pelatih/delete/'.$pelatih->id_pelatih),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
		<?php echo anchor(site_url('pelatih/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('pelatih/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>