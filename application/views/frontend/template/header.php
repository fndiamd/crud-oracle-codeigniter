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
			<a class="navbar-brand" href="<?= base_url()?>">Forum</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<?php if ($this->session->userdata('loginuser')): ?>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Hai, <?= $this->session->userdata('nama');?></a></li>
				<li><a href="<?= base_url('logout')?>">Logout</a></li>
			</ul>
			<?php else: ?>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?= base_url('sign-in')?>">Sign In</a></li>
				<li><a href="<?= base_url('register')?>">Register</a></li>
			</ul>
			<?php endif; ?>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>