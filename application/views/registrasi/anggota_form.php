<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="varchar">Kode Anggota <?php echo form_error('kode_anggota') ?></label>
            <input type="text" class="form-control" name="kode_anggota" id="kode_anggota" placeholder="Kode Anggota" value="<?php echo $kode_anggota; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Nama Anggota <?php echo form_error('nama_anggota') ?></label>
            <input type="text" class="form-control" name="nama_anggota" id="nama_anggota" placeholder="Nama Anggota" value="<?php echo $nama_anggota; ?>" />
        </div>
		<div class="form-group">
            <label for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <!--input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="jenis kelamin" value="<?php echo $jenis_kelamin; ?>" /-->
			<!--input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo set_radio('jenis_kelamin', 'Laki-laki'); ?>> Laki-laki
			<input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo set_radio('jenis_kelamin', 'Perempuan'); ?>> Perempuan -->
			
			<select name="jenis_kelamin" id="jenis_kelamin" style="width: 200px;"class="form-control">
				<option <?php if ($jenis_kelamin=="Laki-laki") {echo "selected"; } ?> value='Laki-laki'>Laki-laki</option>
				<option <?php if ($jenis_kelamin=="Perempuan") {echo "selected"; } ?> value='Perempuan'>Perempuan</option>
			</select>
					  
		
		</div>
		<div class="form-group">
            <label for="varchar">Golongan Darah <?php echo form_error('golongan_darah') ?></label>
            <!--input type="text" class="form-control" name="golongan_darah" id="golongan_darah" placeholder="golongan_darah" value="<?php echo $golongan_darah; ?>" /-->
			<select name="golongan_darah" id="golongan_darah" style="width: 100px;"class="form-control">
				<option <?php if ($golongan_darah=="A") {echo "selected"; } ?> value='A'>A</option>
				<option <?php if ($golongan_darah=="B") {echo "selected"; } ?> value='B'>B</option>
				<option <?php if ($golongan_darah=="AB") {echo "selected"; } ?> value='AB'>AB</option>
				<option <?php if ($golongan_darah=="O") {echo "selected"; } ?> value='O'>O</option>	
			</select>
		</div>
        <div class="form-group">
            <label for="int">Tempat lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="test" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="tempat_lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
		
		<div class="form-group">
            <label for="int">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Harga" value="<?php echo $tanggal_lahir; ?>" />
        </div>
		<div class="form-group">
            <label for="int">Foto Anggota </label>
            <input type="file" class="form-control" name="foto_anggota" />
        </div>
		<div class="form-group">
            <label for="int">Type mobil <?php echo form_error('type_mobil') ?></label>
            <input type="text" class="form-control" name="type_mobil" id="type_mobil" placeholder="type_mobil" value="<?php echo $type_mobil; ?>" />
        </div>
		
		<div class="form-group">
            <label for="int">No mesin <?php echo form_error('no_mesin') ?></label>
            <input type="text" class="form-control" name="no_mesin" id="no_mesin" placeholder="no_mesin" value="<?php echo $no_mesin; ?>" />
        </div>        
        <div class="form-group">
            <label for="int">No rangka <?php echo form_error('no_rangka') ?></label>
            <input type="text" class="form-control" name="no_rangka" id="no_rangka" placeholder="no_rangka" value="<?php echo $no_rangka; ?>" />
        </div>
		<div class="form-group">
            <label for="int">Tahun Kendaraan <?php echo form_error('tahun') ?></label>
            <!--input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tulis Tahun kendaraan" value="<?php echo $tahun; ?>" /-->
			<select name="tahun" style="width: 200px;"class="form-control">
				<option selected="selected">Tahun Kendaraan</option>
				<?php
					echo"<option selected='selected' value='$tahun'> $tahun </option>";
					for($i=date('Y'); $i>=date('Y')-45; $i-=1)				
				echo"<option value='$i'> $i </option>";
				?>
			</select>
		
		</div>
		<div class="form-group">
            <label for="int">plat_nomor <?php echo form_error('plat_nomor') ?></label>
            <input type="text" class="form-control" name="plat_nomor" id="plat_nomor" placeholder="Nomor Plat" value="<?php echo $plat_nomor; ?>" />
        </div>
		<div class="form-group">
            <label for="int">warna_mobil <?php echo form_error('warna_mobil') ?></label>
            <input type="text" class="form-control" name="warna_mobil" id="warna_mobil" placeholder="Warna Mobil" value="<?php echo $warna_mobil; ?>" />
        </div>
		<div class="form-group">
            <label for="int">pekerjaan <?php echo form_error('pekerjaan') ?></label>
            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Jenis Pekerjaan" value="<?php echo $pekerjaan; ?>" />
        </div>
		<div class="form-group">
            <label for="int">alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Tulis Alamat Domisili" value="<?php echo $alamat; ?>" />
        </div>
		<div class="form-group">
            <label for="int">No HP <?php echo form_error('hp') ?></label>
            <input type="text" class="form-control" name="hp" id="hp" placeholder="Tulis No HP" value="<?php echo $hp; ?>" />
        </div>
		<div class="form-group">
            <label for="int">E-mail <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Tulis Alamat e-mail" value="<?php echo $email; ?>" />
        </div>
		<div class="form-group">
            <label for="int">Media Sosial <?php echo form_error('medsos') ?></label>
            <input type="text" class="form-control" name="medsos" id="medsos" placeholder="Tulis Media Sosial" value="<?php echo $medsos; ?>" />
        </div>
		
		
		
		
        <input type="hidden" name="id_anggota" value="<?php echo $id_anggota; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('registrasi') ?>" class="btn btn-default">Cancel</a>
    </form>
	
	<!--ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#home">Primary Profile</a></li>
			<li><a data-toggle="tab" href="#Organisasi">Organisasi</a></li>
			<li><a data-toggle="tab" href="#Profesi">Profesi</a></li>
			<li><a data-toggle="tab" href="#Alamat">Alamat</a></li>
			<li><a data-toggle="tab" href="#Rangking">Rangking & Sabuk</a></li>
			<li><a data-toggle="tab" href="#Informasi">Informasi</a></li>
	</ul>
		<div class="tab-content">
			<div id="home" class="tab-pane fade in active">
				<table class="table table-bordered table-striped table-hover">
					<tr>
					  <td>ID</td>
					  <td><label for="varchar">Kode Anggota <?php echo form_error('kode_anggota') ?></label>
						  <input type="text" class="form-control" name="kode_anggota" id="kode_anggota" placeholder="Kode Anggota" value="<?php echo $kode_anggota; ?>" /> </td>	
        
					  <td>Register PBTI/KKW</td>
					  <td><label for="int">No rangka <?php echo form_error('no_rangka') ?></label>
            <input type="text" class="form-control" name="no_rangka" id="no_rangka" placeholder="no_rangka" value="<?php echo $no_rangka; ?>" />
        </td></tr>
					<tr>
					  <td>Nama Belakang</td>
					  <td><label for="int">Foto Anggota </label> <input type="file" class="form-control" name="foto_anggota" /></td>
					</tr>
					<tr>
					  <td>Panggilan</td>
					  <td><input type="text" name="input_panggilan" value="<?php echo set_value('input_panggilan'); ?>"></td>
					
					  <td>Tanggal Lahir</td>
					  <td><input type="date" name="input_tanggal_lahir" value="<?php echo set_value('input_tanggal_lahir'); ?>"></td>
					</tr>
					<tr>
					  <td>Jenis Kelamin</td>
					  <td>
					  <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo set_radio('jenis_kelamin', 'Laki-laki'); ?>> Laki-laki
					  <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo set_radio('jenis_kelamin', 'Perempuan'); ?>> Perempuan
					  </td>
					  <td>e-mail</td>
					  <td><input type="text" name="input_email" value="<?php echo set_value('input_email'); ?>"></td>
					 
					</tr> 
					<tr>
					  <td>Primary Posision</td>
					  <td><input type="text" name="input_primaryposision" value="<?php echo set_value('input_primaryposision'); ?>"></td>

					  <td>Secondary Posision</td>
					  <td><input type="text" name="input_secondaryposision" value="<?php echo set_value('input_secondaryposision'); ?>"></td>
					</tr>
				</table>
			</div>
			<div id="Organisasi" class="tab-pane fade">				
				<table class="table table-bordered table-striped table-hover">
					<tr>
					  <td>Negara</td>
					  <td><input type="text" name="input_negara" value="<?php echo set_value('input_negara'); ?>" ></td>
					</tr>
					
					<tr>
						<td>Provinsi</td>
						<td><select name="input_id_provinsi" id="input_id_provinsi" >
							<option value="">Pilih</option>          
							<?php
							  foreach($ambil_provinsi as $data){ // Lakukan looping pada variabel siswa dari controller
								echo "<option value='".$data->id_provinsi."'>".$data->nama_provinsi."</option>";
							  }
							?>
						</select>
					</tr>
						<td><b>Kota</b></td>
						<td>
						<select name="input_id_kab_kota" id="input_id_kab_kota" style="width: 200px;">
						  <option value="">Pilih</option>
						</select>
						<div id="loading" style="margin-top: 15px;">
						  <img src="../assets/images/loading.gif" width="80"> <small>Loading...</small>
						</div>
						</td>
					<tr>
					
					<tr>
					  <td>Club/Unit Latihan/ Dojang</td>
					  <td><input type="text" name="input_club" value="<?php echo set_value('input_club'); ?>"></td>
					</tr>
				</table>
			</div>
			<div id="Profesi" class="tab-pane fade">
				<table class="table table-bordered table-striped table-hover">
					<tr>
					  <td>Profesi</td>
					  <td>
					  <select name="golongan_darah" id="golongan_darah" style="width: 200px;">
						  <option value="">Pilih Profesi</option>
						  <option value="Coach">Coach</option>					  
						  <option value="Atlit">Atlit</option>					  
						  <option value="Referee">Referee</option>					  
						  <option value="Official">Official</option>					  
						  <option value="Doctor">Doctor</option>					  
						  <option value="Physioterapist">Physioterapist</option>					  
						  <option value="Volunteer">Volunteer</option>					  
						  <option value="Staff">Staff</option>					  
						  <option value="Media">Media</option>					  
						  <option value="Fan">Fan</option>					  
					</select>
					</td>
					</tr>
				</table>
			</div>
			<div id="Alamat" class="tab-pane fade">
				<table class="table table-bordered table-striped table-hover">
					<tr>
					  <td>Provinsi</td>
					  <td><input type="text" name="input_alamat_provinsi" value="<?php echo set_value('input_alamat_provinsi'); ?>"></td>
					</tr>
					<tr>
					  <td>Kabupaten/Kota</td>
					  <td><input type="text" name="input_alamat_kabkota" value="<?php echo set_value('input_alamat_kabkota'); ?>"></td>
					</tr>
					<tr>
					  <td>Kecamatan</td>
					  <td><input type="text" name="input_alamat_kecamatan" value="<?php echo set_value('input_alamat_kecamatan'); ?>"></td>
					</tr>
					<tr>
					  <td>Desa</td>
					  <td><input type="text" name="input_alamat_desa" value="<?php echo set_value('input_alamat_desa'); ?>"></td>
					</tr>
					<tr>
					  <td>Kode Pos</td>
					  <td><input type="text" name="input_kodepos" value="<?php echo set_value('input_kodepos'); ?>"></td>
					</tr>
				</table>
			</div>			
			<div id="Rangking" class="tab-pane fade">
				<table class="table table-bordered table-striped table-hover">
					<tr>
					  <td>Rangking Nasional</td>
					  <td><input type="text" name="input_rangking_nasional" value="<?php echo set_value('input_rangking_nasional'); ?>"></td>
					</tr>
					<tr>
					  <td>Rangking Provinsi</td>
					  <td><input type="text" name="input_rangking_provinsi" value="<?php echo set_value('input_rangking_provinsi'); ?>"></td>
					</tr>
					<tr>
					  <td>Warna Sabuk</td>
					  <td>
					  
					  <select name="input_warna_sabuk" id="input_warna_sabuk" style="width: 200px;">
						  <option value="">Pilih Warna Sabuk</option>
						  <option value="Putih (geup X)">Putih (geup X)</option>					  
						  <option value="Kuning Polos (geup IX)">Kuning Polos (geup IX)</option>					  
						  <option value="Kuning Strip (geup VIII)">Kuning Strip (geup VIII)</option>					  
						  <option value="Official">Official</option>					  
						  <option value="Doctor">Doctor</option>					  
						  <option value="Physioterapist">Physioterapist</option>					  
						  <option value="Volunteer">Volunteer</option>					  
						  <option value="Staff">Staff</option>					  
						  <option value="Media">Media</option>					  
						  <option value="Fan">Fan</option>		  
					</select>
					  
					  <input type="text" name="input_warna_sabuk" value="<?php echo set_value('input_warna_sabuk'); ?>"></td>
					</tr>
				</table>
			</div>
			<div id="Informasi" class="tab-pane fade">
				<table class="table table-bordered table-striped table-hover">
					<tr>
					  <td>Tinggi</td>
					  <td><input type="text" name="input_tinggi" value="<?php echo set_value('input_tinggi'); ?>"></td>
					</tr>
					<tr>
					  <td>Berat</td>
					  <td><input type="text" name="input_berat" value="<?php echo set_value('input_berat'); ?>"></td>
					</tr>
					<tr>
					  <td>Golongan Darah</td>
					  <td><input type="text" name="input_golongan_darah" value="<?php echo set_value('input_golongan_darah'); ?>"></td>
					</tr>
					<tr>
					  <td>Foto</td>
					  <td><input type="text" name="input_foto" value="<?php echo set_value('input_foto'); ?>">
					  <input type="file" name="filefoto"></td>					
					</tr>
				 </table>
				  <input type="submit" name="submit" value="Simpan">
				  <a href="<?php echo base_url(); ?>"><input type="button" value="Batal"></a>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div-->