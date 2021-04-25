
		<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('aacontoh/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('aacontoh/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('aacontoh'); ?>" class="btn btn-default">Reset</a>
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
		<th>Nama</th>
		<th>Foto Barang</th>
		<th>Stok</th>
		<th>Action</th>
            </tr><?php
            foreach ($aacontoh_data as $aacontoh)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $aacontoh->nama ?></td>
			<td><?php echo $aacontoh->foto_barang ?></td>
			<td><?php echo $aacontoh->stok ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('aacontoh/read/'.$aacontoh->id_contoh),'Read'); 
				echo ' | '; 
				echo anchor(site_url('aacontoh/update/'.$aacontoh->id_contoh),'Update'); 
				echo ' | '; 
				echo anchor(site_url('aacontoh/delete/'.$aacontoh->id_contoh),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('aacontoh/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('aacontoh/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>