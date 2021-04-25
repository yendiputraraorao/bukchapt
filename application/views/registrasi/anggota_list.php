<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('registrasi/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('registrasi/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('registrasi'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
		<div style="overflow-x:auto;">
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
				<th>No</th>
				<th>Kode Anggota</th>
				<th>Nama Anggota</th>
				<th>Tempat/Tanggal Lahir</th>
				<th>Jenis Kelammin</th>
				<th>Foto</th>
				
				<th>Action</th>
            </tr><?php
			
			if ($this->session->userdata('level') == 'admin') {
				foreach ($anggota_data as $anggota){
            ?>
				<tr>
					<td width="80px"><?php echo ++$start ?></td>
					<td><b><?php echo $anggota->kode_anggota ?></b></td>
					<td><?php echo $anggota->nama_anggota ?></td>
					<td><?php echo $anggota->tempat_lahir ?>, <?php echo $anggota->tanggal_lahir ?></td>
					<td><?php echo $anggota->jenis_kelamin ?></td>
					<td><img  src='<?=base_url()?>image/anggota/<?=$anggota->foto_anggota;?>' width="50px" height="50px"></td>
					<td>
						<?php 
						echo anchor(site_url('anggota/read/'.$anggota->id_anggota),'Read'); 
						echo ' | '; 
						echo anchor(site_url('anggota/update/'.$anggota->id_anggota),'Update'); 
						echo ' | '; 
						echo anchor(site_url('anggota/delete/'.$anggota->id_anggota),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
						?>
					</td>
				</tr>
			<?php
				}
			}
			else if($this->session->userdata('level') == 'member') {
			
				foreach($anggota_data as $anggota){?>
				<tr>
					<td width="80px"><?php echo ++$start ?></td>
					<td><?php echo $anggota->kode_anggota ?></td>
					<td><?php echo $anggota->nama_anggota ?></td>
					<td><?php echo $anggota->tempat_lahir ?>, <?php echo $anggota->tanggal_lahir ?></td>
					<td><?php echo $anggota->jenis_kelamin ?></td>
					<td><img  src='<?=base_url()?>image/anggota/<?=$anggota->foto_anggota;?>' width="100px" height="100px"></td>
					<td>
						<?php 
						echo anchor(site_url('anggota/read/'.$anggota->id_anggota),'Read'); 
						echo ' | '; 
						echo anchor(site_url('anggota/update/'.$anggota->id_anggota),'Update'); 
						echo ' | '; 
						echo anchor(site_url('anggota/delete/'.$anggota->id_anggota),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
						?>
					</td>
				</tr>
			<?php 
				}
			}	
				else {
					echo "data kosong";
					
				}
				
            ?>
        </table>
		</div>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>