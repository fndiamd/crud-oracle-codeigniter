<div class="container">
	<div class="col-sm-8 col-sm-offset-2">
		<form action="<?= base_url('register-validation')?>" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<legend>Register New User</legend>
				</div>
				<div class="form-group">
					<label class="control-label">Name</label>
					<input class="form-control" type="text" name="name" required value="<?= set_value('name')?>">
					<?php if(form_error('name')) : ?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?= form_error('name')?>
						</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label class="control-label">E-Mail</label>
					<input class="form-control" type="email" name="email" required value="<?= set_value('email')?>">
					<?php if(form_error('email')) : ?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?= form_error('email')?>
						</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<label class="control-label">Password</label>
					<input class="form-control" type="password" name="password">
					<?php if(form_error('password')) : ?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?= form_error('password')?>
						</div>
					<?php endif; ?>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
		</form>
	</div>
</div>