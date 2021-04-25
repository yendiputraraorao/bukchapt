
        <h2 style="margin-top:0px">Aacontoh <?php echo $button ?></h2>
<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Foto Barang <?php echo form_error('foto_barang') ?></label>
            <input type="file" class="form-control" name="foto_barang" id="foto_barang" />
        </div>
	    <input type="hidden" name="id_contoh" value="<?php echo $id_contoh; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('aacontoh') ?>" class="btn btn-default">Cancel</a>
	</form>