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
			<h3 class="box-title">Edit Product</h3>
			<div class="pull-right">
				<a href="<?=site_url('sproduk')?>" class="btn btn-warning btn-flat">
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
							<input type="text" name="produkid" value="<?=$this->input->post('produkid') ?? $row->id_produk ?>" class="form-control">
							<?=form_error('produkid')?>
						</div>
						<div class="form-group <?=form_error('produkdesk') ? 'has-error' : null?>">
							<label>Nama Produk *</label>
							<input type="text" name="produkdesk" value="<?=$this->input->post('produkdesk') ?? $row->deskripsi_produk ?>" class="form-control">
							<?=form_error('produkdesk')?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-flat">Save</button>
							<button type="reset" class="btn btn-flat">Reset</button>
						</div>
						<small>* harus diberi isi </small>
					</form>
				</div>

			</div>
		</div>
	</div>
</section>