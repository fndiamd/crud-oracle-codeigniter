<?php 
	// cek apakah sudah login sebagai admin atau belum
	if(!$this->session->userdata('loginadmin')){
		redirect('admin/login');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $title?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
	<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
</head>
<body>
	<?php  
		$this->load->view('backend/template/header');
		$this->load->view('backend/pages/'.$pages);
		$this->load->view('backend/template/footer');
	?>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>