<?php 
	function readClob($f){if($f != ''){return $f->read($f->size());}}
 ?>
<div class="container">
	<?php if($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><?= $this->session->flashdata('success');?>
		</div>
	<?php endif; ?>
	<?php if ($this->session->userdata('loginuser')): ?>
		<a href="<?= base_url('create-article')?>" class="btn btn-primary">Create Artikel</a>
	<?php endif ?>
	<br>
	<br>
	<?php foreach ($artikel->result() as $item): ?>
		<div class="list-group">
			<a href="<?= base_url('read/article/'.$item->ID_ARTIKEL)?>" class="list-group-item">
				<h4 class="list-group-item-heading"><?= strtoupper($item->JUDUL)?></h4>
				<p class="list-group-item-text"><?= substr(readClob($item->ISI_ARTIKEL), 0, 200)?></p>
			</a>
		</div>
	<?php endforeach ?>
</div>