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
        <h2 style="margin-top:0px">Mutasi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Atlit <?php echo form_error('id_atlit') ?></label>
            <input type="text" class="form-control" name="id_atlit" id="id_atlit" placeholder="Id Atlit" value="<?php echo $id_atlit; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Dojang Lama <?php echo form_error('id_dojang_lama') ?></label>
            <input type="text" class="form-control" name="id_dojang_lama" id="id_dojang_lama" placeholder="Id Dojang Lama" value="<?php echo $id_dojang_lama; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Dojang Baru <?php echo form_error('id_dojang_baru') ?></label>
            <input type="text" class="form-control" name="id_dojang_baru" id="id_dojang_baru" placeholder="Id Dojang Baru" value="<?php echo $id_dojang_baru; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Surat Melepas <?php echo form_error('surat_melepas') ?></label>
            <input type="text" class="form-control" name="surat_melepas" id="surat_melepas" placeholder="Surat Melepas" value="<?php echo $surat_melepas; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Surat Menerima <?php echo form_error('surat_menerima') ?></label>
            <input type="text" class="form-control" name="surat_menerima" id="surat_menerima" placeholder="Surat Menerima" value="<?php echo $surat_menerima; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Scan Kk Baru <?php echo form_error('scan_kk_baru') ?></label>
            <input type="text" class="form-control" name="scan_kk_baru" id="scan_kk_baru" placeholder="Scan Kk Baru" value="<?php echo $scan_kk_baru; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Disetujui <?php echo form_error('disetujui') ?></label>
            <input type="text" class="form-control" name="disetujui" id="disetujui" placeholder="Disetujui" value="<?php echo $disetujui; ?>" />
        </div>
	    <input type="hidden" name="id_mutasi" value="<?php echo $id_mutasi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mutasi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>