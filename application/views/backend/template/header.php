<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?= base_url()?>">Admin Forum</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<?php if ($this->session->userdata('loginadmin')): ?>
			<ul class="nav navbar-nav navbar-left">
				<li><a href="<?= base_url('admin/manage-user')?>">Manage User</a></li>
				<li><a href="<?= base_url('admin/manage-artikel')?>">Manage Artikel</a></li>
				<li><a href="<?= base_url('admin/manage-komentar')?>">Manage Komentar</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Hai, <?= $this->session->userdata('nama_admin');?></a></li>
				<li><a href="<?= base_url('admin/logout')?>">Logout</a></li>
			</ul>
			<?php endif; ?>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>