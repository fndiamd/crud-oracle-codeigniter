<?php function readClob($f){if($f != ''){return $f->read($f->size());}} ?>
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title"><?= strtoupper($artikel->JUDUL)?></h3>
			<br>
			<?= $artikel->TANGGAL?> by <?= $artikel->NAMA?>
		</div>
		<div class="panel-body">
			<img src="<?= base_url('assets/img/artikel/'.$artikel->GAMBAR)?>" class="img-responsive" alt="Image">
			<br>
			<p>
				<?= readClob($artikel->ISI_ARTIKEL)?>
			</p>
		</div>
	</div>
	<div class="panel panel-info">
		<div class="panel-heading">
			<h3 class="panel-title">Komentar</h3>
		</div>
		<div class="panel-body">
			<?php if($this->session->userdata('iduser') != NULL): ?>
			<form action="<?= base_url('post-komentar/'.$artikel->ID_ARTIKEL)?>" method="POST" class="form-horizontal" role="form">
				<div class="form-group">
					<textarea class="form-control" rows="8" name="komentar" required></textarea>
				</div>
				<div class="form-group">
				<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
			<?php else: ?>
				Anda harus masuk untuk bisa berkomentar
			<?php endif; ?>
		</div>
		<ul class="list-group">
		<?php foreach ($komentar->result() as $komen): ?>
			<li class="list-group-item">
				<h4><?= $komen->NAMA?></h4>
				<?= $komen->TANGGAL?>
				<br><br>
				<p><?= readClob($komen->ISI_KOMENTAR)?></p>
			</li>
		<?php endforeach ?>
		</ul>
	</div>
</div>