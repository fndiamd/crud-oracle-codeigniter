<div class="container">
	<div class="col-sm-8 col-sm-offset-2">
		<?php if($this->session->flashdata('success')): ?>
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?= $this->session->flashdata('success');?>
			</div>
		<?php endif; ?>
		<?php if($this->session->flashdata('error')): ?>
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?= $this->session->flashdata('error');?>
			</div>
		<?php endif; ?>
		<form action="<?= base_url('signin-validation')?>" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<legend>Sign to Forum</legend>
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