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
				<th>Tanggal</th>
				<th>Judul</th>
				<th>Isi</th>
				<th>Author</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($artikel->result() as $a): ?>
				<tr>
					<td><?= $a->TANGGAL?></td>
					<td><?= $a->JUDUL?></td>
					<td><?= substr(readClob($a->ISI_ARTIKEL), 0, 100)?></td>
					<td><?= $a->NAMA?></td>
					<td>
						<a href="<?= base_url('admin/artikel/edit/'.$a->ID_ARTIKEL)?>" class="btn btn-warning">Edit</a>
						<a href="<?= base_url('admin/artikel/delete/'.$a->ID_ARTIKEL)?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>