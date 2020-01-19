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
        <h2 style="margin-top:0px">Hasil Read</h2>
        <table class="table">
	    <tr><td>Id Produk</td><td><?php echo $id_produk; ?></td></tr>
	    <tr><td>Urutan Proses</td><td><?php echo $urutan_proses; ?></td></tr>
	    <tr><td>Id Mesin</td><td><?php echo $id_mesin; ?></td></tr>
	    <tr><td>Ci</td><td><?php echo $ci; ?></td></tr>
	    <tr><td>Ti</td><td><?php echo $ti; ?></td></tr>
	    <tr><td>Rj</td><td><?php echo $rj; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('result') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>