<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataController extends CI_Controller {

	public function registerValidation(){
		$validation = [
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules'	=> 'required|min_length[3]',
				),
			array(
				'field' => 'email',
				'label' => 'E-Mail',
				'rules' => 'required|valid_email|is_unique[TBLUSER.EMAIL]'
				),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[8]'
				),
		];

		$this->form_validation->set_rules($validation);
		if ($this->form_validation->run() == FALSE) {
			# Jika salah maka tampilkan lagi view register dengan error
			$data = [
				'title' => 'Register User',
				'pages' => 'register'
			];

			$this->load->view('frontend/index', $data, FALSE);
		} else {
			# Data yang akan dimasukkan ke dalam tabel user 
			$data = [
				'NAMA_USER' => $this->input->post('name'),
				'EMAIL' 	=> $this->input->post('email'),
				'PASSWORD'	=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'STATUS' 	=> 1
			];

			$this->db->insert('TBLUSER', $data);
			$this->session->set_flashdata('success', 'Registration Success!');
			redirect(base_url('sign-in'));
		}
	}

	public function signinValidation(){
		$validation = [
			array(
				'field' => 'email',
				'label' => 'E-Mail',
				'rules' => 'required|valid_email'
				),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[8]'
				),
		];

		$this->form_validation->set_rules($validation);
		if ($this->form_validation->run() == FALSE) {
			# Jika salah maka tampilkan lagi view signin dengan error
			$data = [
				'title' => 'Sign-in User',
				'pages' => 'signin'
			];

			$this->load->view('frontend/index', $data, FALSE);
		} else {
			# Data yang akan dimasukkan ke dalam tabel user 
			$this->db->where(array(
					'EMAIL' 	=> $this->input->post('email'),
					'STATUS' 	=> 1
				));
			$getUser = $this->db->get('TBLUSER');
			$passwd = $this->input->post('password'); // Password dari inputan form
			if($getUser->num_rows() == 1){ // cek apakah user yang dimasukkan terdaftar
				$user = $getUser->row(); // ambil data 1 row tabel user
				# $user->PASSWORD == Password dari kolom tabel database
				if(password_verify($passwd, $user->PASSWORD)){ // jika password form dan tabel sama
					// set session untuk mengetahui user yang login
					$session_data = [
						'iduser' => $user->ID_USER,
						'nama' => $user->NAMA_USER,
						'loginuser' => TRUE,
					];
					$this->session->set_userdata($session_data);
					// tampilkan pesan flashdata sukes ke halaman beranda
					$this->session->set_flashdata('success', 'Welcome! '.$user->NAMA_USER);
					redirect(base_url());
				}else{
					$this->session->set_flashdata('error', 'Password wrong!');
					redirect(base_url('sign-in'));
				}
			}else{
				$this->session->set_flashdata('error', 'User not avalable!');
				redirect(base_url('sign-in'));
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function articleValidation(){
		# setting untuk upload gambar
		$config['upload_path'] 		= './assets/img/artikel/';
		$config['allowed_types']	= 'jpg|png|jpeg';
		$config['max_size']			= 10000000;
		$config['overwrite']		= TRUE;
		
		$this->load->library('upload', $config);

		if($this->upload->do_upload('gambar')){
			$iduser = $this->session->userdata('iduser');
			$gambar = $this->upload->data('file_name');
			$judul 	= $this->input->post('title');
			$isi	= $this->input->post('article');
			$date = date("Y-m-d");

			$obj = array(
					'ID_USER'	=> $iduser,
					'GAMBAR'	=> $gambar,
					'JUDUL'		=> $judul,
					'ISI_ARTIKEL' => $isi,
					'STATUS' 	=> 1
				);
			// Khusus insert ke db yang bertipe date gunakan baris dibawah ini
			$this->db->set('TANGGAL', "to_date('$date', 'YYYY-MM-DD')", false);
			$this->db->insert('TBLARTIKEL', $obj);
			$this->session->set_flashdata('success', 'Artikelmu sudah ditambahkan');
			redirect(base_url());
		}			
	}

	public function komentar($id){
		# $id adalah id dari artikel
		$iduser = $this->session->userdata('iduser');
		$date = date("Y-m-d");
		$object = [
			'ID_USER' => $iduser,
			'ID_ARTIKEL' => $id,
			'ISI_KOMENTAR' => $this->input->post('komentar'),
		];
		$this->db->set('TANGGAL', "to_date('$date', 'YYYY-MM-DD')", false);
		$this->db->insert('TBLKOMENTAR', $object);
		$this->session->set_flashdata('success', 'Komentarmu sudah ditambahkan');
		redirect(base_url('read/article/'.$id));
	}

	public function loginAdmin(){
		$validation = [
			array(
				'field' => 'email',
				'label' => 'E-Mail',
				'rules' => 'required|valid_email'
				),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|min_length[8]'
				),
		];

		$this->form_validation->set_rules($validation);
		if ($this->form_validation->run() == FALSE) {
			# Jika salah maka tampilkan lagi view signin dengan error
			$this->load->view('backend/login', $data, FALSE);
		} else {
			# Data yang akan diselect dari tabel admin 
			$this->db->where(array(
					'EMAIL' 	=> $this->input->post('email'),
					'AKSES' 	=> 1
				));
			$getAdmin = $this->db->get('TBLADMIN');
			var_dump($getAdmin->row());
			echo $this->input->post('email');
			$passwd = $this->input->post('password'); // Password dari inputan form
			
			if($getAdmin->num_rows() == 1){ // cek apakah user yang dimasukkan terdaftar
				$admin = $getAdmin->row(); // ambil data 1 row tabel admin
				# $user->PASSWORD == Password dari kolom tabel database
				if(password_verify($passwd, $admin->PASSWORD)){ // jika password form dan tabel sama
					// set session untuk mengetahui user yang login
					$session_data = [
						'idadmin' => $admin->ID_ADMIN,
						'nama_admin' => $admin->NAMA_ADMIN,
						'loginadmin' => TRUE,
					];
					$this->session->set_userdata($session_data);
					// tampilkan pesan flashdata sukes ke halaman beranda
					$this->session->set_flashdata('success', 'Welcome! '.$admin->NAMA_ADMIN);
					redirect(base_url('admin'));
				}else{
					$this->session->set_flashdata('error', 'Password wrong!');
					redirect(base_url('admin/login'));
				}
			}else{
				$this->session->set_flashdata('error', 'User not avalable!');
				redirect(base_url('admin/login'));
			}
		}
	}

	public function updateArtikel($id){
		# setting untuk upload gambar
		$config['upload_path'] 		= './assets/img/artikel/';
		$config['allowed_types']	= 'jpg|png|jpeg';
		$config['max_size']			= 10000000;
		$config['overwrite']		= TRUE;
		
		$this->load->library('upload', $config);

		if($this->upload->do_upload('gambar')){
			$gambar = $this->upload->data('file_name');
			$judul 	= $this->input->post('title');
			$isi	= $this->input->post('article');
			$date = date("Y-m-d");

			$obj = array(
					'GAMBAR'	=> $gambar,
					'JUDUL'		=> $judul,
					'ISI_ARTIKEL' => $isi,
					'STATUS' 	=> 1
				);
			// Khusus insert ke db yang bertipe date gunakan baris dibawah ini
			$this->db->set('TANGGAL', "to_date('$date', 'YYYY-MM-DD')", false);
			$this->db->update('TBLARTIKEL', $obj);
			$this->session->set_flashdata('success', 'Artikel sudah diedit');
			redirect(base_url('admin/manage-artikel'));
		}
	}

	public function deleteKomentar($id){
		$this->db->where('ID_KOMENTAR', $id);
		$this->db->delete('TBLKOMENTAR');
		$this->session->flashdata('success', 'Komentar sudah dihapus');
		redirect(base_url('admin/manage-komentar'));
	}

	public function deleteUser($id){
		$this->db->where('ID_USER', $id);
		$this->db->delete('TBLUSER');

		$this->db->where('ID_USER', $id);
		$this->db->delete('TBLARTIKEL');
		// Hapus komentar
		$this->db->where('ID_USER', $id);
		$this->db->delete('TBLKOMENTAR');

		$this->session->flashdata('success', 'User sudah dihapus');
		redirect(base_url('admin/manage-user'));
	}

	public function deleteArtikel($id){
		/*
		| Jika artikel dihapus, maka komentar yang ada pada artikel akan dihapus juga
		*/
		$this->db->where('ID_ARTIKEL', $id);
		$this->db->delete('TBLARTIKEL');
		// Hapus komentar
		$this->db->where('ID_ARTIKEL', $id);
		$this->db->delete('TBLKOMENTAR');
		$this->session->flashdata('success', 'User sudah dihapus');
		redirect(base_url('admin/manage-artikel'));
	}
}

/* End of file DataController.php */
/* Location: ./application/controllers/DataController.php */