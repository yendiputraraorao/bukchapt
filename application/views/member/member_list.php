        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('member/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('member/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('member'); ?>" class="btn btn-default">Reset</a>
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
		<th>Action</th>
            </tr><?php
            foreach ($member_data as $member)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
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
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('member/read/'.$member->id),'Read'); 
				echo ' | '; 
				echo anchor(site_url('member/update/'.$member->id),'Update'); 
				echo ' | '; 
				echo anchor(site_url('member/delete/'.$member->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('member/excel'), 'Excel', 'class="btn btn-primary"'); ?>
		<?php echo anchor(site_url('member/word'), 'Word', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
		
		