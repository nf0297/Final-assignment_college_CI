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
        <h2 style="margin-top:0px">Detail_produk <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Id Produk <?php echo form_error('id_produk') ?></label>
            <input type="text" class="form-control" name="id_produk" id="id_produk" placeholder="Id Produk" value="<?php echo $id_produk; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">Id Mesin <?php echo form_error('id_mesin') ?></label>
            <input type="text" class="form-control" name="id_mesin" id="id_mesin" placeholder="Id Mesin" value="<?php echo $id_mesin; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Urutan Proses <?php echo form_error('urutan_proses') ?></label>
            <input type="text" class="form-control" name="urutan_proses" id="urutan_proses" placeholder="Urutan Proses" value="<?php echo $urutan_proses; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">T Proses <?php echo form_error('t_proses') ?></label>
            <input type="text" class="form-control" name="t_proses" id="t_proses" placeholder="T Proses" value="<?php echo $t_proses; ?>" />
        </div>
	    <div class="form-group">
            <label for="decimal">T All <?php echo form_error('t_all') ?></label>
            <input type="text" class="form-control" name="t_all" id="t_all" placeholder="T All" value="<?php echo $t_all; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('metode_m') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>