<?php 
	function readClob($f){
		if($f != ''){
			return $f->read($f->size());
		}
	}
 ?>
<div class="container">
	<div class="col-sm-8 col-sm-offset-2">
		<form action="<?= base_url('admin/post/update/artikel/'.$artikel->ID_ARTIKEL)?>" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
				<div class="form-group">
					<legend>Update a Article</legend>
				</div>
				<div class="form-group">
					<label class="control-label">Title</label>
					<input class="form-control" value="<?= $artikel->JUDUL?>" type="text" name="title" required>
				</div>
				<div class="form-group">
					<label class="control-label">Article</label>
					<textarea class="form-control" name="article" required rows="8"><?= readClob($artikel->ISI_ARTIKEL); ?>
					</textarea>
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