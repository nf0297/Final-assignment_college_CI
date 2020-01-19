<section class="content-header">
	<h1>Schedule Detail
    	<small>Detail Jadwal</small>
	</h1>
	<ol class="breadcrumb">
    	<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    	<li class="active">Schedule</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
<div class="box">
		<div class="box-header">
			<h3 class="box-title">Data Schedule</h3>
			<div class="pull-right">
				<a href="<?=site_url('jadwal/add')?>" class="btn btn-info btn-flat">
					<i class="fa fa-plus"></i>Process
				</a>
			</div>
			<div class="pull-right">
				<a href="<?=site_url('jadwal/add')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-plus"></i> &nbsp Add &nbsp
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<!--?php print_r($row->result()) ?-->
			<table id="style1" class="table table-bordered table-striped">
				<thead>
					<tr>	
						<th>#</th>
						<th>Tanggal</th>
						<th>Kode Produk</th>
						<th>Nama Produk</th>
						<th>Nama Mesin</th>
						<th>Urutan Proses</th>
						<th>Waktu Proses</th>
						<th>Jumlah</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($rows->result() as $key => $data) {
						?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$data->tanggal?></td>
						<td><?=$data->id_produk?></td>
						<td><?=$data->deskripsi_produk?></td>
						<td><?=$data->nama_mesin?></td>
						<td><?=$data->urutan_proses?></td>
						<td><?=$data->waktu_proses?></td>																		
						<td><?=$data->jumlah?></td>
							<td class="text-center" width="160px">
							<form action="<?=site_url('jadwal/del')?>" method="post">
								<a href="<?=site_url('jadwal/edit/'.$data->no_penjadwalan)?>" class="btn btn-primary btn-xs">
									<i class="fa fa-hourglass"></i> Hitung
								</a>
							
								<input type="hidden" name="jadwal_id" value="<?=$no?>">
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