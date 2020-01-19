<section class="content-header">
	<h1>Product Detail
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
			<h3 class="box-title">Add Detail Product</h3>
			<div class="pull-right">
				<a href="<?=site_url('dproduk')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 "> <!-- col-md-offset-4 boleh dimasukan di samping col-md-4 apabila form ingin rata tengah-->
					<form action="" method="post">
						<div class="form-group <?=form_error('produkid') ? 'has-error' : null?>">
							<label>Kode Produk *</label>
							<input type="text" name="produkid" value="<?=set_value('produkid')?>" class="form-control">
							<?=form_error('produkid')?>
						</div>
						<div class="form-group <?=form_error('mesinid') ? 'has-error' : null?>">
							<label>Kode Mesin *</label>
							<input type="text" name="mesinid" value="<?=set_value('mesinid')?>" class="form-control">
							<?=form_error('mesinid')?>
						</div>
						<div class="form-group <?=form_error('prosesurutan') ? 'has-error' : null?>">
							<label>Urutan Proses  *</label>
							<input type="text" name="prosesurutan" class="form-control">
							<?=form_error('prosesurutan')?>
						</div>
						<div class="form-group <?=form_error('proseswaktu') ? 'has-error' : null?>">
							<label>Waktu Proses  *</label>
							<input type="text" name="proseswaktu" class="form-control">
							<?=form_error('proseswaktu')?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-flat">Save</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
					</form>
				</div>

			</div>
		</div>
	</div>
</section>