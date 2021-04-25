
		<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('atlit/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('atlit/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('atlit'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
		<div style="overflow-x:auto;"> <!-- untuk membuat scrol kesamping pada tabel-->
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
            foreach ($atlit_data as $atlit)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
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
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('atlit/read/'.$atlit->id_atlit),'Read'); 
				echo ' | '; 
				echo anchor(site_url('atlit/update/'.$atlit->id_atlit),'Update'); 
				echo ' | '; 
				echo anchor(site_url('atlit/delete/'.$atlit->id_atlit),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('atlit/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('atlit/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>