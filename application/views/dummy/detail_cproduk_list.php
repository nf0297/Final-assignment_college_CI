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
        <h2 style="margin-top:0px">Detail_cproduk List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('dummy/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('dummy/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('dummy'); ?>" class="btn btn-default">Reset</a>
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
		<th>Id Produk</th>
		<th>Id Mesin</th>
		<th>Urutan Proses</th>
		<th>Ci</th>
		<th>Ti</th>
		<th>Ri</th>
		<th>Action</th>
            </tr><?php
            foreach ($dummy_data as $dummy)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $dummy->id_produk ?></td>
			<td><?php echo $dummy->id_mesin ?></td>
			<td><?php echo $dummy->urutan_proses ?></td>
			<td><?php echo $dummy->ci ?></td>
			<td><?php echo $dummy->ti ?></td>
			<td><?php echo $dummy->ri ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('dummy/read/'.$dummy->id_cproses),'Read'); 
				echo ' | '; 
				echo anchor(site_url('dummy/update/'.$dummy->id_cproses),'Update'); 
				echo ' | '; 
				echo anchor(site_url('dummy/delete/'.$dummy->id_cproses),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>