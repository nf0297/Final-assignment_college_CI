<section class="content-header">
	<h1>Users
    	<small>Pengguna</small>
	</h1>
	<ol class="breadcrumb">
    	<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    	<li class="active">Users</li>
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
			<!--?php print_r($row->result()) ?-->
			<table class="table table-bordered table-striped" id="style1">
				<thead>
					<tr>	
						<th>#</th>
						<th>Username</th>
						<th>Name</th>
						<th>Level</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($row->result() as $key => $data) {
						?>
					<tr>
						<td><?=$no++?></td>
						<td><?=$data->username?></td>
						<td><?=$data->nama_lengkap?></td>
						<td><?=$data->level == 1 ? "Admin" : ($data->level == 2 ? "Manager" : ($data->level == 3 ? "Engineer" : "Operator")); ?></td>
						<td class="text-center" width="160px">
							<form action="<?=site_url('user/del')?>" method="post">
								<a href="<?=site_url('user/edit/'.$data->id_pengguna)?>" class="btn btn-primary btn-xs">
									<i class="fa fa-pencil"></i> Edit
								</a>
							
								<input type="hidden" name="user_id" value="<?=$data->id_pengguna?>">
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