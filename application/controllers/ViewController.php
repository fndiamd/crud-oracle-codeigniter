<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewController extends CI_Controller {
	/* FRONTEND CONTROLLER */
	public function index(){
		$artikel = $this->db->get('TBLARTIKEL');
		$data = [
			'title' => 'Beranda Forum',
			'pages' => 'dashboard',
			'artikel' => $artikel
		];		

		$this->load->view('frontend/index', $data, FALSE);
	}

	public function signin(){
		$data = [
			'title' => 'Sign-in User',
			'pages' => 'signin'
		];

		$this->load->view('frontend/index', $data, FALSE);
	}

	public function register(){
		$data = [
			'title' => 'Register User',
			'pages' => 'register'
		];

		$this->load->view('frontend/index', $data, FALSE);
	}

	public function createArtikel(){
		$data = [
			'title' => 'Create Article',
			'pages' => 'insert_artikel'
		];

		$this->load->view('frontend/index', $data, FALSE);
	}

	public function readArtikel($id){
		# $id adalah id untuk tblartikel
		//select artikel dimana artikel id = $id
		//dijoinkan dengan tabel user dimana tblartikel.id_user = tbluser.id_user

		$this->db->select('TBLARTIKEL.*, TBLUSER.NAMA_USER AS NAMA');
		$this->db->from('TBLARTIKEL');
		$this->db->join('TBLUSER', 'TBLARTIKEL.ID_USER = TBLUSER.ID_USER');
		$this->db->where('TBLARTIKEL.ID_ARTIKEL', $id);
		$artikel = $this->db->get()->row();
		
		//select komentar dimana idartikel tblkomentar = $id
		//dijoinkan dengan tabel user dimana tblkomentar.id_user = tbluser.id_user
		$this->db->select('TBLKOMENTAR.*, TBLUSER.NAMA_USER AS NAMA');
		$this->db->from('TBLKOMENTAR');
		$this->db->join('TBLUSER', 'TBLKOMENTAR.ID_USER = TBLUSER.ID_USER');
		$this->db->where('TBLKOMENTAR.ID_ARTIKEL', $id);
		$komentar = $this->db->get();

		$data = [
			'title' => $artikel->JUDUL,
			'pages' => 'read',
			'artikel' => $artikel,
			'komentar' => $komentar
		];

		$this->load->view('frontend/index', $data, FALSE);
	}

	/*BACKEND CONTROLLER*/
	public function adminValidation(){
		if($this->session->userdata('loginadmin') == TRUE){
			$countArtikel = $this->db->get('TBLARTIKEL')->num_rows();
			$countUser = $this->db->get('TBLUSER')->num_rows();
			$countKomentar = $this->db->get('TBLKOMENTAR')->num_rows();
			$data = [
				'title' => 'Admin Dashboard',
				'pages' => 'dashboard',
				'ca'	=> $countArtikel,
				'cu'	=> $countUser,
				'ck'	=> $countKomentar
			];

			$this->load->view('backend/index', $data, FALSE);
		}else{
			redirect(base_url('admin/login'));
		}
	}

	public function adminLogin(){ $this->load->view('backend/login');}

	public function adminLogout(){
		$this->session->sess_destroy();
		redirect(base_url('admin/login'));
	}

	public function viewUser(){
		$dataUser = $this->db->get('TBLUSER');
		$data = [
			'title' => 'Manage User',
			'pages' => 'user_dashboard',
			'user' => $dataUser
		];

		$this->load->view('backend/index', $data, FALSE);
	}

	public function viewArtikel(){
		$this->db->select('TBLARTIKEL.*, TBLUSER.NAMA_USER AS NAMA');
		$this->db->from('TBLARTIKEL');
		$this->db->join('TBLUSER', 'TBLARTIKEL.ID_USER = TBLUSER.ID_USER');
		$dataArtikel = $this->db->get();

		$data = [
			'title' => 'Manage Artikel',
			'pages' => 'artikel_dashboard',
			'artikel' => $dataArtikel
		]; 

		$this->load->view('backend/index', $data, FALSE);
	}

	public function viewKomentar(){
		$this->db->select('TBLKOMENTAR.*, TBLUSER.NAMA_USER AS NAMA');
		$this->db->select('TBLARTIKEL.JUDUL');
		$this->db->from('TBLKOMENTAR');
		$this->db->join('TBLUSER', 'TBLKOMENTAR.ID_USER = TBLUSER.ID_USER');
		$this->db->join('TBLARTIKEL', 'TBLKOMENTAR.ID_ARTIKEL = TBLARTIKEL.ID_ARTIKEL');
		$dataKomentar = $this->db->get();

		$data = [
			'title' => 'Manage Komentar',
			'pages' => 'komentar_dashboard',
			'komentar' => $dataKomentar
		];
		$this->load->view('backend/index', $data, FALSE);
	}

	public function updateArtikel($id){
		$this->db->where('ID_ARTIKEL', $id);
		$artikel = $this->db->get('TBLARTIKEL')->row();

		$data = [
			'title' => 'Update Artikel',
			'pages' => 'update_artikel',
			'artikel' => $artikel
		];

		$this->load->view('backend/index', $data, FALSE);
	}

}

/* End of file ViewController.php */
/* Location: ./application/controllers/ViewController.php */