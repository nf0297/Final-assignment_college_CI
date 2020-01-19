<section class="content-header">
	<h1>Product
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
				<a href="<?=site_url('sproduk/add')?>" class="btn btn-primary btn-flat">
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
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($row->result() as $key => $data) {
						?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$data->id_produk?></td>
						<td><?=$data->deskripsi_produk?></td>
						<td class="text-center" width="160px">
							<form action="<?=site_url('sproduk/del')?>" method="post">
								<a href="<?=site_url('sproduk/edit/'.$data->id_produk)?>" class="btn btn-primary btn-xs">
									<i class="fa fa-pencil"></i> Edit
								</a>
								<input type="hidden" name="produk_id" value="<?=$data->id_produk?>">
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