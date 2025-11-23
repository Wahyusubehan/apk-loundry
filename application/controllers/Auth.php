<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login()
    {
        $this->load->view('backend/login');
    }

    public function do_login()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        // LOGIN SIMPLE (bisa diganti database)
        if ($user == "admin" && $pass == "123") {
            $this->session->set_userdata('username', $user);
            redirect('panel'); 
        } else {
            $this->session->set_flashdata('error','Login gagal!');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
