<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->m_squrity->getSqurity();
		$isi['content']= 'backend/home';
		$isi['judul']= 'Dashborad';
		$this->load->view('backend/dashboard', $isi);
	}
}
