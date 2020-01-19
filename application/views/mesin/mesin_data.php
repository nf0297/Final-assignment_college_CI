<section class="content-header">
	<h1>Machine
    	<small>Mesin</small>
	</h1>
	<ol class="breadcrumb">
    	<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    	<li class="active">Machine</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Machine</h3>
			<div class="pull-right">
				<a href="<?=site_url('mesin/add')?>" class="btn btn-primary btn-flat">
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
						<th>No Mesin</th>
						<th>Nama Mesin</th>
						<th>Jumlah</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($row->result() as $key => $data) {
						?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$data->id_mesin?></td>
						<td><?=$data->nama_mesin?></td>
						<td><?=$data->jumlah_mesin?></td>
						<td class="text-center" width="160px">
							<form action="<?=site_url('mesin/del')?>" method="post">
								<a href="<?=site_url('mesin/edit/'.$data->nomor)?>" class="btn btn-primary btn-xs">
									<i class="fa fa-pencil"></i> Edit
								</a>
								<input type="hidden" name="number" value="<?=$data->nomor?>">
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