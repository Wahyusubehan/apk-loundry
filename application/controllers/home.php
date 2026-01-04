<?php

class home Extends CI_Controller{

	public function index()
	{
		$isi['paket'] = $this->db->get('paket')->result();
		$this->load->view('frontend/header', $isi);
		$this->load->view('frontend/home');
		$this->load->view('frontend/footer');
	}
}
