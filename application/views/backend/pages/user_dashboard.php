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
				<th>Nama</th>
				<th>E-mail</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($user->result() as $u): ?>
				<tr>
					<td><?= $u->NAMA_USER?></td>
					<td><?= $u->EMAIL?></td>
					<td>
						<?php 
							if($u->STATUS == 1){
								echo 'Aktif';
							}else{
								echo 'Nonaktif';
							}
						 ?>
					</td>
					<td>
						<a href="<?= base_url('admin/user/delete/'.$u->ID_USER)?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>