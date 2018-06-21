<!DOCTYPE html>
<html>
<head>
	<title><?= $title?></title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
	<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
</head>
<body>
	<?php  
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/pages/'.$pages);
		$this->load->view('frontend/template/footer');
	?>
	<script type="text/javascript" src="<?= base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>