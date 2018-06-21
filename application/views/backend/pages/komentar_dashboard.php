<?php 
	function readClob($f){
		if($f != ''){
			return $f->read($f->size());
		}
	}
 ?>
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
<div class="container">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Nama User</th>
				<th>Judul Artikel</th>
				<th>Komentar</th>
				<th>Tanggal</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($komentar->result() as $k): ?>
				<tr>
					<td><?= $k->NAMA?></td>
					<td><?= $k->JUDUL?></td>
					<td><?= substr(readClob($k->ISI_KOMENTAR), 0, 100)?></td>
					<td><?= $k->TANGGAL?></td>
					<td>
						<a href="<?= base_url('admin/komentar/delete/'.$k->ID_KOMENTAR)?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>