<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$isi['slider'] = $this->db->get('slider')->result();
		var_dump($isi['slider']);

		$this->load->view('frontend/header', $isi);
		$this->load->view('frontend/home');
		$this->load->view('frontend/footer');
	}
}
