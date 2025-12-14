<?php
define('BASEPATH') OR exit('No direct script acces allowed'); 

class Konsumen extends Ci_Controller {

    public function index()
    {
        $isi['content'] = 'backend/konsumen/v_konsumen';
        $isi['judul'] = 'Data Konsumen';
        $this->load->view('backend/dashborad',$isi);
    }
    public function tambah ()
    {
        $isi['content'] = 'backend/konsumen/t_konsumen';
        $isi['judul'] = 'Form Tambah Komsumen ';
        $this->load->view('backend/dashborad',$isi);
    }
}