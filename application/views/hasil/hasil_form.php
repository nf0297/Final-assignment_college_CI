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
        <h2 style="margin-top:0px">Hasil <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Produk <?php echo form_error('id_produk') ?></label>
            <input type="text" class="form-control" name="id_produk" id="id_produk" placeholder="Id Produk" value="<?php echo $id_produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Urutan Proses <?php echo form_error('urutan_proses') ?></label>
            <input type="text" class="form-control" name="urutan_proses" id="urutan_proses" placeholder="Urutan Proses" value="<?php echo $urutan_proses; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Id Mesin <?php echo form_error('id_mesin') ?></label>
            <input type="text" class="form-control" name="id_mesin" id="id_mesin" placeholder="Id Mesin" value="<?php echo $id_mesin; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Ci <?php echo form_error('ci') ?></label>
            <input type="text" class="form-control" name="ci" id="ci" placeholder="Ci" value="<?php echo $ci; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Ti <?php echo form_error('ti') ?></label>
            <input type="text" class="form-control" name="ti" id="ti" placeholder="Ti" value="<?php echo $ti; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">Rj <?php echo form_error('rj') ?></label>
            <input type="text" class="form-control" name="rj" id="rj" placeholder="Rj" value="<?php echo $rj; ?>" />
        </div>
	    <input type="hidden" name="id_proses" value="<?php echo $id_proses; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('hasil') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>