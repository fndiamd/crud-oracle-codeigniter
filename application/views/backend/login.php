<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
	<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
</head>
<body>
	<br>
	<br>
	<br>
	<div class="container">
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
		<div class="col-sm-6 col-sm-offset-3">
			<form action="<?= base_url('admin/login-validation')?>" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<legend>Login Admin</legend>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input class="form-control" type="email" name="email" reqired>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input class="form-control" type="password" name="password" reqired>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>