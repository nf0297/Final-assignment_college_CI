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
			<h3 class="box-title">Add Machine</h3>
			<div class="pull-right">
				<a href="<?=site_url('mesin')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 "> <!-- col-md-offset-4 boleh dimasukan di samping col-md-4 apabila form ingin rata tengah-->
					
					<form action="" method="post">
						<div class="form-group <?=form_error('machinecode') ? 'has-error' : null?>">
							<label>Machine Code *</label>
							<input type="text" name="machinecode" class="form-control">
							<?=form_error('machinecode')?>
						</div>
						<div class="form-group <?=form_error('machinename') ? 'has-error' : null?>">
							<label>Machine Name *</label>
							<input type="text" name="machinename" value="<?=set_value('machinename')?>" class="form-control">
							<?=form_error('machinename')?>
						</div>
						<div class="form-group <?=form_error('machineqty') ? 'has-error' : null?>">
							<label>Machine Quantity *</label>
							<input type="text" name="machineqty" class="form-control">
							<?=form_error('machineqty')?>
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