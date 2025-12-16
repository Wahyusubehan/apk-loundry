<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {

    public function index()
    {
        $isi['content'] = 'backend/konsumen/v_konsumen';
        $isi['judul']   = 'Data Konsumen';
        $this->load->view('backend/dashboard', $isi);
    }

    public function tambah()
    {
        $isi['content'] = 'backend/konsumen/t_konsumen';
        $isi['judul']   = 'Form Tambah Konsumen';
        $this->load->view('backend/dashboard', $isi);
    }
}
