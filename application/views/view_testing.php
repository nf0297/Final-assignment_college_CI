<section class="content-header">
	<h1>Pembuatan Jadwal
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
			<h3 class="box-title">Data Users</h3>
			<div class="pull-right">
				<a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<!--?php print_r($scmin->result()) ?-->
			<table class="table table-bordered table-striped" id="style1">
				<thead>
					<tr>	
						<th>#</th>
						<th>Description Name</th>
						<th>Process Name</th>
						<th>Urutan Process</th>
						<th>Total Waktu Process</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($row->result() as $key => $data) {
						?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$data->deskripsi_produk?></td>
						<td><?=$data->mesin_proses?></td>
						<td><?=$data->urutan_proses?></td>
						<td><?=$data->total_waktu_proses?></td>
						
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Users</h3>
			<div class="pull-right">
				<a href="<?=site_url('user/add')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<!--?php print_r($select_min->result()) ?-->
			<table class="table table-bordered table-striped" id="style1">
				<thead>
					<tr>	
						<th>#</th>
						<th>Description Name</th>
						<th>Process Name</th>
						<th>Urutan Process</th>
						<th>Total Waktu Process</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($select_min->result() as $key => $data) {
						?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$data->deskripsi_produk?></td>
						<td><?=$data->mesin_proses?></td>
						<td><?=$data->urutan_proses?></td>
						<td><?=$data->total_waktu_proses?></td>
						
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</section>