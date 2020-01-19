<section class="content-header">
	<h1>Schedule Result
    	<small>Hasil</small>
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
			<h3 class="box-title">Schedule Result</h3>
			<div class="pull-right">
				<a href="<?=site_url('mesin/add')?>" class="btn btn-primary btn-flat">
					<i class="fa fa-user-plus"></i> Create
				</a>
			</div>
		</div>
		<div class="box-body table-responsive">
			<!--?php print_r($row->result()) ?-->
			<table id="style1" class="table table-bordered table-striped">
				<<thead>
					<tr>	
						<th>id</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach($row->result() as $key => $data) {
						?>
					<tr>
						<td><?=$data->id_mesin?></td>
					</tr>
					<?php
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</section>