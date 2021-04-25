       <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="varchar">Kode Barang <?php echo form_error('kode_member') ?></label>
            <input type="text" class="form-control" name="kode_member" id="kode_member" placeholder="Kode Barang" value="<?php echo $kode_member; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Type Mobil <?php echo form_error('type_mobil') ?></label>
            <input type="text" class="form-control" name="type_mobil" id="type_mobil" placeholder="Type Mobil" value="<?php echo $type_mobil; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kode Mesin <?php echo form_error('kode_mesin') ?></label>
            <input type="text" class="form-control" name="kode_mesin" id="kode_mesin" placeholder="Kode Mesin" value="<?php echo $kode_mesin; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Tahun <?php echo form_error('tahun') ?></label>
            <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Rangka <?php echo form_error('no_rangka') ?></label>
            <input type="text" class="form-control" name="no_rangka" id="no_rangka" placeholder="No Rangka" value="<?php echo $no_rangka; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">No Mesin <?php echo form_error('no_mesin') ?></label>
            <input type="text" class="form-control" name="no_mesin" id="no_mesin" placeholder="No Mesin" value="<?php echo $no_mesin; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Plat Nomor <?php echo form_error('plat_nomor') ?></label>
            <input type="text" class="form-control" name="plat_nomor" id="plat_nomor" placeholder="Plat Nomor" value="<?php echo $plat_nomor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Warna <?php echo form_error('warna') ?></label>
            <input type="text" class="form-control" name="warna" id="warna" placeholder="Warna" value="<?php echo $warna; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pekerjaan <?php echo form_error('pekerjaan') ?></label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" value="<?php echo $pekerjaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Hp <?php echo form_error('hp') ?></label>
            <input type="text" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Medsos <?php echo form_error('medsos') ?></label>
            <input type="text" class="form-control" name="medsos" id="medsos" placeholder="Medsos" value="<?php echo $medsos; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto Member <?php echo form_error('foto_member') ?></label>
            <input type="file" class="form-control" name="foto_member" id="foto_member" placeholder="Foto Member" value="<?php echo $foto_member; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto Unit <?php echo form_error('foto_unit') ?></label>
            <input type="text" class="form-control" name="foto_unit" id="foto_unit" placeholder="Foto Unit" value="<?php echo $foto_unit; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('member') ?>" class="btn btn-default">Cancel</a>
	</form>