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
			<h3 class="box-title">Add Users</h3>
			<div class="pull-right">
				<a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i> Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 "> <!-- col-md-offset-4 boleh dimasukan di samping col-md-4 apabila form ingin rata tengah-->
					
					<form action="" method="post">
						<div class="form-group <?=form_error('fullname') ? 'has-error' : null?>">
							<label>Name *</label>
							<input type="text" name="fullname" value="<?=set_value('fullname')?>" class="form-control">
							<?=form_error('fullname')?>
						</div>
						<div class="form-group <?=form_error('username') ? 'has-error' : null?>">
							<label>Username *</label>
							<input type="text" name="username" class="form-control">
							<?=form_error('username')?>
						</div>
						<div class="form-group <?=form_error('password') ? 'has-error' : null?>">
							<label>Password *</label>
							<input type="password" name="password" class="form-control">
							<?=form_error('password')?>
						</div>
						<div class="form-group <?=form_error('passconf') ? 'has-error' : null?>">
							<label>Password Confirmation *</label>
							<input type="password" name="passconf" class="form-control">
							<?=form_error('passconf')?>
						</div>
						<div class="form-group <?=form_error('level') ? 'has-error' : null?>">
							<label>Level *</label>
							<select name="level" class="form-control">
								<option value="">- Pilih -</option>
								<option value="1">Admin</option>
								<option value="2">Manager</option>
								<option value="3">Engineer</option>
							</select>
							<?=form_error('level')?>
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