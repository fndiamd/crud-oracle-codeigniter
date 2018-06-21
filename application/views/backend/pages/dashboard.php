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
	<div class="row">
		<div class="col-sm-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Management User</h3>
				</div>
				<div class="panel-body">
					<h2><?= $cu?> User</h2>
					<a href="<?= base_url('admin/manage-user')?>" class="btn btn-primary">Lihat</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Management Artikel</h3>
				</div>
				<div class="panel-body">
					<h2><?= $ca?> Artikel</h2>
					<a href="<?= base_url('admin/manage-artikel')?>" class="btn btn-primary">Lihat</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Management Komentar</h3>
				</div>
				<div class="panel-body">
					<h2><?= $ck?> Komentar</h2>
					<a href="<?= base_url('admin/manage-komentar')?>" class="btn btn-primary">Lihat</a>
				</div>
			</div>
		</div>
	</div>
</div>