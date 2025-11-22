<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->m_login->proses_login($username, $password);
	}
}
