<section class="content-header">
	<h1>Schedule
    	<small>Jadwal</small>
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
			<h3 class="box-title">Add Schedule</h3>
			<div class="pull-right">
				<a href="<?=site_url('jadwal')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 "> <!-- col-md-offset-4 boleh dimasukan di samping col-md-4 apabila form ingin rata tengah-->
					
					<form action="" method="post">
						<div class="form-group <?=form_error('tanggal') ? 'has-error' : null?>">
							<label>Tanggal *</label>
							<input type="date" name="tanggal" value="<?=set_value('tanggal')?>" class="form-control" placeholder="yyyy-mm-dd"> 
							<?=form_error('tanggal')?>
						</div>
						<div class="form-group <?=form_error('kdproduk') ? 'has-error' : null?>">
							<label>Kode Produk *</label>
							<input type="text" name="kdproduk" value="<?=set_value('kdproduk')?>" class="form-control">
							<?=form_error('kdproduk')?>
						</div>
						<div class="form-group <?=form_error('jml') ? 'has-error' : null?>">
							<label>Jumlah *</label>
							<input type="text" name="jml" value="<?=set_value('jml')?>" class="form-control">
							<?=form_error('jml')?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-flat">&nbsp &nbsp Add &nbsp &nbsp</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</section>