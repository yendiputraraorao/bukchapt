
		<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('mutasi/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('mutasi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('mutasi'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id Atlit</th>
		<th>Id Dojang Lama</th>
		<th>Id Dojang Baru</th>
		<th>Surat Melepas</th>
		<th>Surat Menerima</th>
		<th>Scan Kk Baru</th>
		<th>Disetujui</th>
		<th>Action</th>
            </tr><?php
            foreach ($mutasi_data as $mutasi)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $mutasi->id_atlit ?></td>
			<td><?php echo $mutasi->id_dojang_lama ?></td>
			<td><?php echo $mutasi->id_dojang_baru ?></td>
			<td><?php echo $mutasi->surat_melepas ?></td>
			<td><?php echo $mutasi->surat_menerima ?></td>
			<td><?php echo $mutasi->scan_kk_baru ?></td>
			<td><?php echo $mutasi->disetujui ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('mutasi/read/'.$mutasi->id_mutasi),'Read'); 
				echo ' | '; 
				echo anchor(site_url('mutasi/update/'.$mutasi->id_mutasi),'Update'); 
				echo ' | '; 
				echo anchor(site_url('mutasi/delete/'.$mutasi->id_mutasi),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('mutasi/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('mutasi/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>