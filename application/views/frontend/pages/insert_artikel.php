<?php 
	// jika menerobos ingin insert artikel tapi belom login, arahkan ke halaman login
	if($this->session->userdata('iduser') == NULL){
		$this->session->set_flashdata('error', 'Anda harus masuk dulu');
		redirect(base_url('sign-in'));
	} 
?>
<div class="container">
	<div class="col-sm-8 col-sm-offset-2">
		<form action="<?= base_url('article-validation')?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<legend>Create a new Article</legend>
				</div>
				<div class="form-group">
					<label class="control-label">Title</label>
					<input class="form-control" type="text" name="title" required>
				</div>
				<div class="form-group">
					<label class="control-label">Article</label>
					<textarea class="form-control" name="article" required rows="8"></textarea>
				</div>
				<div class="form-group">
					<label class="control-label">Image</label>
					<input class="form-control" type="file" name="gambar" required>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
		</form>
	</div>
</div>