<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_paket'); // ← WAJIB
    }
	public function index()
	{
		$isi['slider'] = $this->db->get('slider')->result();
<<<<<<< Updated upstream
		$isi['paket'] = $this->db->get('paket')->result();
=======
>>>>>>> Stashed changes
		$this->load->view('frontend/header', $isi);
		$this->load->view('frontend/home', $isi);
		$this->load->view('frontend/footer');
	}
}
