<section class="content-header">
	<h1>Schedule
    	<small>Hasil Jadwal</small>
	</h1>
	<ol class="breadcrumb">
    	<li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    	<li class="active">Result</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Result Schedule</h3>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 "> <!-- col-md-offset-4 boleh dimasukan di samping col-md-4 apabila form ingin rata tengah-->
					
					<form action="<?=site_url('metode/active_schedule')?>" method="post">
						<div class="form-group <?=form_error('tanggal') ? 'has-error' : null?>">
							<label>Tanggal *</label>
							<input type="date" name="tanggal" placeholder="" class="form-control">
							<?=form_error('tanggal')?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info btn-flat">&nbsp &nbsp Search &nbsp &nbsp</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</section>