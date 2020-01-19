<section class="content-header">
	<h1>Detail Product
    	<small>Produk</small>
	</h1>
	<ol class="breadcrumb">
    	<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    	<li class="active">Product</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Product</h3>
			<div class="pull-right">
				<a href="<?=site_url('dproduk/add')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<!--?php print_r($row->result()) ?-->
			
			<table id="style1" class="table table-bordered table-striped">
				<thead>
					<tr>	
						<th>#</th>
						<th>Kode Produk</th>
						<th>Nama Produk</th>
						<th>Nama Mesin</th>
						<th>Urutan Proses</th>
						<th>Waktu Proses</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($rows->result() as $key => $data) {
						?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$data->id_produk?></td>
						<td><?=$data->deskripsi_produk?></td>
						<td><?=$data->nama_mesin?></td>
						<td><?=$data->urutan_proses?></td>
						<td><?=$data->t_proses?></td>
						<td class="text-center" width="160px">
							<form action="<?=site_url('dproduk/del')?>" method="post">
								
							
								<input type="hidden" name="nomor" value="<?=$data->id?>">
								<button onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-xs">
									<i class="fa fa-trash"></i> Delete
								</button>
							</form>
						</td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</section>